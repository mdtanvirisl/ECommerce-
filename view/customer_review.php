<?php
    include('../controller/sessioncheck.php');
    include_once("../model/userModel.php");
    include_once("../controller/reviewCheck.php");

    $review = showAllReview();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Customer Review</title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">

        <style>
            #review_form {
                max-width: 600px;
                margin: 20px auto;
                padding: 10px;
                background-color: lightgoldenrodyellow;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }
            /* -------------Show Reviews Part------------- */ 
            fieldset{
                background-color: #ffd9c0;
                border-radius: 15px;
            }

            .reviews{
                margin: 15px 40px 15px 40px;
            }
            
            #reviews_1{
                padding-left: 15px;
                color: darkblue;
            }

            #reviews_2{
                margin: 0px 40px 0px 40px;
            }

            hr {
                border: 1px dotted #00008b;
                margin: 10px 0;
            }

            #link{
                text-align: center;
                font-size: 17px;
            }
        </style>
    </head> 
<body>
<?php 
    include('../view/header.php'); ?>

    <h3 class="page_title" style="color: darkblue">Leave Your Precious Review:</h2>

    <div id="review_form">
        <form action= "" method="post" >
            <textarea id="address" name="address" rows="3" cols="100" placeholder="Write Here.... "></textarea>
            <br><span id="addressErr"></span><br>
            <input onclick='return review()' class="submit_btn" type="submit" name="submit" value="Submit Review">      
        </form>
    </div>

    <div class="reviews">
        <h3 id="reviews_1">Customer Reviews: </h3>
        <fieldset>
            <!-- store Reviews in Database -->
            <div id="reviews_2">
                <?php for($i=0; $i<count($review); $i++){?>
                <h4><?= $review[$i]['UserName']?></h4>
                <p><i><?= $review[$i]['message']?></i></p>
                <hr>
                <?php }?>
            </div>
        </fieldset>
    </div>

    <p id="link"><a href="home.php">Go Back to Home Page</a></p>  
    <script src="../assets/js/script.js"></script>
</body>
</html>

<?php include('../view/footer.php'); ?>