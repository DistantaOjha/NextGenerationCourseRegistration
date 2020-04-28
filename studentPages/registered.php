<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Student Course Regsitration 2.0</title>
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

    .searchButton {
      background-color: blue;
      color: white
    }

    .searchButton:hover {
      opacity: 0.5
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
  
  </div> 

</body>

</html>