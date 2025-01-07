<?php
include_once("../model/userModel.php");
include_once("../model/registrationFunction.php");

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : "";
$number = isset($_REQUEST['number']) ? $_REQUEST['number'] : "";
$gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : "";
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
$confirmPassword = isset($_REQUEST['confirmPassword']) ? $_REQUEST['confirmPassword'] : "";
$ques1 = isset($_REQUEST['ques1']) ? $_REQUEST['ques1'] : "";
$ques2 = isset($_REQUEST['ques2']) ? $_REQUEST['ques2'] : "";


$nameError = $usernameError = $emailError = $numberError = $genderError = "";
$passwordError = $confirmPasswordError = $ques1Error = $ques2Error = $addressError = "";

$error = "";

if (isset($_POST["submit"])) {

    if (!$name) {
        $nameError = "Please enter your name";
    }

    if (!$username) {
        $usernameError = "Please enter a username";
    }
    
    if (!$email) {
        $emailError = "Please enter your email";
    }
    if (!$number) {
        $numberError = "Please enter your number";
    }
    
    if (!$gender) {
        $genderError = "Please select your gender";
    }

    if (!$address) {
        $addressError = "This field cant be empty";
    }

    if (!$password) {
        $passwordError = "Please enter Password";
    }
    if ($password && strlen($password) < 6) {
        $passwordError = "Password must be at least 6 characters";
    }
    if (!$confirmPassword) {
        $confirmPasswordError = "Please enter Confirm Password";
    }


    if (!$ques1) {
        $ques1Error = "Please set security Question";
    }

    if (!$ques2) {
        $ques2Error = "Please set security Question";
    }
    if ($confirmPassword != $password) {
        $confirmPasswordError = "Passwords did not match";
    }

    if ($name && $username && $email && $number && $gender && $password && $address && $ques1 && $ques2 && $password == $confirmPassword) {
        
        $flag = true; 

        if (!nameCheck($name)) {
            $nameError = "Please enter your name at least two words";
            $flag = false;
        }
        if (!usernameChaeck($username)) {
            $usernameError = "username must contains num & alpha ";
            $flag = false;
        }
        if (!numberCheck($number)) {
            $numberError = "number must start with 0 & 1 & must be 11 digits";
            $flag = false;
        }

        if($flag){
            $customer = ['name'=>$name, 'username'=>$username, 'email'=>$email, 'number'=>$number, 'address'=>$address, 'gender'=>$gender, 'password'=>$password, 'ques1'=>$ques1, 'ques2'=>$ques2];
            $error = register($customer);
        }

    }
}
