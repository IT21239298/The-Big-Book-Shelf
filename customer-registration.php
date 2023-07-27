<?php
require 'config.php';

$error   = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username   = $_POST['username'];

    $sql = "SELECT * FROM customer WHERE username = '{$username}'";
    $result = $conn->query($sql);
    
    // Username already exist in customer table?
    if ($result->num_rows > 0)
    {
        $error = "Username is already taken. Try with a different Username.";
    }
    else
    {
        $firstname  = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $email      = $_POST['email'];
        $gender     = $_POST['gender'];
        $dob        = $_POST['dob'];
        $password   = $_POST['password'];
        $phone      = $_POST['phone'];
        $address    = $_POST['address'];
        $city       = $_POST['city'];
        $zipcode    = $_POST['zipcode'];
        $country    = $_POST['country'];

        // Create a cart for the new customer
        $sql = "INSERT INTO cart (quantity) VALUES (0)";
        $result = $conn->query($sql);
        $cart_id = $conn->insert_id;

        // Create the new customer
        $sql = "INSERT INTO customer (firstname, secondname, username, email, gender, dob, password, phone, address, city, zipcode, country, cart_id) 
                VALUES ('{$firstname}', '{$secondname}', '{$username}', '{$email}', '{$gender}', '{$dob}', '{$password}', '{$phone}', '{$address}', '{$city}', '{$zipcode}', '{$country}', {$cart_id})";
        $result = $conn->query($sql);
        $success = "Customer created. Go to Sign in page to login.";

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
	<title>REGISTRATION PAGE</title>
	<link rel="stylesheet" href="styles/styleshome.css">
	<link rel="stylesheet" href="styles/MYC_registration.css">
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
                    <h1>****Welcome to Customer Registration****</h2>
                    <h3>You are <b>one step</b> away from your favourite books!</h3>
                </center>
            
                <label><h3>Frist Name :</h3></label>
                <input type="text" name="firstname" placeholder="Frist Name" required><br>

                <label><h3>Second Name :</h3></label>
                <input type="text" name="secondname" placeholder="Second Name" required><br>

                <label><h3>Username :</h3></label>
                <input type="text" name="username" placeholder="Username" required><br>

                <label><h3>E-mail Address :</h3></label>
                <input type="email" name="email" placeholder="Ex: abcd@gmail.com" required><br>

                <label><h3>Gender :</h3></label>
                <input type="radio" name="gender" value="male" required>Male
                <input type="radio" name="gender" value= "female">Female
                <input type="radio" name="gender" value="prefer not to say">Prefer not to say<br>

                <label><h3>Date of Birth : </h3></label>
                <input type="date" name="dob"><br><br>

                <label><h3>Password :</h3></label>
                <input type="password" placeholder="Password" name="password" id="pwd1" required><br>

                <label><h3>Re-enter Password :</h3></label>
                <input type="password" placeholder="Re-Enter Password" id="pwd2" required><br>

                <label><h3>Contact No : </h3></label>
                <input type="phone" name="phone" placeholder="0123456789" required><br>

                <label><h3>Address : </h3></label>
                <input type="text" name="address" placeholder="Street Address"> <br>
                <input type="text" name="city" placeholder="City"> <br>
                <input type="text" name="zipcode" placeholder="Postal/Zip Code"> <br>
                <input type="text" name="country" placeholder="Country"> <br>

                <div class="clearfix">
                    <button type="submit" class="signupbtn" ><b>Register Account</b></button></br></br>
                </div>
            </div>
        </form>
	</div>
    <!--Tharu-->
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>