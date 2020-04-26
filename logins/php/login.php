<?php

include_once('login_utils.php');
include_once('../../php/dbconnect.php');

    $table = $_POST['table'];
	
	$result = checkUser($db, $table, $_POST['login'], $_POST['pass']);

	if($result == 1){
        session_start();
        $_SESSION['username'] = $_POST['login'];

		if($table == 'RegistrarUsers'){
            header("Location: ../../registrarPages/registrarLand.php");
            exit;
        }
        if($table == 'InstructorUsers'){
            header("Location: ../../instructorPages/instructorLand.php");
            exit;
        }        
        if($table == 'InstructorUsers'){
            header("Location: ../../studentPages/studentLand.php");
            exit;
        }
	}
	
	if($result == -1){
		print("Login failed: given user does not exist.");
	}
	
	if($result == -2){
		print("Login failed: confirm your username and password");
	}

?>