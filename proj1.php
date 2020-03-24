<?php

include_once("db_connect.php");

function showUserInformation($db, $login)
{

//select students from "Student" table(need to be shown)
    $qStr1 = "SELECT * FROM Students WHERE studentID = '$login';";
    $qRes1 = $db->query($qStr1);

//select student's major(deptID) from "major" table
    $qStr2 = "SELECT deptID FROM majors WHERE studentID = '$login';";
    $qRes2 = $db->query($qStr2);

//select department name from "department" table(need to be shown)
    $qStr3 = "SELECT name FROM Departments WHERE deptID = '$qRes2';";
    $qRes3 = $db->query($qStr3);

//select student's minor(deptID) from "Minors" table
    $qStr4 = "SELECT deptID FROM Minors WHERE studentID = '$login';";
    $qRes4 = $db->query($qStr4);

//select department name from "department" table(need to be shown)
    $qStr5 = "SELECT name FROM Departments WHERE deptID = '$qRes4';";
    $qRes5 = $db->query($qStr5);

//show on the website
    echo $qRes1;
    echo $qRes3;
    echo $qRes5;


}

function showCoursesInTheShoppingCart($db, $login)
{

//select courses from "ShoppingCart" Table
    
     $qStr = "SELECT * FROM ShoppingCart WHERE studentID = '$login';";
     $qRes = $db->query($qStr);

//show on the website
     echo  $qRes;
   
}


function showUserGrade($db, $input)
{

//select user grade from "Transcripts" table (choose year and term)
     $login = $input['login'];
     $term = $input['term'];
     $year = $input['year'];

     $qStr = "SELECT Grade FROM Transcripts WHERE studentID = '$login' AND Term = '$term' AND Year = '$year';";

     $qRes = $db->query($qStr);

//show on the website
     echo  $qRes;


}




?>
