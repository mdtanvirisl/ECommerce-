<?php
session_start();
include_once('../controller/forgetpassCheck.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Forget Password</title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
    </head> 
<body>
    <?php include('header.php'); ?>

    <div class="form">
        <form method="post" action="" enctype="" novalidate>            
            <fieldset>
            <legend>Forget Password: </legend>
                
            <div class="input_box">
                <p><b>Enter Username: </b></p> 
                
                <input id="username" type="text" name="username" value="" /> <span id="usernameErr"></span>
                <span><?= $usernameError ?> </span> 

                <p><b>What is your Favorite Color? </b></p>

                <input id="ques1" type="text" name="question1" value="<?php echo $question1 ?>"/> <span id="ques1Err"></span>
                <span><?= $question1Error ?></span> 

                <p><b>What is your Birthplace? </b></p>
                <input id="ques2" type="text" name="question2" value="<?php echo $question2 ?>"/> <span id="ques2Err"></span>
                <span><?= $question2Error ?></span>
                <span><?= $error ?></span>

            </div>

            <input onclick="return forgetPassCheck()" class="submit_btn" type="submit" name="submit" value="Submit" />
            
            </fieldset>
        </form>
    </div>

    <p class="links"> <b> Don't have an Account? </b> <a href='registration.php'>Register Now </a> </p>
        
    <?php include('footer.php'); ?>
    <script src="../assets/js/login.js"></script>
</body>
</html>