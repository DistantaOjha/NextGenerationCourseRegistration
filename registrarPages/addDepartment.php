<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Departments</title>
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
<h3>Add Department</h3>
<form action="php/addDepartmentBackEnd.php" method="post" class = "addForm">
    <div>
        </br>
        <label for="departmentName" class = "addLabel"><b>Department Name</b></label>
        </br>
        <input type="text" class= "addInputText" placeholder="Enter Department Name" name="departmentName">
        </br>
        <button type="submit" class = "addButton">Add Department</button>
  </div>
</form>
</hr>
<h3>Current Departments</h3>
<TABLE>
<?php
$str = "<TR><TD>deptID</TD><TD>Dep Name</TD><TD>chairID</TD></TR>\n";
print $str;
include_once("../php/dbconnect.php");
$qStr = "SELECT * FROM Departments;";
$qRes = $db->query($qStr);
if($qRes != FALSE){
  $nRows = $qRes->rowCount();
  $nCols = $qRes->columnCount();
  while($row = $qRes->fetch()){
    $deptID = $row['deptID'];
    $chairID = $row['headID'];
    $name = $row['name'];
    $str = "<TR><TD>$deptID</TD><TD>$name</TD><TD>$chairID</TD></TR>\n";
    print $str;
  }
}
?>
</TABLE>
</div>
</body>
</html>