<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Course Regsitration 2.0</title>
</head>

<link rel="stylesheet" href="../../css/dashboard.css">

<style>

.deptButton {
  width: 100px;
}

</style>
<?php
    include("../../php/bootstrap.php");
?>

<body>

<?php
  include('../sidebar.php');
  include_once('../../php/dbconnect.php')
?>

<div class = "main">
<?php
$placeVal = $_GET['placeVal'];
$qStr = "SELECT * FROM Departments;";
$qRes = $db->query($qStr);
if($qRes != FALSE){
  $nRows = $qRes->rowCount();
  $nCols = $qRes->columnCount();
  while($row = $qRes->fetch()){
    $deptID = $row['deptID'];
    $chairID = $row['headID'];
    $name = $row['name'];
    $str = '<button class = "deptButton" onClick = "myFunction('.'\''.$name.'\''.')">'.$name.'</button><br>';
    print $str;
    $str = '<div style = "display:none;" id = "'. $name . '"> Jay Hanuman </div>';
    print $str; 
  }
}
?>
</table>
</div>

<script>

  function myFunction(showDivName) {
    var show = document.getElementById(showDivName);
    if (show.style.display === "none") {
      show.style.display = "block";
    }
    else {
      show.style.display = "none";
    }
  }
</script>

</body>
</html>