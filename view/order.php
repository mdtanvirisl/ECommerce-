<?php
    include('../controller/sessioncheck.php');
    include_once('../model/userModel.php');
    
    // session_start();
    $orders = showOrder($_SESSION['user']['username']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Order </title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">

        <style>
            /* Style for the main table */
            table {
                border-collapse: collapse;
                width: 95%;
                margin-left: 30px;
                font-size: small;
            }

            th, td {
                border: 2px solid darkcyan;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #add8e6e1;
                font-size: 1.1em;
                text-align: center;

            }

            /* Style for the link to go back to home */
            .btn {
                display: block;
                padding: 10px;
                margin: 25px 530px 25px 530px;
                border-radius: 10px;

                text-align: center;
                background-color: #41b5dfe1;
                color: black;
            }

            .btn:hover {
                text-decoration: none;
                background-color: #fc8754;
                color: black;
            }
        </style>
    </head> 
<body>
    <?php   /* session_start(); */   include('../view/header.php'); ?>

    <h3 class="page_title">Your Order: </h3>

    <table border=1 width = "100%">
        <tr>
            <th>Order Id</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Username</th>
            <th>Name</th>
            <th>Address</th>
            <th>Number</th>
        </tr>
        
        <?php  for($i=0; $i<count($orders); $i++){ ?>
            <tr>
                <td><?=$orders[$i]['order_id']?></td>
                <td><?=$orders[$i]['product_id']?></td>
                <td><?=$orders[$i]['product_name']?></td>
                <td><?=$orders[$i]['quantity']?></td>
                <td><?=$orders[$i]['total_price']?></td>
                <td><?=$orders[$i]['UserName']?></td>
                <td><?=$orders[$i]['Name']?></td>
                <td><?=$orders[$i]['Address']?></td>
                <td><?=$orders[$i]['Number']?></td>
            </tr>
        <?php } ?>

    </table> 

    <a class="btn" href="../view/home.php">Go Back To HOME...</a>     
</body>
</html>

<?php include('../view/footer.php'); ?>