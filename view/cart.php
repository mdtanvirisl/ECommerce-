<?php 
include('../controller/sessioncheck.php');
include('../model/userModel.php');
// include_once('../controller/cartCheck.php');

    $showProduct = showCart();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Cart </title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">

        <link rel="stylesheet" href="../view/fieldset_btn.css">

        <style>
            /* Style for product images - real size of img */
            /* img {
                max-width: 100%;
                height: auto;
            } */
            
            /* Style for each product row */
            tr {
                border-bottom: 1.5px solid #ddd;
            }

            /* Style for table cells */
            td {
                padding: 10px 20px 10px 20px;
            }
        </style>
    </head>
<body>
    <?php include('../view/header.php'); ?>

    <h3 class="page_title">Your Shopping Cart </h3>
    
    <form method = "POST" action="../view/checkout.php">
        <fieldset>
            <legend>Your Cart: </legend> 
            <table>
                <?php   for($i=0; $i<count($showProduct); $i++){ ?>
                <tr>
                    <td>
                        <tr>
                            <td>
                                <img src="../image/<?=$showProduct[$i]['p_img']?>" alt="" width='150' height='150'>
                            </td>
                            <td>
                                ID: <span> <?=$showProduct[$i]['product_id']?> </span> <br>
                                Product: <span> <?=$showProduct[$i]['product_name']?> </span> <br>
                                price: <span> <?=$showProduct[$i]['price']?> </span> <br>
                            </td>
                            <td>
                                <a id="btn" href="../controller/remove.php?productid=<?=$showProduct[$i]['product_id']?>"> Remove </a> 
                                <br> 
                                <a id="btn" href="checkout.php?productid=<?=$showProduct[$i]['product_id']?>">Checkout</a>
                            </td>
                        </tr>
                    </td>
                </tr>
            <?php } ?> 
            </table>
        </fieldset>
    </form>
    
    <!-- <br><br> -->
        <!-- <fieldset>
            <legend>Bill: </legend>

            <label for="total">Total: </label> <br> <br>
            <label for="shipping_charge">Shipping Charge: </label> <br> <br>
            <br>
            <label for="totalbill"><b>Total Bill:</b></label>
        </fieldset> -->

        <!-- <br><br> -->

        <!-- <table align="center">
            <tr><td>
                <form action= "../view/checkout.php" method="post" enctype="multipart/form-data" novalidate>                
                    <input type="submit" value="Proceed Checkout">      
                </form>
            </td></tr>
    </table> -->
</body>
</html>

<?php include('../view/footer.php'); ?>