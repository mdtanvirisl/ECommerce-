<?php
    include_once('../controller/sessioncheck.php');
    include('../model/userModel.php');
    // include_once('../controller/editprofileCheck.php');

    $user = getUser($_SESSION['user']['username']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Update Profile</title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">
        
    </head> 
<body> 
    <?php include('header.php'); ?> 

    <div class="form">
        <form action="" method="post" novalidate> 
            <fieldset> 
                <legend align="center">Update Profile</legend> 
                
                <br><b>General Informations: </b> <br> <br>

                Name: <input id="name" type="text" name="name" value="<?php echo $user['Name']?>" /><span id="nameErr"></span>  <br>
                Email: <input id="email" type="email" name="email" value="<?php echo $user['Email']?>" /><span id="emailErr"></span><br>
                Phone Number: <input id="number" type="text" name="number" value="<?php echo $user['Number']?>" /><span id="numberErr"></span>  <br>
                Address: <input id="address" type="text" name="address" value="<?php echo $user['Address']?>" /><span id="addressErr"></span> <br>
                
                <br><hr><br>
                
                <b>Security Questions: </b> <br><br>

                What is your Favorite Color? <br>
                <input id="ques1" type="text" name="ques1" value="<?php echo $user['Ques1']?>" /><span id="ques1Err"></span> <br><br>

                What is your Birthplace? <br>
                <input  id="ques2" type="text" name="ques2" value="<?php echo $user['Ques2']?>" /><span id="ques2Err"></span>  <br><br>
                
                <input onclick="return editProfile()" class="submit_btn" type="submit" name="submit" value="Update" />
            </fieldset> 
        </form>
    </div>

    <?php include('footer.php'); ?>
    <script src="../assets/js/editprofile.js"></script>
    <script src="../assets/js/common.js"></script>
</body>
</html>