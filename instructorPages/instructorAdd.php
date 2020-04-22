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
<H2 class="formTitle">Add a Course</H2>

<FORM class="stdForm" name="fmAdd" method="POST" action="addCourse.php">

<p class = "formLabel">
  Section ID: <INPUT type="number" class="formText" name="sectionID"/>
  Course ID: <INPUT type="number" class="formText" name="courseID"/>
  Your Instructor ID: <INPUT type="number" class="formText" name="instructorID"/>
</p>
<p class = "formLabel">
  Year: <INPUT type="number" class="formText" name="year"/> 
  Term: <INPUT type="radio" id="f" name="term" value="fall">
      <label for="f" class = "formLabel">Fall</label>
      <INPUT type="radio" id="s" name="term" value="spring">
      <label for="s" class = "formLabel">Spring</label>
</p>
<p class = "formLabel">
  Time: <INPUT type="time" class="formText" name="time"/>
  Days: <input type="checkbox" class="formText" id="m" name="days[]" value="M">
      <label for="m"> Monday </label>
      <input type="checkbox" class="formText" id="t" name="days[]" value="T">
      <label for="t"> Tuesday </label>
      <input type="checkbox" class="formText" id="w" name="days[]" value="W">
      <label for="w"> Wednesday </label>
      <input type="checkbox" class="formText" id="r" name="days[]" value="R">
      <label for="r"> Thursday </label>
      <input type="checkbox" class="formText" id="f" name="days[]" value="F">
      <label for="f"> Friday </label>
</p>
<p class = "formLabel">Capacity: <INPUT type="number" class="formText" name="cap"/> </p>
<br>
<INPUT class="formBtn" type="reset"  value="Clear"/>
<INPUT class="formBtn" type="submit" value="Send" />

</FORM>

</div>

</body>
</html>