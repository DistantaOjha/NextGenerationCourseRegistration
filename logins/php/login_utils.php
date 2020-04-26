<?php
function checkUser($db, $table, $login, $pass){

//hash password
$passHash = md5($pass);

//query user for user presence
$logStr = "SELECT login FROM $table WHERE login = '$login';";
//take query response
$userRes = $db->query($logStr);

//query user for pass correctness
$passStr = "SELECT login FROM $table WHERE pass = '$passHash';";
//take query response
$passRes = $db->query($passStr);
$passRow = $passRes->fetch();

//if user is in table, email verified, pass matches, 1
//if user does not exist, -1
//if password hash does not match, -2

if($userRes->fetch() != FALSE){
    if($login == $passRow{'login'}){
        return 1;
    }
    return -2;
}
return -1;
}
?>