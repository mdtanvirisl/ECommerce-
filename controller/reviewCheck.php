<?php
include_once("../model/userModel.php");

$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
$addressError = "";

if (isset($_POST["submit"])) {

    if (!$address) {
        $addressError = "Please write something for post review";
    }
    if($address){
        // session_start();
        $review = ['username'=>$_SESSION['user']['username'], 'message'=>$address];
        review($review);
    }

}

?>