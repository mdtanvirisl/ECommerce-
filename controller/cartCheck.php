<?php
include_once('../model/userModel.php');

    $quantity = isset($_REQUEST['quantity']) ? $_REQUEST['quantity'] : 1;

    $productid = "";
    $product = Array();
    $charge = 100;
    $totalbill = 0;
    $total = 0;

if (isset($_POST["submit"])) {
    if (isset($_GET['productid'])) {
        $productid = filter_var($_GET['productid'], FILTER_SANITIZE_NUMBER_INT);
    }

    if (!empty($productid) && !empty($quantity)) {
        $product = getproduct($productid);

        if ($product) {
            $price = (int)$product['price'];
            $total += $price * (int)$quantity;
        } else {
            echo "Product not found.";
        }
        $totalbill = $charge + $total;
        session_start();
        $_SESSION['order'] = ['productid'=>$productid, 'total'=> $totalbill, 'quantity'=>$quantity, 'productname'=> $product['product_name'] ];
    } else {
        echo "Invalid product ID or quantity.";
    }
}

    
?>