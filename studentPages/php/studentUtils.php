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
 
        
      $str1 = "<TR><TD>Name: $fname</TD><TD>$mi</TD><TD>$lname</TD><TD></BR>ID: $id</TD><TD></BR>Class Year: $year</TD></BR></TR>\n";
      return $str1;
}

//select student's majors from "Major" table(need to be shown)
    $qStr2 = "SELECT dept FROM Major WHERE studentID = '123456';";
    $qRes2 = $db->query($qStr2);

    if ($qRes2 != FALSE){

        $majors = "";

        while($rowM = $qRes2 -> fetch())
      {
  
         //get the detID of the major
         $deptID = $rowM['dept'];
         
         //check the name of the department
         $qStr3 = "SELECT name FROM Department WHERE deptID = $deptID;";
         $qRes3 = $db->query($qStr3);
         
         if($qRes3 != FALSE)
         {

            $rowD = $qRes3 -> fetch();
            $dName= $rowD['name'];
            $majors .= " ";
            $majors .= "$dName";

         }
         
      }
       $str2 = "<TR><TD>major: $majors</TD></BR></TR>\n";
       return $str2;
     
}


//select student's minors from "Minor" table(need to be shown)
    $qStr4 = "SELECT dept FROM Minor WHERE studentID = '123456';";
    $qRes4 = $db->query($qStr4);

    if ($qRes4 != FALSE){

        $minors = "";

        while($rowI = $qRes4 -> fetch())
      {
  
         //get the detID of the major
         $deptID = $rowI['dept'];
         
         //check the name of the department
         $qStr5 = "SELECT name FROM Department WHERE deptID = $deptID;";
         $qRes5 = $db->query($qStr5);
         
         if($qRes5 != FALSE)
         {

            $rowD = $qRes5 -> fetch();
            $dName= $rowD['name'];
            $minors .= " ";
            $minors .= "$dName";


         }
         
      }
     $str3 = "<TR><TD>minor: $minors</TD></BR></TR>\n";
       return $str3;
     
}
}


function showCoursesInTheShoppingCart($db, $login)
{

//select courses from "ShoppingCart" Table
    
     $qStr = "SELECT * FROM ShoppingCart WHERE studentID = '$login';";
     $qRes = $db->query($qStr);

//show on the website
     return  $qRes;
   
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
     return  $qRes;
}
?>
