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

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:hover{
  background: lightblue;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
}

.modal-body {padding: 2px 16px;}

</style>

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
$sectionDivs='';
$placeVal = $_GET['placeVal'];
$qStr = "SELECT * FROM Departments;";
$qRes = $db->query($qStr);
if($qRes != FALSE){
  while($row = $qRes->fetch()){
    $deptID = $row['deptID'];
    $chairID = $row['headID'];
    $name = $row['name'];
    $str = '<button class = "deptButton" onClick = "myFunction('.'\''.$name.'\''.')">'.$name.'</button><br>';
    print $str;
    $str = '<div style = "display:none;" id = "'. $name . '">';
    print $str;
    $courseRes = $db->query("SELECT * FROM Courses WHERE deptID = $deptID;");
    if($courseRes != FALSE){
      print '<br><br>';
      print '<table style="width:100%">';
      print '<tr><th><b>Course Name</b></th><th><b>Pre-Requisite</b></th><th><b>Gettysburg Curriculum</b></th></tr>';
      
      while($courseRow = $courseRes->fetch()){       
        $courseID = $courseRow['courseID'];
        $courseName = $courseRow['name'];
        $preReq = $courseRow['preReq'];
        $enrolReq = $courseRow['enrollReq'];
        $deptID = $courseRow['deptID'];
        $curAttr = $courseRow['curAttr'];
        $str1 =  "<tr><td>$courseName</td><td>$preReq</td><td>$curAttr</td><td>";
        print $str1;
        $str1 = '<button onClick = "myFunction(' . '\'' . $courseName . '\'' . ')">Show Sections</button></td>';
        print $str1;
        print '</tr>';
        
        //Ready up the section modal for each class
        $sectionDivs = $sectionDivs . '<div id="'.$courseName.'" class="modal">';
        $sectionDivs = $sectionDivs . '<div class="modal-content">';
        $sectionDivs = $sectionDivs . '<div class="modal-header">';
        $sectionDivs = $sectionDivs . '<h2>' . $courseName . ' Sections </h2>';
        $sectionDivs = $sectionDivs . '<button class="close" onClick = "myFunction(' . '\'' . $courseName . '\'' . ')">&times;</button>';
        $sectionDivs = $sectionDivs . '</div>';
        $sectionDivs = $sectionDivs . '<div class="modal-body">';
        
        $sectionRes = $db->query("SELECT * FROM Sections WHERE courseID = $courseID;");
        if($sectionRes != FALSE){
          $sectionDivs = $sectionDivs . '<table style="width:100%">';
          //`sectionID`, `courseID`, `sectionLetter`, `instructorID`, `term`, `year`, `time`, `days`, `seats`
          $sectionDivs = $sectionDivs . '<tr><th><b>Section Letter</b></th><th><b>InstructorID</b></th><th><b>Time</b></th><th><b>Days</b></th><th><b>Time</b></th></tr>';
          while($sectionRow = $sectionRes->fetch()){
            $sectionStr = "<tr><td>".$sectionRow['sectionLetter']."</td><td>".$sectionRow['instructorID']."</td>";
            $sectionStr = $sectionStr ."<td>".$sectionRow['time']."</td><td>".$sectionRow['days']."</td><td>".$sectionRow['seats']."</td>";
            $sectionStr = $sectionStr ."<td><form><button>Select Section</button></form></td></tr>";
            $sectionDivs = $sectionDivs . $sectionStr;
          }
          $sectionDivs = $sectionDivs . '</table>';
        }        
        $sectionDivs = $sectionDivs . '</div>';
        $sectionDivs = $sectionDivs . '</div>';
        $sectionDivs = $sectionDivs . '</div>';        
        
      }
      print '</table>'; 
    }
    
    print '<br><br>';
    print '</div>'; 
  }
}
print $sectionDivs;
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
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

</body>
</html>