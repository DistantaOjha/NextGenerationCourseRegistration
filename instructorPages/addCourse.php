<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>


<?php
print_r($_POST);

$sid   = $_POST['sectionID'];
$cid   = $_POST['courseID'];
$iid   = $_POST['instructorID'];
$term  = $_POST['term'];
$year  = $_POST['year'];
$time  = $_POST['time'];
$days  = $_POST['days'];
$cap   = $_POST['cap'];

$qStr = "INSERT INTO Sections(sectionID, courseID, instructorID, term, year, time, days, cap) VALUE('$sid', '$cid', '$iid', '$term', '$year', '$time', '$days', '$cap')";

print "<P>$qStr</P>";

include_once("../php/dbconnect.php");

$qRes = $db->query($qStr);

if($qRes != FALSE)
	print "Course added!";

?>