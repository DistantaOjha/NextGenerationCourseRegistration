<?php
function checkUser($db, $table, $login, $pass){
//Author Issac
//hash password
$passHash = md5($pass);

if($table == 'RegistrarUsers'){
    $var = 'rid';
} else if($table == 'InstructorUsers'){
    $var = 'iid';
} else {
    $var = 'sid';
}

//query user for user presence
$logStr = "SELECT $var, pass FROM $table WHERE $var = '$login';";
//take query response
$userRes = $db->query($logStr);

//if user is in table, pass matches, 1
//if user does not exist, -1
//if password hash does not match, -2

$userRow = $userRes->fetch();

if($userRow != FALSE){
    if($passHash == $userRow{'pass'}){
        return 1;
    }
    return -2;
}
return -1;
}
?>