<?php
include_once("../model/userModel.php");

$currpassword = isset($_REQUEST['currpassword']) ? $_REQUEST['currpassword'] : "";
$newpassword = isset($_REQUEST['newpassword']) ? $_REQUEST['newpassword'] : "";
$retypepassword = isset($_REQUEST['retypepassword']) ? $_REQUEST['retypepassword'] : "";

$currpasswordError = $newpasswordError = $retypepasswordError = $confirmPasswordError = "";

$error = "";

if (isset($_POST["submit"])) {

    if (!$currpassword) {
        $currpasswordError = "Please enter current password";
    }
    if (!$newpassword) {
        $newpasswordError = "Please enter a new password";
    }
    if (!$retypepassword) {
        $retypepasswordError = "Please retype new password";
    }
    if($currpassword && $newpassword && $retypepassword){
        $auth = getAuth($_SESSION['user']['username']);

        if($currpassword == $auth){
            if ($newpassword != $retypepassword) {
                $confirmPasswordError = "Passwords did not match";
            }
            else{
               $status = updatePassword($_SESSION['user']['username'], $newpassword);
               if($status){
                header('location: ../view/login.php');
               }
               else{
                $error = "Database Error!";
               }
            }
        }
    }
}


?>