<?php
require 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '{$username}'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        if ($row["password"] != $password)
        {
            $error = "Password mismatch.";
        }
        else
        {
            // Set cookies after successful authentication
            $token = md5(rand()); // create authentication token
            setcookie("username"  , $username, time() + (86400 * 30), "/"); // 86400 = 1 day cookie expiry
            setcookie("token"     , $token   , time() + (86400 * 30), "/"); // 86400 = 1 day cookie expiry
            setcookie("user-type" , "ADMIN"  , time() + (86400 * 30), "/"); // 86400 = 1 day cookie expiry

            // Redirect to admin dashboard
            header("Location: " . "admin/index.php", true, 301);
            exit();
        }
    }
    else
    {
        $error = "Username does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" href="styles/mylogin.css">
    <link rel="stylesheet" href="styles/styleshome.css" type="text/css">
    <link rel="stylesheet" href="styles/stylesadmin.css">
	<script src="js/reg.js"></script> 
</head>

<body>
	<div class="row">
		<div class="row">
			<div>
				<img src="image/logo.jpg" class="logo">
			</div>
			<div>
				<h1 class="center title">
					THE BIG BOOK SHELF
				</h1>
				<h2 class="center sub-title">
					ONLINE BOOK STORE
				</h2>
			</div>
		</div>
		
		
		
		<div>
			<div class="row">
				
				<div>
				     <a href="profile.html" onclick="myFunction()"> <img src="image/profile.jpg" class="profile"> </a>
					
				</div>
			</div>
		</div>
	</div>

    <?php
    if (!empty($error))
    {
        ?>
        <div class="error-msg">
            <?php echo $error ?>
        </div>
        <?php
    }
    ?>

    <center>
    <div class="mid">

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="border:1px solid #ccc">
        <div class="container">
            <h1>LOG IN</h1>
        <Table>
            <div>
            <tr>
                <div class="col-md-3">
                    <td><hr></td>
                </div>
    
                <div class="col-md-9">
                    <td>
                        <center>
                            <p>Don't have an account yet?  <a href="register.php" style="color:greenyellow">Register</a>.</p>
                        </center>

                        <label for="email"><b>Username</b></label><br>
                        <input type="text" placeholder="Enter Here" name="username" required><br><br>

                        <label for="psw"><b>Password</b></label><br>
                        <input type="password" placeholder="Enter Here" name="password" required ><br><br>

                        <div class="clearfix">
                            <button type="submit" class="signupbtn" ><strong>Log In</strong></button></br>
                            <button type="button" class="cancelbtn" onclick="window.location.href='signin.php'">Cancel</button>
                        </div>
                    </td>
                </div>
            </tr>
        </div>
        </Table>
    </form>
    </center>

<!--Tharu-->
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>