<?php
#AUTHOR: Tullah
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
  
  $major = $_POST['major'];
  $minor = $_POST['minor'];
  $msg = "Username would like to change his/her major/minor.\nMajor Change: $major \nMinor Change: $minor";
  
  mail("jeteay01@gettysburg.edu","Student Major/Minor Change", $msg);
  
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
            <TD>Email sent! Wait for instructor confirmation.</TD>
            <TD>
              <FORM name="fmMajMin" method="POST" action="studentLand.php">
              <INPUT type="submit" value="Back to home"/>
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
