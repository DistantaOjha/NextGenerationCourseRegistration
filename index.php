<!DOCTYPE html>
<html lang = "en">
<meta charset = "UTF-8" />
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
                        <button onClick = "myFunction('student', 'instructor', 'registrar')">Student</button>
                </DIV>
                <DIV class="col-md-4 menuColumn">
                        <button onClick = "myFunction('instructor', 'student', 'registrar')">Instructor</button>
                </DIV>
                <DIV class="col-md-4 menuColumn">
                    <button onClick = "myFunction('registrar', 'student', 'instructor')">Registrar</button>
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
