<?php
function checkUser($db, $table, $login, $pass){

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
$logStr = "SELECT $var FROM $table WHERE $var = '$login';";
//take query response
$userRes = $db->query($logStr);

//query user for pass correctness
$passStr = "SELECT $var FROM $table WHERE $var = '$passHash';";
//take query response
$passRes = $db->query($passStr);
$passRow = $passRes->fetch();

//if user is in table, email verified, pass matches, 1
//if user does not exist, -1
//if password hash does not match, -2

if($userRes->fetch() != FALSE){
    if($login == $passRow{$var}){
        return 1;
    }
    return -2;
}
return -1;
}
?>