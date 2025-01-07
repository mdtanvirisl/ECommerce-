<?php
    include_once('../model/userModel.php');
    include_once('../model/registrationFunction.php');


    if (!isset($_REQUEST['data'])) {
    $response = ['error' => 'No data received'];
    echo json_encode($response);
    } else {
        $data = json_decode($_REQUEST['data']);
        session_start();
        $username = $_SESSION['user']['username'];
        $userInfo = [
            'name' => $data->name,
            'username' => $username,
            'number' => $data->number,
            'email' => $data->email,
            'address' => $data->address,
            'ques1' => $data->ques1,
            'ques2' => $data->ques2
        ];
        $status = updateProfile($userInfo);
        if ($status) {
            echo json_encode('Profile updated successfully');
        } else {
            echo json_encode('Failed to update profile');
        }
    }

    // $nameError = $emailError = $numberError = $addressError = "";
    // $ques1Error = $ques2Error = "";

    // $error = "";

    // if (isset($_REQUEST['data'])) {

    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $number = $_POST['number'];
    //     $address = $_POST['address'];
    //     $ques1 = $_POST['ques1'];
    //     $ques2 = $_POST['ques2'];

    //     $flag = true;

        
    //     if (!nameCheck($name)) {
    //         $nameError = "Please enter your name at least two words";
    //         $flag = false;
    //     }
    //     if (!$email) {
    //         $emailError = "Please enter your email";
    //         $flag = false;
    //     }
    //     if (!numberCheck($number)) {
    //         $numberError = "number must start with 0 & 1 & must be 11 digits";
    //         $flag = false;
    //     }
    //     if (!$address) {
    //         $addressError = "This field cant be empty";
    //         $flag = false;
    //     }
    //     if (!$ques1) {
    //         $ques1Error = "This field cant be empty";
    //         $flag = false;
    //     }
    //     if (!$ques2) {
    //         $ques2Error = "This field cant be empty";
    //         $flag = false;
    //     }
    //     if($flag){
    //         session_start();
    //         $username = $_SESSION['user']['username'];

    //         $userInfo = ['name' => $name, 'email' => $email, 'number' => $number, 'address' => $address, 'username' => $username, 'ques1' => $ques1, 'ques2' => $ques2];

    //         $status = updateProfile($userInfo);

    //         if($status){
    //             header('Location:../view/eprofile.php');
    //         }
    //         else{
    //             $error = 'Error updating!';
    //         }
    //     }

    // }
?>