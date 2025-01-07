<?php
    include('../controller/sessioncheck.php');
    include('../model/userModel.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Home Page</title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
        <link rel="stylesheet" href="../view/img_btn.css">
        <script src="../assets/js/product.js"></script>
    </head> 
<body>
    <?php include('../view/header.php'); ?>
    
    <h3 class="page_title">All Products </h3>
    <div class="search">
        <input type="text" id="searchInput" onkeyup="search()" name="title" placeholder="Search By Name">
    </div>
    <div id="product">
     <!-- all product wll show here -->
    </div>
        
        <!-- <table>
            <?php 
            $i = 0;
            $k = 3;
            while($i<count($products)){ 
            ?>    

            <tr> 
            
            <?php for($j = $i; $j < $k; $j++){ ?>
                <td>
                   <a class="product_img" href="productview.php?productid=<?=$products[$j]['product_id']?>"> <img src="../image/<?= $products[$j]["p_img"] ?>" alt="Product - Bag" width='350' height='450'></a> <br>
                    Product Name: <span><?= $products[$j]["product_name"] ?></span> <br>
                    Price: <span><?= $products[$j]["price"] ?></span> <br>
                    <a class="add_to_cart_btn" href='../controller/addtocart.php?productid=<?=$products[$j]['product_id']?>'>Add to Cart</a>
                </td>
                <?php } ?>
            </tr>
            <?php $i = $i + 3; 
                  $k = $k + 3;} ?>

        </table> -->

    <?php include('../view/footer.php'); ?>
</body>
</html>