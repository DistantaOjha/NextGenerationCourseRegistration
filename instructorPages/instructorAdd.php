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

<link rel="stylesheet" href="../css/master.css">
<?php
    include("../php/bootstrap.php");
?>

<body>

<?php
  include('menubar.php');
?>

<div class = "main">
<H2>Add a Course</H2>

<FORM   name="fmAdd" method="POST" action="addCourse.php">

Section ID: <INPUT type="number" name="sectionID"/> <br>
Course ID: <INPUT type="number" name="courseID"/> <br>
Your Instructor ID: <INPUT type="number" name="instructorID"/> <br>
Term: <INPUT type="radio" id="f" name="term" value="fall">
      <label for="f">Fall</label>
      <INPUT type="radio" id="s" name="term" value="spring">
      <label for="s">Spring</label><br>
Year: <INPUT type="number" name="year"/> <br>
Time: <INPUT type="time" name="time"/> <br>
Days: <INPUT type="text" name="days" placeholder="M/T/W/R/F"/> <br>
Capacity: <INPUT type="number" name="cap"/> <br>
<br>
<INPUT type="reset"  value="Clear"/>
<INPUT type="submit" value="Send" />

</FORM>

</div>

</body>
</html>