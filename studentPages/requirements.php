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
  
  <BR>

  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          Requirements Example
          TODO
          </BR></BR>

          <table style="width:100%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <th>Courses Needed</th>
            </tr>
            <tr>
              <td>Intermediate Arabic</td>
            </tr>
            <tr>
              <td>Language and Culture</td>
            </tr>
          </table>
          
        </DIV>
      </DIV>
    </DIV>
  </div>

</body>

</html>