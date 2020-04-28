<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Course Regsitration 2.0</title>
</head>

<link rel="stylesheet" href="../css/master.css">
<?php
    include("../php/bootstrap.php");
    include_once("php/studentUtils.php");
?>

<body>

<?php
  include('menubar.php');
  
  // the message
  $major = $_POST['major'];
  $minor = $_POST['minor'];
  $username = 
  $msg = "would like to change his/her major/minor.\nMajor Change: $major \nMinor Change: $minor";
  
  // send email
  mail("jeteay01@gettysburg.edu","Student Major/Minor Change", $msg);
  
?>

<div class = "main">
   <?php 
      include_once("../php/dbconnect.php");
      showUserInformation($db);
   ?>
</div>

<BR>

Email sent! Wait for instructor confirmation.

<FORM name="fmMajMin" method="POST" action="studentLand.php">

<BR>

<INPUT type="submit" value="Back to home"/>

</FORM>

</body>
</html>
