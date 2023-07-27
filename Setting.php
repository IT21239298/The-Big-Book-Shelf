
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>User Setting PAGE</title>
	<link rel="icon" type="ïmage/jpg" href="image/logo.jpg"/>
	<link rel="stylesheet" href="styles/styleshome.css">
	<link rel="stylesheet" href="styles/Settting.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/Setting.js"></script>
	
	
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
			<input class="w3-input w3-border w3-round search-bar" type="text" placeholder="🔍 Search">
		</div>
		
		<div>
			<div class="row">
				<div>
					<div>
						<button class="signin">Sign in</button>
					</div>
					<div>
						<button class="register">Register</button>
					</div>
				</div>
				<div>
				     <a href="Userdashboard.php" onclick="myFunction()"> <img src="image/profile.jpg" class="profile"> </a>
					
				</div>
			</div>
		</div>
	</div>
	<!--Navigation bar-->
	<div class="navi">
	    <a href="" class="home" onclick="myfunction()">Home<br>
		<a href="" class="category" onclick="myfunction()">Category</a>
		<a href="" class="contact" onclick="myfunction()">Contact us</a>
		<a href="" class="about" onclick="myfunction()">About us</a>
	</div>	
	
             
     <!--Tharu--> 
    <br><br><br><br><br><br><br>
     <div class="main">
		<div class="upload">
			<img src="image/noprofile.jpg" width="180" height="180" alt="">
			<div class="round">
				<input type="file">
				<i class="fa fa-camera" style= "color: #fff;"></i>
			</div>
		</div>
	 
        <button class="btn"><a href="Userdashboard.php">Dashboard</a></button><br>
        <button class="btn"><a href="deleteUserAccount.php">Delete account</a></button><br>
        <button class="btn"><a href="Setting.php">Setting</a></button><br>
          
          
     </div>

	
      <!--Tharu--> 
	  <div class="fullnew">


	  	<?php

include 'config.php';
// session_start();


// if(!isset($_SESSION["currentUser"])){
// 	header("Location: login.html");
// }
// else{
	// $currentUserName = $_SESSION["currentUser"];

	
	$sql = "SELECT * FROM customer";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
			while($row = mysqli_fetch_assoc($result)){

?>

		<form action= "uploadEditedProfile.php"  method="POST" onsubmit="return checkpassword()">
		<div class="backfull">
	  
		   
		   <label><h3> Salution : </h3></label>
		   <select name="gender">
			   <option value="Mr"> Mr.</option>
			   <option value="Ms"> Ms.</option>
			   <option value="Mis"> Mis.</option>
		   </select>
		   
		   <label><h3>First Name :</h3></label>
		   <input class=userProfileValues type=text name=newfirstName value= <?php echo $row["firstname"]?> ><br>
		   <label><h3>Second Name :</h3></label>
		   <input class=userProfileValues type=text name=newsecondName value= <?php echo $row["secondname"]?> ><br>
		   
		   <label><h3>Username :</h3></label>
		   <input class=userProfileValues type=text name=newusername value= <?php echo $row["username"]?> ><br>
		   <label><h3>E-mail Address :</h3></label>
		   <input class=userProfileValues type=text name=newemail value= <?php echo $row["email"]?> ><br>
		   
		   
		   <label><h3>Date of Birth : </h3></label>
		   <input class=userProfileValues type=date name=newbirthdate value= <?php echo $row["dob"]?> ><br><br>
		   
		  
		   
		   <label><h3>Contact No : </h3></label>
		   <input class=userProfileValues type=phone name=newcontact value= <?php echo $row["phone"]?> ><br>
				   
		   <label><h3>Address : </h3></label>
		  <input class=userProfileValues type=address name=newaddress value= <?php echo $row["address"]?> > <br>
		   <input type="address" name="address" placeholder="Street Address Line 2"> <br>
		   <input class=userProfileValues type=address name=newcity value= <?php echo $row["city"]?> ><br>
		   <input class=userProfileValues type=address name=newzipcode value= <?php echo $row["zipcode"]?> > <br>
           <input class=userProfileValues type=address name=newcountry value= <?php echo $row["country"]?>>  <br>
		</div>
		   <div class="backfull">
		   
		   <label><h3>New Password :</h3></label>
		   <input type="password" name="newpassword" placeholder="new password" id="pwd2" required><br>
		   
		   
		  
		   <input type="checkbox" id="chkTerms" onchange="AcceptTerms()">I agree to change my details<br><br>
		   
		   
		   <div class="clearfix">
		 
		   <button type="submit" class="signupbtn" ><b>Update</b></button></br></br>

		   
		   
		   </div>
	   </div>	
	  	
		</form> 

	<?php
     }
	}?>

		
	  </div>
	<!--Tharu-->
	</body>
	<!--footer-->
    <table  class="footertable">
        <td><img src="image/Payment.jpg" class="paymentpic"></td> <!--Payment Picture--> 
        <td><h4 class="copytex"><b>Copyright2022@</b>thebigbookshelf.All rights reserved</h4></td>  <!--Copyright Text-->
        <td><a href="#"><img src="image/fb.jpg" class="social" onclick="2myFunction()"></a></td> <!--Facebook-->
        <td><a href="#"><img src="image/twitter.jpg" class="social" onclick="3myFunction()"></a></td> <!--Twitter-->
        <td><a href="#"><img src="image/instagram.jpg" class="social" onclick="4myFunction()"></a></td> <!--Instagram-->
        <td><a href="#"><img src="image/gmail.jpg" class="social" onclick="5myFunction()"></a></td> <!--Gmail-->
        <td><img src="image/app.jpg" class="app"></td> <!--Store app-->
      </table>
      

</html>

