<?php

session_start();

global $con;
$con = new mysqli("localhost", "root", "", "onlinebookstore");
//$toBeDeleted = $_SESSION["currentUser"];

$sqlCmd = "SELECT * FROM customer";
$resultSet = $con->query($sqlCmd);
$row = $resultSet->fetch_assoc();


//delete user account -------------------------------------------------------------------------------------------------

$sqlCmd = "DELETE FROM customer ";
$con->query($sqlCmd);


$con->close();

session_destroy();
header("Location: index.php");

?>