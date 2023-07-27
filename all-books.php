  <link rel="styleSheet" href="styles/all-books.css" />
  <link rel="styleSheet" href="styles/sidebar.css" />

  <?php 
      $title = 'All Books';
      include 'header.php'; 
      include_once ('./includes/seller-config.inc.php');
  ?>

    <div id="cbox" class="c-box">
      <span onclick="document.getElementById('cbox').style.display='none'" class="close" title="Close">×</span>
      <div class="c-box-content">
        <div class="content-container">
          <h2>Delete Book</h2>
          <p>Are you sure you want to delete this book?</p>
        
          <div class="c-buttons">
            <button onclick="document.getElementById('cbox').style.display='none'" class="cbtn">Cancel</button>
            <button onclick="deleteConfirm()" class="dbtn">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="a-container">
        <?php include 'seller-sidebar.php'; ?>
        <div class="alg-container">
        <h2>Books</h2>
        <div class = "table" >
        <table class = "books-table">
          <tr>
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Description</th>
            <th>Author ID</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>Category ID</th>
            <th>Approval Status</th>
            
            <th></th>
            <th></th>
          </tr>

          <?php
              require 'includes/dbh.inc.php';

              $publisherID = $_SESSION["publisherID"];

              $sql = "SELECT bookID, bName, bDescription, authorID, price, publishDate, catID, approvalStatus FROM Book wHERE publisherID = $publisherID";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>'.$row["bookID"].'</td>';
                  echo '<td>'.$row["bName"].'</td>';
                  echo '<td>'.$row["bDescription"].'</td>';
                  echo '<td>'.$row["authorID"].'</td>';
                  echo '<td>'.$row["price"].'</td>';
                  echo '<td>'.$row["publishDate"].'</td>';
                  echo '<td>'.$row["catID"].'</td>';
                  echo '<td>'.$row["approvalStatus"].'</td>';
                  echo '<td><a href="modify-book.php?id='.$row['bookID'].'" class="tablebtn">Modify</a></td>';
                  echo '<td>
                        <button class="tablebtn2" type="submit" onClick="customConfirm('.$row['bookID'].')">Delete</button>
                        </td>';
                  echo '</tr>';
                }
              }
              else {
                echo '<tr>';
                echo '<td colspan="10">O Books Found!</td>';
                echo '</tr>';
              }
          ?>
        </table>
        </div>
      </div>
    </div>
        </div>  
    </div>
        

<script>
  var deleteID = 0;
  function customConfirm(gid) {
    document.getElementById('cbox').style.display='block'
    deleteID = gid
  }
  function deleteConfirm() {
    window.location = 'includes/deletebook.inc.php?rowid='+deleteID;
  }
  var modal = document.getElementById('cbox');
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

?>
  <?php include('./footer.php'); ?>
