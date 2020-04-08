<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
$placeVal = $_GET['placeVal'];
$sectionID = $_GET['sectionID'];
$stuID = $_SESSION['username'];
print $placeVal . " --- " . $sectionID . " --- " . $stuID;
$qStr = "INSERT INTO ShoppingCart(studentID,sectionID,placePref) VALUE ('$stuID','$sectionID','$placeVal')";
print "<P>$qStr</P>";
include_once("../../php/dbconnect.php");
$qRes = $db->query($qStr);
if($qRes != FALSE)
	print "Shopping Cart Added added!";
?>
<a href="../shoppingCart.php"><h1> Go BACK </h1></a>