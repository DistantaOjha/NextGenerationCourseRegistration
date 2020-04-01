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

<link rel="stylesheet" href="../css/dashboard.css">
<?php
    include("../php/bootstrap.php");
?>

<body>

<?php
  include('sidebar.php');
?>

<div class = "main">
This is registrar land page
</div>

</body>
</html>