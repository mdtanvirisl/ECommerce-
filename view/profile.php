<?php
    include('../controller/sessioncheck.php');
    include('../model/userModel.php');

    $user = getUser($_SESSION['user']['username']);
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        <title>Profile</title>
        <link rel="icon" type="image" href="../image/logo.png"> <!-- favicon - shows Logo on tab -->
        <link rel="stylesheet" href="../view/style.css">
        <link rel="stylesheet" href="../view/body.css">

        <style> 
            .profile{
                display: flex;
                justify-content: center;
            }

            #profile_pic{
                height: 120px;
                width: 120px;
                margin-left: 70px;
            }

            #form {
                /* max-width: 400px; */
                margin: 20px 50px 20px 50px ;
                padding: 30px;
                border: 1px solid #ffffff;
                border-radius: 5px;
                background-color: rgba(193, 223, 247, 0.502);
            }
            
            .p_info{
                margin: 0px 0px 0px 100px;
                text-align: center;
            }

            #p_info{
                margin: 0px 50px 0px 50px;
                text-align: center;
                padding: 0px 0px 50px 0px;

            }

            #p_pic{
                margin: 0px 0px 0px 50px;
            }
        </style>

    </head> 
<body>
    <?php include('header.php'); ?>

    <h3 class="page_title">My Profile</h3>

    <!-- profile picture show and upload a new picture -->
    <div id="form">
        <div class="profile">
            <div id="p_pic">
                <form action="../controller/imageCheck.php" method="post" enctype="multipart/form-data" novalidate>
                    <fieldset>
                        <legend>Profile Picture: </legend>

                        <div class="input_box">
                            <img id="profile_pic" src="../image/<?php echo $user['Img']; ?>" alt="" > <br>
                            <input id="p_pic" type="file" name="myfile" value=""> <br> <br>
                        </div>
                        <input id="p_pic" class="submit_btn" type="submit" name="" value="Upload Photo" /> <br> <br>
                    </fieldset>
                </form>
            </div>

            <div class="p_info">
                <fieldset>
                    <legend>User Information: </legend>
                    <br>
                    
                    <div id="p_info">
                        <b>Name: </b> <?php echo $user['Name']; ?> <br>
                        <b>Email: </b> <?php echo $user['Email']; ?> <br>
                        <b>Mobile: </b> <?php echo $user['Number']; ?> <br>
                        <b>Gender: </b> <?php echo $user['Gender']; ?> <br>
                        <b>Address: </b> <?php echo $user['Address']; ?> <br>

                        <br><br>
                        
                        <form action="eprofile.php" method="post" novalidate>
                            <input class="submit_btn" type="submit" name="" value="Edit Profile" />
                        </form>    
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <?php include('../view/footer.php'); ?>
</body>
</html>