<?php
if (!isset($_SESSION)) {
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
?>

<body>
  <?php
  include('menubar.php');
  ?>
  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          Please Confirm the following CSV file you want to add as registration data </br> 
          <a href= "registration.csv">Open the CSV file</a>
          <form action="AI/registerClasses.php">
            <p><input type="checkbox" required name="terms"> I confirm the registration data</p>
            <button type="submit">Confirm</button>
          </form>
        </DIV>
      </DIV>
    </DIV>
  </div>
</body>

</html>