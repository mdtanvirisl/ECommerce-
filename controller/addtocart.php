<?php

   include_once('../model/userModel.php');
   $productid = "";
    if(isset($_GET['productid'])) {
      $productid = $_GET['productid'];
    }
   $products = getproduct($productid);
   $product = [ 'product_id'=>$products['product_id'], 'product_name'=>$products['product_name'], 'price'=>$products['price'], 'p_img'=>$products['p_img'] ];
   $status = addtocart($product);

   if($status){
      header("Location: ../view/home.php");
   }
   else{
      echo "error!";
   }

?>