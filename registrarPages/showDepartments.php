<!DOCTYPE html>
<html>
<!-- Author Distanta -->

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Show Departments</title>
  <style>
    .addLine {
      color: rgb(204, 125, 7);
    }

    .addInputText {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 8px;
      border: 1px solid #ccc;
    }

    .addInputText:hover {
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


    .addLabel {
      margin: 8px 8px;
      padding: 5px 5px 5px 5px;
    }

    .addForm {
      border-left: 3px solid;
      border-color: rgb(223, 218, 213);
      width: 50%;
      height: 50%;
    }


    table {
      border-collapse: collapse;
    }

    td,
    th {
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

  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          <h3>Show Department</h3>
          </hr>
          <h3>Current Departments</h3>
          <TABLE>
            <?php
            $str = "<TR><TD>deptID</TD><TD>Dep Name</TD><TD>chairID</TD></TR>\n";
            print $str;
            $qStr = "SELECT * FROM Departments;";
            $qRes = $db->query($qStr);
            if ($qRes != FALSE) {
              $nRows = $qRes->rowCount();
              $nCols = $qRes->columnCount();
              while ($row = $qRes->fetch()) {
                $deptID = $row['deptID'];
                $chairID = $row['headID'];
                $name = $row['name'];
                $str = "<TR><TD>$deptID</TD><TD>$name</TD><TD>$chairID</TD></TR>\n";
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