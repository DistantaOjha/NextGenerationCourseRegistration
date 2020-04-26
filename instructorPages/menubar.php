<DIV class="container">
  <DIV class="row">
      <DIV class="col-md-12 titleBar">
        <h1>Welcome, Username!</h1>
      </DIV>
  </DIV>
  <div class="row">
    <DIV class="col-md-2 menuColumn">
      <form action= "instructorLand.php" >
        <button class = "textButton" type="submit">Home</button>
      </form>
    </DIV>
    <DIV class="col-md-2 menuColumn">
      <form action="instructorLand.php">
        <button class = "textButton" type="submit">Courses</button>
      </form>
    </DIV>
    <DIV class="col-md-2 menuColumn">
      <form action="instructorAdd.php">
        <button class = "textButton" type="submit">Add Course</button>
      </form>
    </DIV>    
    <DIV class="col-md-2 menuColumn">
      <form action="instructorLand.php">
        <button class = "textButton" type="submit">Students</button>
      </form>
    </DIV>    
    <DIV class="col-md-2 menuColumn">
      <form action="instructorLand.php">
        <button class = "textButton" type="submit">Settings</button>
      </form>
    </DIV>    
    <DIV class="col-md-2 menuColumn">
      <form action="../index.php">
        <button class = "textButton" type="submit" onclick="logout()">Logout</button>
      </form>
    </DIV>
  </DIV>
</div>
<script>
function logout(){
  session_start();
  unset($_SESSION["username"]);
  header("Location: ../index.php");
}
</script>