<html>
    <?php
    include_once 'user_register_login.php';
    include_once 'topbar.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/styleBG.css">
        <title>Generate Account</title>
    </head>
    <body>
<!--        <div class="container">
            <form method="post" name="user_register_submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="user_register"> 
                <h2>Generate Account</h2>
                <br>
                <input type="text" value="<?php echo $username ?>" placeholder="Enter User name" name="username"><span class="error"><?php echo $usernameErr; ?></span>
                <input type="password" value="<?php echo $passwd ?>" placeholder="Enter Password" name="passwd"><span class="error"><?php echo $passwdErr; ?></span>
                <input type="password" value="<?php echo $repasswd ?>" placeholder="Repeat Password" name="repasswd"><span class="error"><?php echo $repasswdErr; ?></span>
                <br>
                <hr>
                <input type="submit" form="user_register" value="Register" name="register_submit" class="registerbtn">
            </form>
        </div>-->
        <div class="container">
            <form method="post" action="importCSV.php" enctype="multipart/form-data">
                <input type="file" name="file"/>
                <input type="submit" name="submit_file" value="Submit"/>
            </form>
        </div>
    </body>
</html>