<?php
    include('../controller/sessioncheck.php');
    include('../model/userModel.php');

    $productid = "";
    if(isset($_GET['productid'])) {
      $productid = $_GET['productid'];
    }
    $products = getproduct($productid);

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

        <link rel="stylesheet" href="../view/fieldset_btn.css">

        <style>
            img {
                /* max-width: 100%; */
                height: 300px;
                width: 250px;
                padding-top: 15px;
            }
        </style>
    </head> 
<body>

    <?php include('../view/header.php'); ?>

    <h3 class="page_title">Welcome <?php echo $_SESSION['user']['username']; ?> </h3>

    <fieldset>
        <table>
            <tr>
                <td>
                    <img src="../image/<?php echo $products["p_img"]; ?>" alt="Product - Bag" width='350' height='450'>
                </td>
                <td>
                    Name: <span><?php echo $products["product_name"]; ?></span>
                    <br>
                    Price: <span><?php echo $products["price"]; ?></span>
                    <br>
                    <!-- Color: 
                    <br> -->
                    Quantity: <span><?php echo $products["quantity"]; ?></span>
                </td>
                <td>
                    <a id="btn" href='../controller/addtocart.php?productid=<?=$products['product_id']?>'>Add to Cart</a>
                </td>
            </tr>
        </table>
    </fieldset>

    <hr>

    <h3 class="page_title">Featured Products:</h3>
        <table align="center">
            <tr> 
                <td>
                    <?php 
                    echo "<a href='../product/earrings1.php'><img src='../image/earrings1.JPG' alt='earrings1' width='350' height='450'></a> ";
                    ?> <br>
                    Price: <br>
                    <a id="btn" href='cart.php'>Add to Cart</a>
                </td>
                <td>
                    <?php 
                    echo "<a href='../product/earrings2.php'><img src='../image/earrings2.JPG' alt='earrings2' width='350' height='450'></a> ";
                    ?> <br>

                    Price: <br>
                    <a id="btn" href='cart.php'>Add to Cart</a>
                </td>
                <td>
                    <?php 
                    echo "<a href='../product/bangle.php'><img src='../image/bangle.JPG' alt='bangle' width='350' height='450'></a> ";
                    ?> <br>

                    Price: <br>
                    <a id="btn" href='../view/cart.php'>Add to Cart</a>
                </td>
                
            </tr>

            <tr>
                <!-- <td>
                    <?php 
                    // echo "<a href='../product/earrings1.php'><img src='../image/earrings1.JPG' alt='earrings1' width='350' height='450'></a> ";
                    ?> <br>
                    Price: 
                    <a href='cart.php'>Add to Cart</a>
                </td>
                <td>
                    <?php 
                    // echo "<a href='../product/earrings2.php'><img src='../image/earrings2.JPG' alt='earrings2' width='350' height='450'></a> ";
                    ?> <br>

                    Price: 
                    <a href='cart.php'>Add to Cart</a>
                </td>
                <td>
                    <?php 
                    // echo "<a href='../product/bangle.php'><img src='../image/bangle.JPG' alt='bangle' width='350' height='450'></a> ";
                    ?> <br>

                    Price: 
                    <a href='cart.php'>Add to Cart</a>
                </td> -->
                
                <?php // echo "<td> <a href='../product/bengal.php'><img src='../image/bengal.JPG' alt='Bag3' width='350' height='450'></a> </td> "; ?>
            
            </tr>
        </table>

        <?php include('../view/footer.php'); ?>

</body>
</html>