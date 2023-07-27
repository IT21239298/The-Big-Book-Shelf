<?php
//starting session for uploading edited profile


//session_start();

// if(!isset($_SESSION["currentUser"])){
// 	header("Location: ../html/login.html");
// }
// else{
//starting the connection with the database
	global $conn;
	// $currentUserName = $_SESSION["currentUser"];
    $conn= new mysqli("localhost", "root", "", "onlinebookstore");
	$sqlCmd = "SELECT * FROM customer";
	$resultSet = $conn->query($sqlCmd);
	$row = $resultSet->fetch_assoc();


	$newFN = $_POST["newfirstName"];
	$newSN = $_POST["newsecondName"];
	$newUN = $_POST["newusername"];
	$newEM = $_POST["newemail"];
	$newBD = $_POST["newbirthdate"];
	$newCN = $_POST["newcontact"];
	$newAD = $_POST["newaddress"];
	$newCT = $_POST["newcity"];
	$newZC = $_POST["newzipcode"];
	$newcountry = $_POST["newcountry"];
	$newPSWRD= $_POST["newpassword"];
	

	$sqlCmd = "UPDATE customer SET 	
firstname ='$newFN',
secondname='$newSN',
username='$newUN',
email='$newEM',
dob='$newBD',
password='$newPSWRD',
phone='$newCN',
address='$newAD',
city='$newCT',
zipcode='$newZC',
country='$newcountry'

";
	$conn->query($sqlCmd);

	// $_SESSION["currentUser"] = $newUN;

	$conn->close();
//redirecting to the userprofile page
	header("Location: userdashboard.php");
//}
?>