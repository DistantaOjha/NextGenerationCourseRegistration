<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Course Regsitration 2.0</title>
</head>

<link rel="stylesheet" href="../css/dashboard.css">
<?php
    include("../php/bootstrap.php");
   
?>

<body>

<?php
  include('sidebar.php');
  include_once("proj.php");
  showUserInformation($db);
?>

<div class = "main">
This is student land page
</div>

</body>
</html>
