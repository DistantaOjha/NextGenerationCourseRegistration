<?php

session_start();
//$username = $_POST['ulogin'];
$pass = $_PASS['pass'];
$_SESSION['username'] = 123456;
header("Location: ../../studentPages/studentLand.php");
exit;
?>