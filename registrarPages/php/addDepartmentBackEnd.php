<?php
#AUTHOR: DISTANTA OJHA
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<?php
print_r($_POST);
$department   = $_POST['departmentName'];
$chairID   = $_POST['chairID'];
$qStr = "INSERT INTO Departments(headID, name) VALUE ($chairID,'$department')";
print "<P>$qStr</P>";
include_once("../../php/dbconnect.php");
$qRes = $db->query($qStr);
if($qRes != FALSE)
	print "Department added!";
?>
<a href="../addDepartment.php"><h1> Go BACK <h1></a>