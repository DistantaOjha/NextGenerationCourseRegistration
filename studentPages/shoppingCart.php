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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Student Course Regsitration 2.0</title>
  <style>
.addLine {
    color: rgb(204, 125, 7);
}

.addInputText{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 8px;
  border: 1px solid #ccc;
}

.addInputText:hover{
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


.addLabel{
    margin: 8px 8px;
    padding: 5px 5px 5px 5px;  
}

.addForm{
   border-left: 3px solid;
   border-color: rgb(223, 218, 213);
}


table {
  border-collapse: collapse;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

.searchButton{
  background-color: blue;
  color: white
}

.searchButton:hover{
  opacity: 0.5
}

  </style>

</head>

<link rel="stylesheet" href="../css/master.css">
<?php
    include("../php/bootstrap.php");
?>

<body>

<?php
  include('menubar.php');
?>


<div class = "main">
This is shopping cart page
<form action="#" method="post" class = "addForm">
    <div>
        </br>
        <table style="width:100%">
        <tr>
          <td>
            <label class = "addLabel"><b>Place 1</b></label>
            </br>
            List by preference. <br>
            1. <input type="text" class= "addInputText" placeholder="Enter First Choice" name="firstCourse1">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=1.1"><i class="fa fa-search"></i></a>
            <br>
            2. <input type="text" class= "addInputText" placeholder="Enter Second Choice" name="firstCourse2">
            <a href = "shoppingCartUtils/searchClasses.php?placeVal=1.2"><i class="fa fa-search"></i></a>
          </td>
          <td>
            <label for="secondCourse" class = "addLabel"><b>Place 2</b></label>
            </br>
            List by preference. <br>
            1. <input type="text" class= "addInputText" placeholder="Enter First Choice" name="secondCourse1">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=2.1"><i class="fa fa-search"></i></a>
            <br>
            2. <input type="text" class= "addInputText" placeholder="Enter Second Choice" name="secondCourse2">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=2.2"><i class="fa fa-search"></i></a>
          </td>
        </tr>

        <tr bgcolor="#eee";>
          <td>
            <label class = "addLabel"><b>Place 3</b></label>
            </br>
            List by preference. <br>
            1. <input type="text" class= "addInputText" placeholder="Enter First Choice" name="thirdCourse1">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=3.1"><i class="fa fa-search"></i></a>
            <br>
            2. <input type="text" class= "addInputText" placeholder="Enter Second Choice" name="thirdCourse2">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=3.2"><i class="fa fa-search"></i></a>
          </td>
          <td>
            <label class = "addLabel"><b>Place 4</b></label>
            </br>
            List by preference. <br>
            1. <input type="text" class= "addInputText" placeholder="Enter First Choice" name="fourthCourse1">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=4.1"><i class="fa fa-search"></i></a>
            <br>
            2. <input type="text" class= "addInputText" placeholder="Enter Second Choice" name="fourthCourse2">
               <a href = "shoppingCartUtils/searchClasses.php?placeVal=4.2"><i class="fa fa-search"></i></a>
          </td>
        </tr>
        </table>
        </br>
        <i>Note: Once you submit you cannot change your choices until after you are registered for classes.</i>
        <button type="submit" class = "addButton">Submit Courses</button>
  </div>
</form>
</div>

</body>
</html>