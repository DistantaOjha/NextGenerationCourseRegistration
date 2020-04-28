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

<link rel="stylesheet" href="../../css/master.css">
<?php
include("../../php/bootstrap.php");
?>

<body>
  <?php
  include('../menubar.php');
  ?>
  <div class="main">
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          <?php
          $r=`bash -ic 'echo \$JAVA_HOME; which java; javac /Accounts/turing/students/s22/ojhadi01/public_html/NextGenerationCourseRegistration/registrarPages/AI/*.java 2>&1'`;
          $r=`bash -ic 'echo \$JAVA_HOME; which java; java -cp /Accounts/turing/students/s22/ojhadi01/public_html/NextGenerationCourseRegistration/registrarPages/AI/ DataProcess 2>&1'`;
          #echo "<pre>$r</pre>";
          echo "Registration CSV file has been created. Please inspect the file before proceeding";
        ?>
        <a href= "registration.csv">Open the CSV file</a>
        </DIV>
      </DIV>
    </DIV>
  </div>
</body>

</html>