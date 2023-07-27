<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Orderdetails PAGE</title>
	<link rel="icon" type="ïmage/jpg" href="image/logo.jpg"/>
	<link rel="stylesheet" href="styles/styleshome.css">
	<link rel="stylesheet" href="styles/Orderdetails.css">
	
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
				     <a href="profile.html" onclick="myFunction()"> <img src="image/profile.jpg" class="profile"> </a>
					
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
		
        <button class="btn"><a href="UserDashbord.php">Dashboard</a></button><br>
        <button class="btn"><a href="Orderdetails.php">Order Details</a></button><br>
        <button class="btn"><a href="Setting.php">Setting</a></button><br>
          
    </div>

	<div class="table-container">
		<h1 class="heading">Order Details</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Book Name</th>
					<th>Price of Book</th>
					<th>Order Date</th>
					<th>Order Status</th>
					<th> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data-label="Book Name">A Time to Kill by John Grisham</td>
					<td data-label="Price of Book">Rs.750.00</td>
					<td data-label="Order Date">2022/05/16</td>
					<td data-label="Order Status">Confirmed</td>
					<td data-label=""><a href="" class="btn">Delete</a></td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td data-label="Book Name">A Time to Kill by John Grisham</td>
					<td data-label="Price of Book">Rs.750.00</td>
					<td data-label="Order Date">2022/05/16</td>
					<td data-label="Order Status">Confirmed</td>
					<td data-label=""><a href="" class="btn">Delete</a></td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td data-label="Book Name">A Time to Kill by John Grisham</td>
					<td data-label="Price of Book">Rs.750.00</td>
					<td data-label="Order Date">2022/05/16</td>
					<td data-label="Order Status">Confirmed</td>
					<td data-label=""><a href="" class="btn">Delete</a></td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td data-label="Book Name">A Time to Kill by John Grisham</td>
					<td data-label="Price of Book">Rs.750.00</td>
					<td data-label="Order Date">2022/05/16</td>
					<td data-label="Order Status">Confirmed</td>
					<td data-label=""><a href="" class="btn">Delete</a></td>
				</tr>
			</tbody>
		</table>
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

