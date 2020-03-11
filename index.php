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
                    <form action = "studentLand.php">
                        <button type="submit">Student</button>
                    </form>
                </DIV>
                <DIV class="col-md-4 menuColumn">
                    <form action = "instructorLand.php">
                        <button type="submit">Instructor</button>
                    </form>
                </DIV>
                <DIV class="col-md-4 menuColumn">
                    <form action = "registrarLand.php">
                        <button type="submit">Registrar</button>
                    </form>
                </DIV>
            </DIV>
        </DIV>
    </body>
</html>
