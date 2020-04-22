<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<html>

<head>
    <title>Regsitration 2.0</title>
    <link rel="stylesheet" href="css/master.css">
    <?php
    include("php/bootstrap.php");
    ?>
</head>

<body>
    <DIV class="container">
        <DIV class="row">
            <DIV class="col-md-12 titleBar">
                <H1>Welcome to Registration 2.0!</H1>
            </DIV>
            <DIV class="col-md-12 titleBar">
                <H2>What type of user are you?</H2>
            </DIV>
        </DIV>
        <DIV class="row">
            <DIV class="col-md-4 menuColumn">
                <button onClick="myFunction('student', 'instructor', 'registrar')" class="textButton">Student</button>
            </DIV>
            <DIV class="col-md-4 menuColumn">
                <button onClick="myFunction('instructor', 'student', 'registrar')" class="textButton">Instructor</button>
            </DIV>
            <DIV class="col-md-4 menuColumn">
                <button onClick="myFunction('registrar', 'student', 'instructor')" class="textButton">Registrar</button>
            </DIV>
        </DIV>

        <div id="student" style="display: none;">
            <?php
            include_once("logins/studentLogin.php");
            ?>
        </div>

        <div id="instructor" style="display: none;">
            <?php
            include_once("logins/instructorLogin.php");
            ?>
        </div>

        <div id="registrar" style="display: none;">
            <?php
            include_once("logins/adminLogin.php");
            ?>
        </div>
        <DIV class="row">
            <DIV class="col-md-12 mainBox">
                <p>Welcome to the Next Generation Course Registration project's landing page! <br>
                    As part of the CS360 course, we are attempting to showcase a possible use <br>
                    of database knowledge learned throughout the semester. <br> 
                    Specifically, a more effective, fair, and optimized course registration system! Enjoy!</p>
            </DIV>
        </DIV>
    </DIV>
    <script>
        function myFunction(showDivName, hideDivName1, hideDivName2) {
            var show = document.getElementById(showDivName);
            if (show.style.display === "none") {
                show.style.display = "block";
                var hide1 = document.getElementById(hideDivName1);
                hide1.style.display = "none";
                var hide2 = document.getElementById(hideDivName2);
                hide2.style.display = "none";
            }
        }
    </script>
</body>

</html>