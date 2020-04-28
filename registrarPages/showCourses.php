<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Show Courses</title>
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
      <h3>Current Courses</h3>
        <TABLE>
        <?php    
        //	studentID 	year 	fname 	mi 	lname
          $str = "<TR><TD>ID</TD><TD>Course Name</TD><TD>Department</TD><TD>Course No</TD><TD>Req</TD><TD>Curriculum Attr</TD></TR>\n";
          #print $str;
          $qStr = "SELECT Courses.name AS cName, Departments.name AS dName, number, preReq, curAttr FROM Courses JOIN Departments ON Departments.deptID = Courses.deptID;";
          print $qstr;
          $qRes = $db->query($qStr);
          if($qRes != FALSE){
            while($row = $qRes->fetch()){
              #print_r($row);
              #$cID = $row['courseID'][0];
              $cName = $row['cName'];
              $dName = $row['dName'];
              $number = $row['number'];
              $preReq = $row['preReq'];
              $curAttr = $row['curAttr'];
              $str = "<TR><TD>$cName</TD><TD>$dName</TD><TD>$number</TD><TD>$preReq</TD><TD>$currAttr</TD></TR>\n";
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