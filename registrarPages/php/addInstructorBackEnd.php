<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<?php
print_r($_POST);
$fname   = $_POST['insFName'];
$mname   = $_POST['insMName'];
$lname   = $_POST['insLName'];
$qStr = "INSERT INTO Instructors(fname, mi, lname) VALUE ('$fname','$mname','$lname')";
print "<P>$qStr</P>";
include_once("../../php/dbconnect.php");
$qRes = $db->query($qStr);
if($qRes != FALSE)
	print "Instructor added!";
?>
<a href="../addInstructor.php"><h1> Go BACK <h1></a>
