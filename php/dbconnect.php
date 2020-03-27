<?php
//mysql conncetion script
$host = "ada.cc.gettysburg.edu";
$dbase = "s20_ojhadi01";
$duser = "ojhadi01";
$dpass = "ojhadi01";

try {
	$db = new PDO("mysql:host=$host;dbname=$dbase", $duser, $dpass);
}
catch (PDOException $e){
	die("Error connecting to MySQL database ???? " . $e->getMessage());
}
?>
