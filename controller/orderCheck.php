<?php
session_start();

    include_once('../model/userModel.php');

    $user = getUser($_SESSION['user']['username']);


    $orderinfo = ['productid' => $_SESSION['order']['productid'], 'productname' => $_SESSION['order']['productname'],'quantity' => $_SESSION['order']['quantity'], 'total' => $_SESSION['order']['total'], 'name'=> $user['Name'], 'username'=> $user['UserName'], 'address'=> $user['Address'], 'number'=> $user['Number']];

    $stutus = order($orderinfo);
    $flag = removeProduct($_SESSION['order']['productid']);

    if($stutus && $flag){
        header("Location:../view/order.php");
    }
    else{
        echo "error!";
    }


?>