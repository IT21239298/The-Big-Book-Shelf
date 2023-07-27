<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>SELECT LOGIN PAGE</title>
	<link rel="stylesheet" href="styles/styleshome.css">
	<link rel="stylesheet" href="styles/SelectLogin.css">
</head>

<body>
	<!--Header-->
    <?php require 'header.php'; ?>
 
    <!--Tharu--> 
     <div class="container1">
          <div class="cards">
              <div class="card-img1">
                  <img src="./image/adminimg1.png" alt="Admin">
              </div>
              <div class="card-body">
                  <h2>Signin as</h2>
              </div>
              <div class="card-footer">
                  <button onclick="window.location = 'admin-login.php'">Admin</button>
              </div>
          </div>
          <div class="cards">
            <div class="card-img">
                <img src="image/userimg1.png" alt="Customer">
            </div>
            <div class="card-body">
                <h2>Signin as</h2>
            </div>
            <div class="card-footer">
                <button onclick="window.location = 'customer-login.php'">Customer</button>
            </div>
        </div>
        <div class="cards">
            <div class="card-img">
                <img src="image/sellerimg3.jpg" alt="Seller">
            </div>
            <div class="card-body">
                <h2>Signin as</h2>
            </div>
            <div class="card-footer">
                <button onclick="window.location = 'seller-login.php'">Seller</button>
            </div>
        </div>
    </div>

<!--Tharu-->
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>