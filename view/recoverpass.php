<?php
    session_start();
    if(!isset($_SESSION['pass'])){
        header('location: ../view/forgetPassword.php');
    }
include_once('../controller/recoverpassCheck.php');

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
        <form method="post" action="" enctype="">
            <fieldset>
                <legend>PASSWORD CHANGE</legend>

                <div class="input_box">
                    New Password: <input id="newpassword" type="password" name="newpassword" value="<?php echo $newpassword ?>" /> <span id="npassErr"></span>
                    <span><?= $newpasswordError ?></span> <br><br>
                    
                    Retype New Password: <input id="retypepassword" type="password" name="retypepassword" value="<?php echo $retypepassword ?>" /> <span id="repassErr"></span>
                    <span><?= $retypepasswordError ?></span><br>
                </div>

                <hr>
                <input onclick="return recoverPass()" type="submit" name="submit" value="Submit" />

            </fieldset>
        </form>
    </div>
    
    <?php include('footer.php'); ?>
<script src="../assets/js/login.js"></script>
</body> 