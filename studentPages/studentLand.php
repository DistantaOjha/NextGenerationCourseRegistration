<?php
#SHOW INFORMATION AUTHOR: EMILY
#CHANGE MAJOR MINOR: Tullah
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
include_once("../php/dbconnect.php");
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
          <BR><BR>
          <TABLE border="1" bordercolor="#dddddd" cellspacing="0" cellpadding="8">
          <?php
              $studentID = $_SESSION['username'];
              $qStr = "SELECT * FROM Students WHERE studentID = $username;";
              $qRes = $db->query($qStr);
              if($qRes != False){
                while ($row = $qRes->fetch()) {
                  #print_r($row);
	                $id = $row['studentID'];
                  $year = $row['year'];
                  $fname = $row['fname'];
                  $mi = $row['mi'];
                  $lname = $row['lname'];
                  print "
                  <TR>
                    <TH>Name</TH>
                    <TD>$fname $mi $lname</TD>
                  </TR>
                  <TR>
                    <TH>ID</TH>
                    <TD>$id</TD>
                  </TR>
                  <TR>
                    <TH>Year</TH>
                    <TD>$year</TD>
                  </TR>";    
                }  
              }
          ?>
          <TR>
            <TD>Declare or Change Major or Minor</TD>
            <TD>
              <FORM name="fmMajMin" method="POST" action="changeMajMin.php">
              <INPUT type="text" name="major" placeholder="Enter major" />
              <BR>
              <INPUT type="text" name="minor" placeholder="Enter minor" />
              <BR>
              <BR>
              <INPUT type="submit" value="Change major/minor" />
              </FORM>
            </TD>
          </TR>
          </TABLE>
        </DIV>
      </DIV>
    </DIV>
  </div>


</body>

</html>