<?php
    include_once('../controller/sessioncheck.php');
    include_once('../controller/changepassCheck.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Change Password</title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
        
    </head>
<body>
    <?php include('header.php'); ?>

    <div class="form" style="margin-top: 45px; margin-bottom: 50px">    
        <form method="post" action="" enctype="" novalidate>
            <fieldset>
                <legend>Change Password: </legend>

                <div class="input_box">
                    Current Password: <input id="password" type="password" name="currpassword" value="" /> <span id="oldpassErr"></span>
                    <span><?= $currpasswordError ?></span> <br><br>

                    New Password: <input id="newpassword" type="password" name="newpassword" value="" /> <span id="npassErr"></span>
                    <span><?= $newpasswordError ?></span> <br><br>

                    Retype New Password: <input id="retypepassword" type="password" name="retypepassword" value="" /> <span id="repassErr"></span>
                    <span><?= $retypepasswordError ?></span> 
                    <span><?= $confirmPasswordError ?></span> <br><br>
                    
                    <span><?= $error ?></span>
                
                </div>
                    
                <input onclick='return changePasword()' class="submit_btn" type="submit" name="submit" value="Submit" />
            
            </form>
        </fieldset>
    </div>
    
    <?php include('footer.php'); ?>
    <script src="../assets/js/login.js"></script>
</body>
</html>