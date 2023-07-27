<?php
require 'config.php';

$error   = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username   = $_POST['username'];

    $sql = "SELECT * FROM seller WHERE username = '{$username}'";
    $result = $conn->query($sql);
    
    // Username already exist in seller table?
    if ($result->num_rows > 0)
    {
        $error = "Username is already taken. Try with a different Username.";
    }
    else
    {
        $account_type = $_POST['account_type'];
        $phone        = $_POST['phone'];
        $shop_name    = $_POST['shop_name'];
        $shop_site    = $_POST['shop_site'];
        $email        = $_POST['email'];
        $password     = $_POST['password'];
        $firstname    = $_POST['firstname'];
        $secondname   = $_POST['secondname'];
        $address      = $_POST['address'];
        $city         = $_POST['city'];
        $zipcode      = $_POST['zipcode'];
        $country      = $_POST['country'];

        $sql = "INSERT INTO seller (username, account_type, phone, shop_name, shop_site, email, password, firstname, secondname, address, city, zipcode, country) 
                VALUES ('{$username}', '{$account_type}', '{$phone}', '{$shop_name}', '{$shop_site}', '{$email}', '{$password}', '{$firstname}', '{$secondname}', '{$address}', '{$city}', '{$zipcode}', '{$country}')";
        $result = $conn->query($sql);
        $success = "Seller created. Go to Sign in page to login.";

        // Redirect to login/php
        // header("Location: " . "login.php", true, 301);
        // exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>SELLER REGISTRATION PAGE</title>
	<link rel="stylesheet" href="styles/styleshome.css">
	<link rel="stylesheet" href="styles/MYSregistration.css">
    <link rel="stylesheet" href="styles/stylesadmin.css">
	<script src="js/MyCregistration.js"></script>
</head>

<body>
	<!--Header-->
    <?php require 'header.php'; ?>

    <?php
    if (!empty($error))
    {
        ?>
        <div class="error-msg">
            <?php echo $error ?>
        </div>
        <?php
    }

    if (!empty($success))
    {
        ?>
        <div class="success-msg">
            <?php echo $success ?>
        </div>
        <?php
    }
    ?>

    <!--Tharu-->  
	<div class="full">
	    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" onsubmit="return checkPassword()">
	        <div class="backfull">
                <center>
                    <h1>****Welcome to Seller Registration****</h2>
                    <h3>You are <b>one step</b> away from your favourite books!</h3>
                </center>

                <h2>step 1 - Create a seller account</h2>

                <label><h3>Account Type :</h3></label>
                <input type="radio" name="account_type" value="individual" required>Individual
                <input type="radio" name="account_type" value= "company">Company<br>
        
                <label><h3>Contact No :</h3></label>
                <input type="phone" name="phone" placeholder="Phone Number" required><br>
        
                <label><h3>Shop name :</h3></label>
                <input type="text" name="shop_name" placeholder="Shop name will be visible to The Big Book Shell customers" required><br>
        
                <label><h3>Shop Website :</h3></label>
                <input type="text" name="shop_site" placeholder="Enter Shop URL if you have one"><br>
        
                <label><h3>Email :</h3></label>
                <input type="email" name="email" placeholder="Ex : abcd@gmail.com" required><br>
        
                <label><h3>Password :</h3></label>
                <input type="password" name="password" placeholder="Password" id="pwd1" required><br>
            
                <label><h3>Re-enter Password :</h3></label>
                <input type="password" placeholder="Re-Enter Password" id="pwd2" required><br>
            </div>

            <div class="backsecond">
	            <h2>Step 2- Fill in seller information</h2>

                <div class="second">
                    <label><h3>Username :</h3></label>
	                <input type="text" name="username" placeholder="Username" required><br>    
                
	                <label><h3>Frist Name :</h3></label>
	                <input type="text" name="firstname" placeholder="Frist Name" required><br>

	                <label><h3>Second Name :</h3></label>
	                <input type="text" name="secondname" placeholder="Second Name" required><br>
	            </div>

                <label><h3>Address : </h3></label>

		        <input type="text" name="address" placeholder="Street Address"> <br>
		        <input type="text" name="city" placeholder="City"> <br>
		        <input type="text" name="zipcode" placeholder="Postal/Zip Code"> <br>
		        <input type="text" name="country" placeholder="Country"> <br>
            </div>

	        <div class="clearfix">
                <button type="submit" class="signupbtn" ><b>Register Account</b></button></br></br>
	        </div>
        </form>
    </div>	
<!--Tharu-->
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>