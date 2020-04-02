<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Instructor</title>
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

<link rel="stylesheet" href="../css/dashboard.css">
<?php
    include("../php/bootstrap.php");
?>

<body>

<?php
  include('sidebar.php');
?>

<div class = "main">
<h3>Add Instructor</h3>
<form action="php/addInstructorBackEnd.php" method="post" class = "addForm">
    <div>
        </br>
        <label for="insFName" class = "addLabel"><b>Instructor First Name</b></label>
        </br>
        <input type="text" class= "addInputText" placeholder="Enter Instructor First Name" name="insFName">
        </br>
        <label for="insMName" class = "addLabel"><b>Instructor Middle Initial (MI)</b></label>
        </br>
        <input type="text" class= "addInputText" placeholder="Enter Instructor MI" name="insMName">
        </br>
        <label for="insLName" class = "addLabel"><b>Instructor Last Name</b></label>
        </br>
        <input type="text" class= "addInputText" placeholder="Enter Instructor Last Name" name="insLName">
        </br>
        <button type="submit" class = "addButton">Add Instructor</button>
  </div>
</form>
</hr>
<h3>Current Instructors</h3>
<TABLE>
<?php
$str = "<TR><TD>ID</TD><TD>FName</TD><TD>MI</TD><TD>LName</TD></TR>\n";
print $str;
include_once("../php/dbconnect.php");
$qStr = "SELECT * FROM Instructors;";
$qRes = $db->query($qStr);
if($qRes != FALSE){
  $nRows = $qRes->rowCount();
  $nCols = $qRes->columnCount();
  while($row = $qRes->fetch()){
    $insID = $row['instructorID'];
    $fname = $row['fname'];
    $mi = $row['mi'];
    $lname = $row['lname'];
    $str = "<TR><TD>$insID</TD><TD>$fname</TD><TD>$mi</TD><TD>$lname</TD></TR>\n";
    print $str;
  }
}
?>
</TABLE>
</div>
</body>
</html>