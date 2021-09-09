<html>
    <?php
    include_once 'user_register_login.php';
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        if ($_SESSION["usertype"] == 'admin') {
            header("location: admin.php");
        } else {
            header("location: user.php");
        }
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/styleBG.css">
        <title>COMP9710</title>
    </head>
    <body>
        <div class="container">
            <h1>Login an existing account</h1>
            <form method="post" name="user_login_submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="user_login">
                <h2>Login</h2>
                <hr>
                <input type="text" value="<?php echo $Lusername ?>" name="Lusername" placeholder="Username" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off /><span class="error"><?php echo $LusernameErr; ?></span>
                <input type="password" value="<?php echo $Lpasswd ?>" name="Lpasswd" placeholder="Password" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off /><span class="error"><?php echo $LpasswdErr; ?></span>
                <hr>
                <input type="submit" form="user_login" value="Login" name="login_submit" class="loginbtn">
            </form>
        </div>
    </body>

</html>