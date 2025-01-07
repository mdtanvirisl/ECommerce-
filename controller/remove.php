
<?php

   require_once('../model/userModel.php');
    $productid = "";
    if(isset($_GET['productid'])) {
      $productid = $_GET['productid'];
    }

    $stutus = removeProduct($productid);

    if($stutus){
        header("Location:../view/cart.php");
    }
    else{
        echo "Error!";
    }

?>