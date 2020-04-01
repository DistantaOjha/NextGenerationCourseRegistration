<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<?php
print_r($_POST);
$department   = $_POST['departmentName'];
$qStr = "INSERT INTO Departments(headID, name) VALUE (-1,'$department')";
print "<P>$qStr</P>";
include_once("../../php/dbconnect.php");
$qRes = $db->query($qStr);
if($qRes != FALSE)
	print "Department added!";
?>
<a href="../addDepartment.php"><h1> Go BACK <h1></a>
