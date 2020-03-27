<?php
function showUserInformation($db)
{
//select students from "Student" table(need to be shown)
    $qStr1 = "SELECT * FROM Students WHERE studentID = '123456';";
    $qRes1 = $db->query($qStr1);
    if ($qRes1 != FALSE){

    // display selected rows from Students

        $row = $qRes1 -> fetch();

        $id = $row['studentID'];
        $year = $row['year'];
        $fname = $row['fname'];
        $mi = $row['mi'];
        $lname = $row['lname'];
 
        
      $str1 = "Name: $fname $mi  $lname </BR> ID: $id </BR> Class Year: $year</BR>";
      
      echo $str1;
  }

//select student's majors from "Major" table(need to be shown)
    $qStr2 = "SELECT deptID FROM Majors WHERE studentID = '123456';";
    $qRes2 = $db->query($qStr2);
    
    if ($qRes2 != FALSE){
        $majors = "";
       
        
        while($rowM = $qRes2 -> fetch())
        {
         //get the detID of the major
         $deptID = $rowM['deptID'];
         
         //check the name of the department
         $qStr3 = "SELECT name FROM Departments WHERE deptID = $deptID;";
         $qRes3 = $db->query($qStr3);
         
         if($qRes3 != FALSE)
         {
            $rowD = $qRes3 -> fetch();
            $dName= $rowD['name'];
            $majors .= "$dName";
            $majors .= " ";
         }
         
      }
       $str2 = "Major: $majors</BR>";
       echo $str2;
     
}


//select student's minors from "Minor" table(need to be shown)
    $qStr4 = "SELECT deptID FROM Minors WHERE studentID = '123456';";
    $qRes4 = $db->query($qStr4);

    if ($qRes4 != FALSE){

        $minors = "";

        while($rowI = $qRes4 -> fetch())
        {
  
         //get the detID of the major
         $deptID = $rowI['deptID'];
         
         //check the name of the department
         $qStr5 = "SELECT name FROM Departments WHERE deptID = $deptID;";
         $qRes5 = $db->query($qStr5);
         
         if($qRes5 != FALSE)
         {

            $rowD = $qRes5 -> fetch();
            $dName= $rowD['name'];
            $minors .= "$dName";
            $minors .= " ";
         }
         
        }
       $str3 = "Minor: $minors </BR>";
       echo $str3;
    }
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
