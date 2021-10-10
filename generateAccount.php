<html>
    <?php
    include_once 'topbar.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/styleBG.css">
        <title>Generate Account</title>
    </head>
    <body>
        <div class="container">
            <form method="post" name="user_register_submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="user_register"> 
                <h2>Generate Account</h2>
                <br>
                Title:
                <input type="text" name="title"><br>
                First name:
                <input type="text" name="firstName"><br>
                Middle name:
                <input type="text" name="midName"><br>
                Last name:
                <input type="text" name="lastName"><br>
                Username:
                <input type="text" name="username"><br>
                Fan id:
                <input type="text" name="fan"><br><span class="error"><?php echo $fanErr; ?></span>
                Role:
                <select name="role">
                    <?php
                    include 'DBconnect.php';
                    $getCourse = "SELECT * FROM role";
                    $result = $conn->query($getCourse) or die(mysqli_error());
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row ['role_id'] ?>"><?php echo $row ['role_name'] ?></option>
                            <?php
                        }
                    }
                    $conn->close();
                    ?></select><br>
                <input type="submit" form="user_register" value="Register" name="register_submit" class="registerbtn">
            </form>
        </div>
        <br>
        <div class="container">
            <form method="post" action="importCSV.php" enctype="multipart/form-data">
                <input type="file" name="file"/>
                <input type="submit" name="submit_file" value="Submit"/>
            </form>
        </div>
    </body>
</html>