<?php
#AUTHOR: DISTANTA OJHA
  include_once("../../php/dbconnect.php");

   $fname = $_POST['stuFName'];
   $mi    = $_POST['stuMName'];
   $lname = $_POST['stuLName'];

   $year  = $_POST['stuYear'];

//select deptID
   $major = $_POST['major'];
   $minor = $_POST['minor'];

//insert into student table
   $qStr1 = "INSERT INTO Students (year, fname, mi, lname) VALUES ($year, '$fname','$mi', '$lname');";
   print $qStr1;
   $qRes1 = $db->query($qStr1);

//Get last inserted id   
   $getLastID = "SELECT LAST_INSERT_ID();";
   $qResGetId = $db->query($getLastID);
   if($qResGetId != FALSE){
     $lastInsertedRow = $qResGetId->fetch();
     $lastInsertedId = $lastInsertedRow['0'];
     print $lastInsertedId; 
   }
   
//insert students' majors into major table

   $qStr2 = "INSERT INTO Majors (studentId, deptID) VALUES ($lastInsertedId,'$major')";
   $qRes2 = $db->query($qStr2);

//insert students' minors into minor table

   $qStr3 = "INSERT INTO Minors (studentID, deptID) VALUES ($lastInsertedId,'$minor')";
   $qRes3 = $db->query($qStr3);

   if($qRes1 != FALSE && $qRes2 != FALSE && $qRes3 != FALSE)
   {

     print "Successfully add student";

   }
?>
<a href="../addStudent.php"><h1> Go BACK <h1></a>