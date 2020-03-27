<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Course Regsitration 2.0</title>
</head>

<link rel="stylesheet" href="../css/dashboard.css">
<?php
    include("../php/bootstrap.php");
    include_once("php/studentUtils.php");
?>

<body>

<?php
  include('sidebar.php');
?>

<div class = "main">
   <?php 
      include_once("../php/dbconnect.php");
      showUserInformation($db);
   ?>
</div>

</body>
</html>
