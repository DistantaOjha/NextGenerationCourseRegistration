<?php
#AUTHOR: DISTANTA OJHA
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Student Course Regsitration 2.0</title>
  <style>
    .addLine {
      color: rgb(204, 125, 7);
    }

    .addInputText {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 8px;
      border: 1px solid #ccc;
    }

    .addInputText:hover {
      border: 1px solid rgb(11, 146, 224);
    }


    .addButton {
      background-color: blue;
      color: white;
      padding: 12px 20px;
      margin: 8px 8px;
      width: 57%;
    }

    .addButton:hover {
      opacity: 0.8;
    }


    .addLabel {
      margin: 8px 8px;
      padding: 5px 5px 5px 5px;
    }

    .addForm {
      border-left: 3px solid;
      border-color: rgb(223, 218, 213);
    }


    table {
      border-collapse: collapse;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    .searchButton {
      background-color: blue;
      color: white
    }

    .searchButton:hover {
      opacity: 0.5
    }
  </style>

</head>

<link rel="stylesheet" href="../css/master.css">
<?php
include("../php/bootstrap.php");
include_once("../php/dbconnect.php");
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
          <TABLE>
          <TR><TH>Course Name</TH><TH>Section</TH><TH>Time</TH><TH>Days</TH><TH>Instructor</TH></TR>
          <?php
              $studentID = $_SESSION['username'];
              $qRes = $db->query("SELECT name,sectionLetter,time,days,fname,lname FROM registration NATURAL JOIN Sections NATURAL JOIN Courses NATURAL JOIN Instructors WHERE studentID = $studentID;");
              if($qRes != False){
                while ($row = $qRes->fetch()) {
                  #print_r($row);
	                $cName = $row['name'];
                  $secLetter =  $row['sectionLetter'];
                  $time = $row['time'];
                  $days = $row['days'];
                  $fname =  $row['fname'];
                  $lname = $row['lname'];
                  $insName = $lname .  ", " . $fname;
                  print "<TR><TD>$cName</TD><TD>$secLetter</TD><TD>$time</TD><TD>$days</TD><TD>$insName</TD></TR>";               
                }  
              }
          ?>
          </TABLE>
        </DIV>
      </DIV>
    </DIV>
  </div>
</body>

</html>