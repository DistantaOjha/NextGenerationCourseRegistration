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

<body>
  <?php
  include_once("../../php/dbconnect.php");
  ?>
  <div class="main">
    <DIV class="container">
      <?php
        $qRes = $db->query("DELETE FROM registration WHERE 1");
        $myfile = fopen("registration.csv", "r") or die("Unable to open file!");
        fgets($myfile); //trash the column names
        while(!feof($myfile)) {
            $line = fgets($myfile);
            list($studentID, $sectionID) = split(',', $line);
            $studentID = chop($studentID);
            $sectionID = chop($sectionID);
            if($sectionID != '' && $studentID != ''){
                $str = "INSERT INTO registration(studentID, sectionID) VALUES ($studentID, $sectionID);";
                #print $str;
                $qRes = $db->query($str);
            }
        }
        fclose($myfile);
      ?>
    </DIV>
  </div>
  <a href="../registrarLand.php"><h1> Go BACK <h1></a>
</body>
</html>