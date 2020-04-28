<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Show Student</title>
  <style>
.addLine {
    color: rgb(204, 125, 7);
}

.addInputText{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 8px;
  border: 1px solid #ccc;
}

.addInputText:hover{
    border: 1px solid rgb(11, 146, 224);
}


.addButton {
  background-color: blue;
  color: white;
  padding: 12px 20px;
  margin: 8px 8px;
  width: 57%;
}

.addButton:hover {
  opacity: 0.8;
}


.addLabel{
    margin: 8px 8px;
    padding: 5px 5px 5px 5px;  
}

.addForm{
   border-left: 3px solid;
   border-color: rgb(223, 218, 213);
   width: 50%;
   height: 50%; 
}


table {
  border-collapse: collapse;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>

</head>

<link rel="stylesheet" href="../css/master.css">
<?php
    include("../php/bootstrap.php");
    include_once("../php/dbconnect.php");
?>

<body>

<?php
  include('menubar.php');
?>

<div class = "main">
<DIV class="container">
  <DIV class="row">
    <DIV class="col-md-12">
      <h3>Current Students</h3>
        <TABLE>
        <?php    
        //	studentID 	year 	fname 	mi 	lname
          $str = "<TR><TD>ID</TD><TD>FName</TD><TD>MI</TD><TD>LName</TD><TD>Year</TD></TR>\n";
          print $str;
          include_once("../php/dbconnect.php");
          $qStr = "SELECT * FROM Students;";
          $qRes = $db->query($qStr);
          if($qRes != FALSE){
            while($row = $qRes->fetch()){
              $insID = $row['studentID'];
              $fname = $row['fname'];
              $mi = $row['mi'];
              $lname = $row['lname'];
              $year = $row['year'];
              $str = "<TR><TD>$insID</TD><TD>$fname</TD><TD>$mi</TD><TD>$lname</TD><TD>$year</TD></TR>\n";
              print $str;
            }
          }
        ?>
        </TABLE>
    </DIV>
  </DIV>
</DIV>
</div>
</body>
</html>