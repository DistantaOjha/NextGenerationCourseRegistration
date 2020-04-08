<?php

include_once("../php/dbconnect.php");

function addStudent($db, $input)
{

   $fname = $input['stuFName'];
   $mi    = $input['stuMName'];
   $lname = $input['stuLName'];

   $year  = $input['stuYear'];

//select deptID
   $major = $input['major'];
   $minor = $input['minor'];

   $res = FALSE;

//insert into student table
   $qStr1 = "INSERT INTO Students (year, fname, mi, lname) VALUES ('$year','$fname','$mi','$lname')";
   $qRes1 = $db->query($qStr1);

//insert students' majors into major table

   $qStr2 = "INSERT INTO Majors (studentID, deptID) VALUES (0,'$major')";
   $qRes2 = $db->query($qStr2);

//insert students' minors into minor table

   $qStr3 = "INSERT INTO Minors (studentID, deptID) VALUES (0,'$minor')";
   $qRes3 = $db->query($qStr3);

   if($qRes1 != FALSE && $qRes2 != FALSE && $qRes3 != FALSE)
   {

      $res = TRUE;

   }

   return $res;
}
?>
