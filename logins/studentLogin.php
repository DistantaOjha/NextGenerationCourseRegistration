<!-- Author Distanta -->
<form action="logins/php/login.php" method="POST" class = "loginForm">
    <div>
        <input type="hidden" name="table" value="StudentUsers">
        <p class = "loginTitle">Welcome Student</p>
        </br>
        <label for="ulogin" class = "loginLabel"><b>Username</b></label>
        </br>
        <input type="text" class= "loginInputText" placeholder="Enter your username" name="login">
        </br>
        <label for="pass" class = "loginLabel"><b>Password</b></label>
        </br>
        <input type="password" class= "loginInputPass" placeholder="Enter Password" name="pass"> 
        </br></br>      
        <button type="submit" class = "loginButton">Login</button>
  </div>
</form>