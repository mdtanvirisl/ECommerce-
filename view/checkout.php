<?php

    include_once('../model/userModel.php');
    include_once('../controller/cartCheck.php');
 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Checkout </title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
        
    </head> 

<body>

<?php session_start(); include('../view/header.php'); ?>

<h3 align="center"><i>Your Order: </i></h3>

    <form method="POST" action="">
        <fieldset>
            <legend>Enter quantity</legend>
            Quantity : <input type="number" name="quantity" value="<?php echo $quantity; ?>">
            <input type="submit" name="submit"value="Calculate Total">
        </fieldset>
    </form>

    <fieldset>
        <legend>Bill: </legend>

        <p>Total: <span><?php echo $total;?></span> </p> 
        <p>Delivery Charge: <span><?php echo $charge;?></span></p>
        <label for="totalbill"><b>Total Bill: <span><?php echo $totalbill;?></span> </b></label>
    </fieldset>

    <br><br>

    <table align="center">
        <tr><td>
            <form action= "../controller/orderCheck.php" method="post" enctype="multipart/form-data" novalidate>                
            <input type="submit" value="Confirm Order">
            </form>
        </td></tr>
    </table>

</body>
</html>

<?php include('../view/footer.php'); ?>
