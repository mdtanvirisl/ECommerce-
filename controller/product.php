
<?php
    include('../model/userModel.php');

    $products = getAllProduct();
    echo json_encode($products);
?>