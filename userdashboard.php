<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>UserDashbord PAGE</title>
	<link rel="icon" type="ïmage/jpg" href="image/logo.jpg"/>
	<link rel="stylesheet" href="styles/styleshome.css">
	<link rel="stylesheet" href="styles/styleuserdashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
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
				     <a href="userdashboard.php" onclick="myFunction()"> <img src="image/profile.jpg" class="profile"> </a>
					
				</div>
			</div>
		</div>
	</div>
	<!--Navigation bar-->
	<div class="navi">
	<a href="index.php" class="home" onclick="myfunction()">Home<br>
    <a href="category.php" class="category" onclick="myfunction()">Category</a>
    <a href="contact.php" class="contact" onclick="myfunction()">Contact us</a>
    <a href="about.html" class="about" onclick="myfunction()">About us</a>
   
	</div>	
	
             
     <!--Tharu--> 
    	 
    <div class="main">
		<button class="btn"><a href="userdashboard.php">Dashboard</a></button><br>
        <button class="btn"><a href="Setting.php">Setting</a></button><br>
          
	</div>
	
	<div class="second">
		<div class="secondone">
			<h2>Refered Book</h2>
		</div>
		<div class="secondsd">
			<ul><br>
			<li>Absalom, Absalom!</li><br>
			<li>A Time to Kill by John Grisham</li><br>
			<li>The House of Mirth by Edith Wharton</li><br>
			<li>East of Eden by John Steinbeck</li> <br>
			<li>The Sun Also Rises by Ernest Hemingway</li><br>
		    <li>Vile Bodies by Evelyn Waugh</li><br>
			<li>A Scanner Darkly by Philip K</li><br>
			<li>Moab is my Washpot by Stephen Fry</li><br>
			</ul>
		</div>
		
	</div>
	<div class="third">


	<?php
		include"config.php";

		$sql = "SELECT * FROM customer";
		$result = $conn->query($sql);
	
		if($result->num_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
	?>
				<div class="thirdon">
			<label>Username : <?php echo $row["username"]?> </label><br><br><br><br>
			<label>Birthday : <?php echo $row["dob"]?> </label><br><br><br><br>
			<label>Email : <?php echo $row["email"]?> </label><br><br><br><br>
			<label>Mobile Number : <?php echo $row["phone"]?> </label><br><br><br><br>

		</div>
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

