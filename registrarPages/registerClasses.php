<?php
//Distanta Ojha
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
<body>
  <?php
  include("../php/bootstrap.php");
  include_once("../php/dbconnect.php");
  include('menubar.php');
  ?>
  <div class="main">
    <DIV class="container">
      <?php
        $myfile = fopen("registration.csv", "r") or die("Unable to open file!");
        fgets($myfile); //trash the column names
        while(!feof($myfile)) {
            $line = fgets($myfile);
            list($studentID, $sectionID) = split(',', $line);
            $studentID = chop($studentID);
            $sectionID = chop($sectionID);
            if($sectionID != '' && $studentID != ''){
                $str = "INSERT INTO registration(studentID, sectionID) VALUES ($studentID, $sectionID);";
                $delStr = "DELETE FROM ShoppingCart WHERE studentID = $studentID;";
                #print_r($delStr."<br>");
                $qDel = $db->query($delStr);
                #print $str;
                $qRes = $db->query($str);
            }
        }
        print "Successfully registered";
        fclose($myfile);
      ?>
    </DIV>
  </div>
</body>
</html>