<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>HOME PAGE</title>
	<link rel="icon" type="ïmage/jpg" href="image/logo.jpg"/>
	<link rel="stylesheet" href="styles/styleshome.css">
	<!--custom payment  css file link--->
	<link rel ="stylesheet" href="styles/pay.css">
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
	    <a href="index.php" class="home" onclick="myfunction()">Home<br>
		<a href="category.php" class="category" onclick="myfunction()">Category</a>
		<a href="contact.php" class="contact" onclick="myfunction()">Contact us</a>
		<a href="about.php" class="about" onclick="myfunction()">About us</a>
	</div>	
	
         <!--payment -->
		
          
		<div class="pagebody">
            <div class="row1">
                <div class="col-75">
                    <div class="container">	
			<form>
			<div class="row1">
			 <div class="col-50">
   
    <h3 class="title1"> Customer Details </h3><br>
<label>First name</label>
    <input type="text" name ="firstname" placeholder ="first name" required><br>
	
	<label>Last name</label>
    <input type="text" name ="lastname" placeholder ="last  name" required><br>
	
    
	
    <label> Mobile number</label>
    <input type="phone" name ="mobile" pattern="[0-9]{10}"placeholder="0123456789" required><br>
	
	<label > E-mail address </label>
   <input type="email" id="myEmail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$ " placeholder ="abc@gamil.com" required><br>
   
   
			
			
			</div>
			 <div class="col-50">
        <h3 class="title1"> Payment Details </h3>

           
			<label> Cards accepted </label>
			<img src="image/pay.jpg" class ="cardpic"><br>
			
			
			
			<label>Name on card: </label>
			<input type= "text" placeholder= "Mr.Peris"><br>
			
			
			
			<label>Credit card number : </label>
			<input type= "number" placeholder= "1111-2222-3333-4444" required></br>
			
			
			
			<label>Exp month : </label>
			<input type= "text" placeholder="January" required></br>
			
			
			
			
			<label>Exp year  : </label>
			<input type= "text" placeholder="2022" required></br>
		
			
			
			<label> CVV: </label>
			<input type= "text" placeholder="1234"  >
			<br>
			<br>
				<input type ="submit" value ="PAY NOW..!" class="submit-btn">
		       </div>
	                
					
					</form>
	                     </div>
	                          </div>
							 		</div>
	                          </div>
							 		

		
      
	
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
      
</footer>
</html>

