<?php
include_once("../controller/registrationCheck.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Registration </title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
        
    </head>
<body>
    <h3 class="page_title">REGISTRATION</h3>

    <div class="form">
        <fieldset>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="" novalidate>
                <div class="input_box">
                    <label for="name"><b>Name: </b></label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>"><span id="nameErr"></span>  
                    <?= $nameError ?> <br> <br>

                    <label for="number"><b>Number: </b></label> </td>
                    <input type="text" id="number" name="number" value="<?php echo $number ?>" ><span id="numberErr"></span> 
                    <?= $numberError ?> <br> <br> 

                    <label for="gender"><b>Gender: </b></label> 
                        <input type="radio" id="gender" name="gender" value="Male" <?= ($gender && $gender == "Male") ?
                        'checked="checked"' : ""; 
                        ?> /> Male
                        <input type="radio" id="gender" name="gender" value="Female" <?= ($gender && $gender == "Female") ?
                        'checked="checked"' : "";
                        ?> /> Female
                        <input type="radio" id="gender" name="gender" value="Other" <?= ($gender && $gender == "Other") ?
                        'checked="checked"' : "";
                        ?> /> Other

                    <span id="genderErr"></span><?= $genderError ?> <br> <br>

                    <label for="email"><b>Email: </b></label> 
                    <input type="email" id="email" name="email" value="<?php echo $email ?>" > <span id="emailErr"></span>
                    <?= $emailError ?> <br> <br> 

                    <!-- Textarea -->
                    <label for="address">Address :</label>
                    <textarea id="address" name="address" rows="2" cols="45" placeholder="address"></textarea><span id="addressErr"></span>
                    <?php echo $addressError; ?><br>

                    <br><hr><br>

                    <label for="username"><b>Username: </b></label>
                    <input type="text" id="username" name="username" value="<?php echo $username ?>" > <span id="usernameErr"></span>
                    <?= $usernameError ?> <br> <br>

                    <label for="password"><b>Password: </b></label>  
                    <input type="password" id="password" name="password" value="<?php echo $password ?>" > <span id="passwordErr"></span>
                    <?= $passwordError ?> <br> <br>

                    <label for="confirmPassword"><b>Confirm Password: </b></label>
                    <input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $confirmPassword ?>" > <span id="confirmpassErr"></span>
                    <?= $confirmPasswordError ?> <br>        

                    <br><hr><br>

                    <label for="ques1"><b>What is your Favorite Color? </b></label>
                    <input type="text" id="ques1" name="ques1" value="<?php echo $ques1 ?>" > <span id="ques1Err"></span> <br>
                    <?= $ques1Error ?> <br>

                    <label for="ques2"><b>What is your Birthplace? </b></label>
                    <input type="text" id="ques2" name="ques2" value="<?php echo $ques2 ?>" > <span id="ques2Err"></span> <br>
                    <?= $ques2Error ?> <br>  

                    <?= $error ?>
                </div>
                
                <div>
                    <input id="btn" onclick="return validate()" class="submit_btn" type="submit" name="submit" value="Sign Up" >
                </div>
                
            </form>
        </fieldset>
    </div>

    <p class="links"> <b> Already have an Account? </b> <a href='login.php'>Login Now </a></p>
    <p class="links"> <b> Forget Password? </b> <a href='forgetPassword.php'> Click Here </a></p>

    <?php include("footer.php"); ?>
    <script src="../assets/js/register.js"></script>
</body>
</html>