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
include_once("../php/db_connect.php");
?>

<body>

  <?php
  include('menubar.php');
  ?>

  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          <H2>Search Course</H2>

          <FORM name="fmSearch" method="POST" action="php/SearchCourseReg.php">

            <label for="Department"><b>Department:</b> </label>
            <SELECT name="Department">
              <option value='-1'></option>
              <?php

              $qStr = "SELECT * FROM Departments;";
              $qRes = $db->query($qStr);

              if ($qRes != FALSE) {

                while ($dept = $qRes->fetch()) {
                  $deptID = $dept['deptID'];
                  $name = $dept['name'];
                  $str = "<option value = '$deptID'>$name</option>";
                  print $str;
                }
              }

              ?>
            </SELECT>


            CourseID: <INPUT type="number" name="courseID" />
            </BR>

            Term: <INPUT type="radio" id="f" name="term" value="fall">
            <LABEL for="f">Fall</LABEl>

            <INPUT type="radio" id="s" name="term" value="spring">
            <LABEL for="s">Spring</LABEL>
            </BR>

            Year: <INPUT type="number" name="year" />
            </BR>
            </BR>
            <INPUT type="submit" value="Search" />
            <INPUT type="reset" value="Clear" />


          </FORM>
        </DIV>
      </DIV>
    </DIV>
  </DIV>

</BODY>

</HTML>