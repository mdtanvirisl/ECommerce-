<?php 
    session_start();
    require_once("../model/userModel.php");
    
    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
    
    $status = login($username, $password);
    // die($status);

    if(!$username && !$password){
        $_SESSION['error'] = "Please Enter All Required Informations";
    }
    else if($status){
        // $_SESSION['flag'] = 'true';
        $_SESSION['error'] = "";
        setcookie('flag', 'true', time()+3600, '/');
        // setcookie('flag', 'true', time()+10, '/');
        header('location: ../view/home.php');
    }
    else{
        $_SESSION['error'] =  "Invalid Username / Password!";
        header('location: ../view/login.php');
    }
?>