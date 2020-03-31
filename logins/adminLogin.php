<style>

.loginLine {
    color: rgb(204, 125, 7);
}

.loginInputText, .loginInputPass {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 8px;
  border: 1px solid #ccc;
}

.loginInputText:hover, .loginInputPass:hover {
    border: 1px solid rgb(11, 146, 224);
}


.loginButton {
  background-color: rgb(225, 125, 7);
  color: white;
  padding: 12px 20px;
  margin: 8px 8px;
  width: 57%;
}

.loginButton:hover {
  opacity: 0.8;
}


.loginLabel{
    margin: 8px 8px;
    padding: 5px 5px 5px 5px;  
}

.loginForm{
   border-left: 3px solid;
   border-color: rgb(223, 218, 213);
   width: 50%;
   height: 50%; 
}
</style>


<h3>Welcome Registrar</h3>
<form action="registrarPages/registrarLand.php" method="post" class = "loginForm">
    <div>
        </br>
        <label for="ulogin" class = "loginLabel"><b>Username</b></label>
        </br>
        <input type="text" class= "loginInputText" placeholder="Enter your username" name="ulogin">
        </br>
        <label for="pass" class = "loginLabel"><b>Password</b></label>
        </br>
        <input type="password" class= "loginInputPass" placeholder="Enter Password" name="pass"> 
        </br>      
        <button type="submit" class = "loginButton">Login</button>
  </div>
</form>