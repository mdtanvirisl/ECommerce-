<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Login </title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
    </head>
<body>
    <?php include("header.php"); ?>

    <div class="form">
        <form action="../controller/logincheck.php" method="post" enctype="" novalidate>
            <fieldset>
                <legend>Login: </legend>
        
                <?php echo isset($_SESSION['error']) ? $_SESSION['error'] : "" ?> <br><br>
                
                <div class="input_box">
                    User Name: <input id="username" type="text" name="username" value="" /><span id="usernameErr"></span> <br><br>
                    Password: <input id="password" type="password" name="password" value="" /><span id="passwordErr"></span> <br><br>
                </div>

                <hr>

                <input type="checkbox" name="remember_me" id="checkbox"> 
                <label for="checkbox">Remember Me? </label> <br><br>
                
                <input class="submit_btn" onclick="return login()" type="submit" name="submit" value="Login" />
            
            </fieldset>
        </form>
    </div>
        
    <p class="links"> <b> Forget Password? </b> <a href='forgetPassword.php'> Click Here </a></p>
    <p class="links"> <b> Don't have an Account? </b> <a href='registration.php'> Register Now </a></p>

    <?php include("footer.php"); ?>
    <script src="../assets/js/login.js"></script>
</body>
</html>