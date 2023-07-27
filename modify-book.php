<link rel="styleSheet" href="styles/modify-book.css" />
<link rel="styleSheet" href="styles/sidebar.css" />
<?php 
      $title = 'Modify Books';
      include 'header.php'; 
      include_once ('./includes/seller-config.inc.php');
?>
    <div id="cbox" class="c-box">
      <span onclick="document.getElementById('cbox').style.display='none'" class="close" title="Close">×</span>
      <div class="c-box-content">
        <div class="content-container">
          <h2>Cancel Modify</h2>
          <p>Are you sure you want to cancel?</p>
          <p>Unsaved data will be lost!</p>
        
          <div class="c-buttons">
            <button onclick="document.getElementById('cbox').style.display='none'" class="cbtn">No</button>
            <button onclick="cancelModify()" class="dbtn">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="cbox2" class="c-box">
      <span onclick="document.getElementById('cbox2').style.display='none'" class="close" title="Close">×</span>
      <div class="c-box-content">
        <div class="content-container">
          <h2>Save Book</h2>
          <p>Are you sure you want to save the changes?</p>
                  
          <div class="c-buttons">
            <button onclick="document.getElementById('cbox2').style.display='none'" class="cbtn">Cancel</button>
            <button onclick="submitForm()" class="dbtn">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="a-container">
      <?php include 'seller-sidebar.php'; ?>
      <div class="ag-container">
      <h2>- Modify Book -</h2>
  
  <?php 
    require 'includes/dbh.inc.php';

    $mid = $_GET['id'];

    echo '<form action="includes/modify-book.inc.php?id='.$mid.'" method="post" id="modify-book" name="modify-book" onsubmit="return validateForm()" enctype="multipart/form-data" >';

    $sql = "SELECT bName, publishDate, catID, price, bDescription, authorID FROM Book WHERE bookID = $mid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $bName = $row["bName"];
    $bDescription = $row["bDescription"];
    $publishDate = $row["publishDate"];
    $catID = $row["catID"];
    $authorID = $row["authorID"];
    $price = $row["price"];
    
    }
    else{
        // Error MSG
    }

    echo '<div class="form-item">
            <label for="name">Book Name:</label>
            <input type="text" name="bName" id="name" value = "'.$bName.'" required/>
          </div>';
    echo '<div class="form-item">
            <label for="desc">Description:</label>
            <textarea
              name="bDescription"
              id="desc"
              rows="5"
              cols="50"
            >'.$bDescription.'</textarea>
            </div>';
    echo '<div class="form-item">
            <label for="publishDate">Publish Date:</label>
            <input type="text" name="publishDate" id="publishDate" value = "'.$publishDate.'" required/>
          </div>';
        
        $sql = "SELECT catID, catName FROM Category";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="form-item">';
          echo '<label for="categories">Category:</label>';
          echo '<select name="catID" id="categories" required>';
          while($row = mysqli_fetch_assoc($result)) {
            if($bCategory == $row["categoryName"]){
              echo '<option selected value="'.$row['catID'].'" >'.$row["catName"].'</option>';
            }
            else{
              echo '<option value="'.$row['catID'].'" >'.$row["catName"].'</option>';
            }
          }
          echo '</select>';
          echo '</div>';
        } else {
          echo "O Categories Found!";
        }

        $sql = "SELECT authorID, aFirstName, aLastName FROM Author";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo '<div class="form-item">';
          echo '<label for="authors">Author:</label>';
          echo '<select name="authorID" id="authors" required>';
          while($row = mysqli_fetch_assoc($result)) {
            if($bAuthor == $row["authorName"]){
              echo '<option selected value="'.$row['authorID'].'" >'.$row["aFirstName"].' '.$row["aLastName"].'</option>';
            }
            else{
              echo '<option value="'.$row['authorID'].'" >'.$row["aFirstName"].' '.$row["aLastName"].'</option>';
            }
          }
          echo '</select>';
          echo '</div>';
        } else {
          echo "O Authors Found!";
        }

echo '<div class="form-item">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value = "'.$price.'" required/>
      </div>'; 

        mysqli_close($conn); 
    ?>

    <div class="form-item">
      <label for="bfile">Book File:</label>
      <input type="file" name="bookfile" id="bfile"/>
    </div>

    <div class="form-item">
      <label for="bcoverphoto">Cover Photo:</label>
      <input type="file" name="coverPhoto" id="bcoverPhoto" />
    </div>

    <div class="ab-buttons">
      <button class="reset-btn" type="button" onclick="cancelConfirm()">Cancel</button>
      <button class="addbook-btn" type= "button" onclick="submitConfirm()">Save</button>
      <button class="submit-btn" id="submit" name="sumbit" type="submit">Save</button>
    </div>
  </form>

</div>
</div>
      </div>
    </div>
    
      

<script>
  function cancelModify() {
    window.location = 'all-books.php';
  }
  function cancelConfirm() {
    document.getElementById('cbox').style.display='block'
  }
  function submitConfirm() {
    document.getElementById('cbox2').style.display='block'
  }
  function submitForm() {
    document.getElementById('cbox2').style.display='none'
    document.getElementById("submit").click();
  }
</script>


<?php include('./footer.php'); ?>
