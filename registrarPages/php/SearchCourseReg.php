<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>


<!DOCTYPE html>
<HTML>
<HEAD>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
 
  TABLE, TH, TD 
  {
  border: 1px solid black;
  border-collapse: collapse;
  }

  TH, TD {
  padding: 5px;
  }

  TH {
  text-align: left;
  }

</style>

  <title>Student Course Regsitration 2.0</title>
</HEAD>

<link rel="stylesheet" href="../css/master.css">
<?php
    include("../php/bootstrap.php");
    include_once("../php/db_connect.php");
?>

<BODY>

<?php
  include('menubar.php');
?>

<DIV class = "main">
<H2>Search Course</H2>

<TABLE style = "width:80%">
<TR>
   <TH>Dept</TH>
   <TH>CourseID</TH>
   <TH>Section</TH>
   <TH>Instructor</TH>
   <TH>Day</TH>
   <TH>Time</TH>
   <TH>Seats Available</TH>
</TR>

<?php
 
 $deptID   = $_POST['Department'];
 $courseID = $_POST['courseID'];
 $term     = $_POST['term'];
 $year     = $_POST['year'];

 $qStr1 = "SELECT * FROM Departments WHERE deptID= '$deptID';";
 $qRes1 = $db -> query($qStr1);

 if($qRes1 != FALSE)
 {
    $deptRow = $qRes1 -> fetch();
    $deptName = $deptRow['name'];
 }

 $qStr2 = "SELECT * FROM Sections WHERE courseID= '$courseID' AND term = '$term' AND year = '$year';";
 $qRes2 = $db -> query($qStr2);
 
 if($qRes2 != FALSE)
 {
    $sectionRow = $qRes2 -> fetch();
    $sectionLetter = $sectionRow['sectionLetter'];
    $day = $sectionRow['days'];
    $time = $sectionRow['time'];
    $seats = $sectionRow['seats'];
    $instrucID = $sectionRow['instructorID'];
 }

 $qStr3 = "SELECT * FROM Instructors WHERE instructorID= '$instrucID';";
 $qRes3 = $db -> query($qStr3);

 if($qRes3 != FALSE)
 {
   
   $instrucRow = $qRes3 -> fetch();
   $instrucFM = $instrucRow['fname'];
   $instrucMI= $instrucRow['mi'];
   $instrucLN = $instrucRow['lname'];

   $instrucName .= " ";
   $instrucName .= $instrucFM;
   $instrucName .= " ";
   $instrucName .= $instrucMI;
   $instrucName .= " ";
   $instrucName .= $instrucLN;
 }

 $qStr4 = "SELECT * FROM Courses WHERE courseID= '$courseID';";
 $qRes4 = $db -> query($qStr4);

 if($qRes4 != FALSE)
 {
   
   $courseRow = $qRes4 -> fetch();
   $number = $courseRow['number'];
   $courseName = $courseRow['name'];

 }

 
 
 print "<p>$deptName $number: $courseName</p>";
 print "<TR>";
 print "<TD>" .$deptName. "</TD>";
 print "<TD>" .$courseID. "</TD>";
 print "<TD>" .$sectionLetter. "</TD>";
 print "<TD>" .$instrucName."</TD>";
 print "<TD>" .$day."</TD>";
 print "<TD>" .$time."</TD>";
 print "<TD>" .$seats."</TD>";
 print "</TR>";

 
?>


</TABLE>
</DIV>

<FORM name="fmSearchCourse" method="POST" action="RegistrarSearchCourse.php">

<BR></BR>

<INPUT type="submit" value="Back to search"/>

</FORM>


</BODY>
</HTML>
