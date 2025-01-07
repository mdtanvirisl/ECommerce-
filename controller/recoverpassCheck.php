<?php
include_once("../model/userModel.php");

$newpassword = isset($_REQUEST['newpassword']) ? $_REQUEST['newpassword'] : "";
$retypepassword = isset($_REQUEST['retypepassword']) ? $_REQUEST['retypepassword'] : "";

$newpasswordError = $retypepasswordError = "";

if (isset($_POST["submit"])) {

    if (!$newpassword) {
        $newpasswordError = "Please enter new password";
    }
    if (!$retypepassword) {
        $retypepasswordError = "Please retype new password";
    }
    if ($newpassword && strlen($newpassword) < 6) {
        $newpasswordError = "Password must be at least 6 characters";
    }
    if($newpassword && $retypepassword){
        if ($retypepassword != $newpassword) {
            $retypepasswordError = "passwords did not match";
        }
        else{
            session_start();
            $username = $_SESSION['username'];
            $status = updatePassword($username, $newpassword);
    
            if($status){
                session_start();
                unset($_SESSION['pass']);
                header("Location: ../view/login.php");
            }
            else{
                $error = "Passwords did not updated";
            }
        }
    }
}
?>