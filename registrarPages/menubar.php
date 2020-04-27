<DIV class="container">
  <DIV class="row">
      <DIV class="col-md-12 titleBar">
        <h1>Welcome, Username!</h1>
      </DIV>
  </DIV>
  <div class="row">
    <DIV class="col-md-3 menuColumn">
      <form action= "registrarLand.php" >
        <button class = "textButton" type="submit">Home</button>
      </form>
    </DIV>
    <DIV class="col-md-3 dropButton">
      <button class = "textButton">Add</button>
      <div class="dropButtonContent">
        <form action="addDepartment.php">
          <button class="dropInnerButton" type="submit">Departments</button>
        </form>
        <form action="addInstructor.php">
          <button class="dropInnerButton" type="submit">Instructors</button>
        </form>
        <form action="addStudent.php">
          <button class="dropInnerButton" type="submit">Students</button>
        </form>
      </div>
    </DIV>
    <DIV class="col-md-3 dropButton">
      <button class = "textButton">Search</button>
      <div class="dropButtonContent">
        <form action="showCourses.php">
          <button class="dropInnerButton" type="submit">Courses</button>
        </form>
        <form action="showDepartments.php">
          <button class="dropInnerButton" type="submit">Departments</button>
        </form>
        <form action="showInstructors.php">
          <button class="dropInnerButton" type="submit">Instructors</button>
        </form>
        <form action="showStudent.php">
          <button class="dropInnerButton" type="submit">Students</button>
        </form>
      </div>
    </DIV>
    <DIV class="col-md-3 menuColumn">
      <form action="../index.php">
        <button class = "textButton" type="submit" onclick="logout()">Logout</button>
      </form>
    </DIV> 
    <DIV class="col-md-3 dropButton">
      <button class = "textButton">AI</button>
      <div class="dropButtonContent">
        <form action="AI/runJava.php">
          <button class="dropInnerButton" type="submit">Run Next Generation AI</button>
        </form>
        <form action="AI/viewCurrentCSV.php">
          <button class="dropInnerButton" type="submit">View AI Suggestion</button>
        </form>
        <form action="registerClassesConfirm.php">
          <button class="dropInnerButton" type="submit">Register Classes</button>
        </form>
      </div>
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