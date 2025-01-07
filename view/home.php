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

    <h3 class="page_title">Welcome <?php echo $_SESSION['user']['username']; ?> </h3>

    <div id="product">
     <!-- all product wll show here -->
    </div>

        <br><hr>

        <h3 class="page_title">Featured Products:</h3>
        <table>
            <tr> 
                <td>
                    <a href='../product/earrings1.php'><img src='../image/earrings1.JPG' alt='earrings1' width='350' height='450'></a> <br>
                    Product Name: <br>
                    Price: <br>
                    <a class="add_to_cart_btn" href='cart.php'>Add to Cart</a>
                </td>
                <td>
                    <a href='../product/earrings2.php'><img src='../image/earrings2.JPG' alt='earrings2' width='350' height='450'></a> <br>
                    Product Name: <br>
                    Price: <br>
                    <a class="add_to_cart_btn" href='cart.php'>Add to Cart</a>
                </td>
                <td>
                    <a href='../product/bangle.php'><img src='../image/bangle.JPG' alt='bangle' width='350' height='450'></a> <br>
                    Product Name: <br>
                    Price: <br>
                    <a class="add_to_cart_btn" href='../view/cart.php'>Add to Cart</a>
                </td>
            </tr>
        </table>

    <?php include('../view/footer.php'); ?>
</body>
</html>