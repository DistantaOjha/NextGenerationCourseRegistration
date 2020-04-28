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
include_once("php/studentUtils.php");
?>

<body>

  <?php
  include('menubar.php');
  ?>

  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          <?php
          include_once("../php/dbconnect.php");
          showUserInformation($db, $_SESSION['username']);
          ?>
        </DIV>
      </DIV>
    </DIV>

  </div>

  <BR>
  <DIV class="container">
    <DIV class="row">
      <DIV class="col-md-12">
        Declare/change major

        <FORM name="fmMajMin" method="POST" action="changeMajMin.php">
          <INPUT type="text" name="major" placeholder="Enter major" />
          <BR>
          <INPUT type="text" name="minor" placeholder="Enter minor" />
          <BR>
          <BR>
          <INPUT type="submit" value="Change major/minor" />
        </FORM>
      </DIV>
    </DIV>
  </DIV>

</body>

</html>