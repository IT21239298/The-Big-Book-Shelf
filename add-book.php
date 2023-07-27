
    <link rel="styleSheet" href="styles/add-book.css" />
    <link rel="styleSheet" href="styles/sidebar.css" />
    <?php 
      $title = 'Add Books';
      include 'header.php'; 
      include_once ('includes/seller-config.inc.php');
    ?>

    <div id="cbox" class="c-box">
      <span onclick="document.getElementById('cbox').style.display='none'" class="close" title="Close">×</span>
      <div class="c-box-content">
        <div class="content-container">
          <h2>Reset Form</h2>
          <p>Are you sure you want to reset?</p>
          <p>All entered data will be lost!</p>
        
          <div class="c-buttons">
            <button onclick="document.getElementById('cbox').style.display='none'" class="cbtn">Cancel</button>
            <button onclick="resetForm()" class="dbtn">Reset</button>
          </div>
        </div>
      </div>
    </div>

    <div id="cbox2" class="c-box">
      <span onclick="document.getElementById('cbox2').style.display='none'" class="close" title="Close">×</span>
      <div class="c-box-content">
        <div class="content-container">
          <h2>Add Book</h2>
          <p>Are you sure you want to add this book?</p>
                
          <div class="c-buttons">
            <button onclick="document.getElementById('cbox2').style.display='none'" class="cbtn">No</button>
            <button onclick="submitForm()" class="dbtn">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="a-container">
    <?php include 'seller-sidebar.php'; ?>
     
    
        <form action="includes/addbook.inc.php" method="post" id="addBook" name="addBook" enctype="multipart/form-data" >
        <h2>- Add a book -</h2>
          <div class="form-item">
            <label for="name">Book Name:</label>
            <input type="text" name="bookName" id="name" required />
          </div>

          <div class="form-item">
            <label for="desc">Description:</label>
            <textarea
              name="description"
              id="desc"
              rows="5"
              cols="50"
            ></textarea>
          </div>

          <div class="form-item">
            <label for="publishDate">Publish Date:</label>
            <input type="text" name="publishDate" id="publishDate" required />
          </div>
                 
          <?php
              require 'includes/dbh.inc.php';

              $sql = "SELECT catID, catName FROM Category";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                echo '<div class="form-item">';
                echo '<label for="categories">Category:</label>';
                echo '<select name="category" id="categories" required>';
                echo '<option disabled selected value> -- Select Category -- </option>';
                while($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="'.$row['catID'].'" >'.$row["catName"].'</option>';
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
                echo '<select name="author" id="authors" required>';
                echo '<option disabled selected value> -- Select Author -- </option>';
                while($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="'.$row['authorID'].'" >'.$row["aFirstName"].' '.$row["aLastName"].'</option>';
                }
                echo '</select>';
                echo '</div>';
              } else {
                echo "O Authors Found!";
              }

              mysqli_close($conn); 
          ?>

          <div class="form-item">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required />
          </div>

          <div class="form-item">
            <label for="bfile">Book File:</label>
            <input type="file" name="bookfile" id="bfile" required/>
          </div>

          <div class="form-item">
            <label for="bcoverphoto">Cover Photo:</label>
            <input type="file" name="coverPhoto" id="bcoverPhoto" />
          </div>

          <div class="ab-buttons">
            <button class="reset-btn" type="button" onclick="resetConfirm()">Reset</button>
            <button class="addbook-btn" type= "button" onclick="submitConfirm()">Add Book</button>
            <button class="submit-btn" id="submit" name="sumbit" type="submit">Add Book</button>
          </div>
        </form>
  
      </div>
    </div>

<script>
  function resetForm() {
    document.getElementById("addBook").reset();
    document.getElementById('cbox').style.display='none'
  }
  function resetConfirm() {
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
