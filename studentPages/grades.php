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

<link rel="stylesheet" href="../css/master.css">

<?php
include("../php/bootstrap.php");
?>

<body>

  <?php
  include('menubar.php');
  ?>
  
  <BR>
  
  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          Grades for Alex E Example
          
          <BR></BR>

          <table style="width:100%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <th>Course</th>
              <th>Grade(GPA)</th>
            </tr>
            <tr>
              <td>Elementary Arabic</td>
              <td>3.55</td>
            </tr>
          </table>
        </DIV>
      </DIV>
    </DIV>
  </div>
  
  <?php
  $qStr = "SELECT name, Grade FROM Transcripts as T JOIN Sections as S ON T.sectionID = S.sectionID  JOIN Courses as C ON S.courseID = C.courseID;";
	$qRes = $db->query($qStr);

  echo "<div class='main'>
  <DIV class='container'>
  <DIV class='row'>
  <DIV class='col-md-12'>
  Grades for Alex E Example
  <BR></BR>
  <table style='width:100%' border='1' cellspacing='0' cellpadding='5'>
  <tr>
  <th>Course</th>
  <th>Grade(GPA)</th>
  </tr>";

	while ($row = $qRes->fetch()) {
	  echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['grade'] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>
  </DIV>
  </DIV>
  </DIV>
  </div>";

  ?> 
  
</body>


</html>