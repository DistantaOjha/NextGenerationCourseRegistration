<?php
#AUTHOR: DISTANTA OJHA
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
    <DIV class="container">
      <DIV class="row">
        <DIV class="col-md-12">
          This is shopping cart page

          <?php
          $studentID = $_SESSION['username'];
          $regisSection = $db->query("SELECT * FROM ShoppingCart WHERE studentID = $studentID;");

          $regisInsName = array();
          $regisTime = array();
          $regisDays = array();
          $regisCName = array();


          if ($regisSection != FALSE) {
            while ($regisRow = $regisSection->fetch()) {
              $placeVal = $regisRow['placePref'];
              #Get the section information
              $sectionID = $regisRow['sectionID'];
              $sectionRes = $db->query("SELECT * FROM Sections WHERE sectionID = $sectionID;");
              if ($sectionRes != FALSE) {
                $sectionInfo = $sectionRes->fetch();

                $secCourseID = $sectionInfo['courseID'];
                $coursName = "NA";
                $regisCourse = $db->query("SELECT * FROM Courses WHERE courseID = $secCourseID;");
                if ($regisCourse != FALSE) {
                  $courseTableRow = $regisCourse->fetch();
                  $courseName = $courseTableRow['name'];
                }

                $regisCName[$placeVal] = $courseName;


                #Get the instructor infromation
                $secInstructorID = $sectionInfo['instructorID'];
                //$insQuer = "SELECT * FROM Instructors WHERE instructorID = $secInstructorID;";
                //print $insQuer;
                $insRes = $db->query("SELECT * FROM Instructors WHERE instructorID = $secInstructorID;");
                $instructorName = "NA";
                if ($insRes != FALSE) {
                  $courseInsRow = $insRes->fetch();
                  //print_r($courseInsRow);
                  $instructorName = $courseInsRow['lname'] . ', ' . $courseInsRow['fname'];
                }
                $regisInsName[$placeVal] = $instructorName;

                $secTime = $sectionInfo['time'];
                $regisTime[$placeVal] = $secTime;

                $secDays = $sectionInfo['days'];
                $regisDays[$placeVal] = $secDays;
              }
              //print $placeVal . " ---- " . $courseName . "-----" .  $instructorName;
            }
          }
          ?>
          <?php
          //print_r($regisInsName);
          //print('<br>');
          //print_r($regisTime);
          //print('<br>');
          //print_r($regisDays);
          //print('<br>');
          //print_r($regisCName);
          ?>

          <div>
            </br>
            <table style="width:100%">
              <tr>
                <td>
                  <label class="addLabel"><b>Place 1</b></label>
                  </br>
                  Listed by preference. <br>

                  <table>
                    <tr>
                      <th>Course Name</th>
                      <th>Days</th>
                      <th>time</th>
                      <th>Faculty</th>
                    </tr>
                    <?php
                    print "<tr><td>" . $regisCName['1.1'] . "</td><td>" . $regisDays['1.1'] . "</td><td>" . $regisTime['1.1'] . "</td><td>" . $regisInsName['1.1'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=1.1"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';

                    print "<tr><td>" . $regisCName['1.2'] . "</td><td>" . $regisDays['1.2'] . "</td><td>" . $regisTime['1.2'] . "</td><td>" . $regisInsName['1.2'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=1.2"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';
                    ?>
                  </table>
                </td>

                <td>
                  <label class="addLabel"><b>Place 2</b></label>
                  </br>
                  List by preference. <br>

                  <table>
                    <tr>
                      <th>Course Name</th>
                      <th>Days</th>
                      <th>time</th>
                      <th>Faculty</th>
                    </tr>
                    <?php
                    print "<tr><td>" . $regisCName['2.1'] . "</td><td>" . $regisDays['2.1'] . "</td><td>" . $regisTime['2.1'] . "</td><td>" . $regisInsName['2.1'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=2.1"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';

                    print "<tr><td>" . $regisCName['2.2'] . "</td><td>" . $regisDays['2.2'] . "</td><td>" . $regisTime['2.2'] . "</td><td>" . $regisInsName['2.2'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=2.2"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';
                    ?>
                  </table>

                </td>
              </tr>

              <tr bgcolor="#eee" ;>
                <td>
                  <label class="addLabel"><b>Place 3</b></label>
                  </br>
                  Listed by preference. <br>

                  <table>
                    <tr>
                      <th>Course Name</th>
                      <th>Days</th>
                      <th>time</th>
                      <th>Faculty</th>
                    </tr>
                    <?php
                    print "<tr><td>" . $regisCName['3.1'] . "</td><td>" . $regisDays['3.1'] . "</td><td>" . $regisTime['3.1'] . "</td><td>" . $regisInsName['3.1'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=3.1"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';

                    print "<tr><td>" . $regisCName['3.2'] . "</td><td>" . $regisDays['3.2'] . "</td><td>" . $regisTime['3.2'] . "</td><td>" . $regisInsName['3.2'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=3.2"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';
                    ?>
                  </table>
                </td>

                <td>
                  <label class="addLabel"><b>Place 2</b></label>
                  </br>
                  List by preference. <br>

                  <table>
                    <tr>
                      <th>Course Name</th>
                      <th>Days</th>
                      <th>time</th>
                      <th>Faculty</th>
                    </tr>
                    <?php
                    print "<tr><td>" . $regisCName['4.1'] . "</td><td>" . $regisDays['4.1'] . "</td><td>" . $regisTime['4.1'] . "</td><td>" . $regisInsName['4.1'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=4.1"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';

                    print "<tr><td>" . $regisCName['4.2'] . "</td><td>" . $regisDays['4.2'] . "</td><td>" . $regisTime['4.2'] . "</td><td>" . $regisInsName['4.2'] . "</td>";
                    print '<td><a href = "shoppingCartUtils/searchClasses.php?placeVal=4.2"><i class="fa fa-search"></i></a></td>';
                    print '</tr>';
                    ?>
                  </table>

                </td>
              </tr>
            </table>
            </br>
          </div>
        </DIV>
      </DIV>
    </DIV>
  </div>

</body>

</html>