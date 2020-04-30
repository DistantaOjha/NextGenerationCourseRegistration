

<?php
#AUTHOR: DISTANTA OJHA

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
#print "hanuman";
$placeVal = $_GET['placeVal'];
$sectionID = $_GET['sectionID'];
$stuID = $_SESSION['username'];
#print $placeVal . " --- " . $sectionID . " --- " . $stuID;
$qStr = "INSERT INTO ShoppingCart(studentID,sectionID,placePref) VALUE ('$stuID','$sectionID','$placeVal')";
#print "<P>$qStr</P>";
include_once("../../php/dbconnect.php");

$delStr = "DELETE FROM ShoppingCart WHERE studentID = $stuID AND placePref = $placeVal;";
#print_r($delStr."<br>");
$qDel = $db->query($delStr);
$qRes = $db->query($qStr);
if($qRes != FALSE)
	#print "Shopping Cart Added added!";
?>

<a href="../shoppingCart.php"><h1> Go back to shopping cart </h1></a>