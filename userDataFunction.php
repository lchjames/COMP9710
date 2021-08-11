<?php

$user_id = "";
$email = "";
$reemail = "";
$passwd = "";
$repasswd = "";
$emailErr = "";
$reemailErr = "";
$passwdErr = "";
$repasswdErr = "";
$allow_email_to_input = FALSE;
$allow_passwd_to_input = FALSE;

//update email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_submit'])) {
    //email input verification
    if (empty($_POST["email"])) {
        $emailErr = "Please input your email";
        $allow_email_to_input = FALSE;
    }
    if (empty($_POST["reemail"])) {
        $reemailErr = "Please re-input your email";
    } else {
        $email = test_input($_POST["email"]);
        $reemail = test_input($_POST["reemail"]);
        $allow_email_to_input = TRUE;
        // check if e-mail address is in email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $allow_email_to_input = FALSE;
        }
// check if the emails are the same
        if ($email != $reemail) {
            $emailErr = "Email mismatch";
            $reemailErr = "Email mismatch";
            $allow_email_to_input = FALSE;
        }
    }
    $user_id = $_POST["userID"];
    //input to database
    if ($allow_email_to_input == TRUE) {
        if (include 'DBConnect.php') {
            $sql = "UPDATE user_account SET email = '$email' WHERE userID = '$user_id'";
            $result = $conn->query($sql);
            if ($result === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else {
                $conn->close();
                //redundancy below	
                $allow_email_to_input = FALSE;
            }
        }
    }
}
//update password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pass_submit'])) {
//password input verification
    if (empty($_POST["passwd"])) {
        $passwdErr = "Please input the new password";
        $allow_passwd_to_input = FALSE;
    }
    if (empty($_POST["repasswd"])) {
        $repasswdErr = "Please re-input the new password";
    } else {
        $passwd = test_input($_POST["passwd"]);
        $repasswd = test_input($_POST["repasswd"]);
        $allow_passwd_to_input = TRUE;
        // check if password only contains letters and number
        if (!preg_match("/^[a-zA-Z0-9]+$/", $passwd)) {
            $passwdErr = "Only letters and number are allowed";
            $allow_passwd_to_input = FALSE;
        }
// check if the password only contains letters and whitespace
        if ($passwd != $repasswd) {
            $passwdErr = "Password mismatch";
            $repasswdErr = "Password mismatch";
            $allow_passwd_to_input = FALSE;
        }
    }
    $user_id = $_POST["userID"];

//input to database
    if ($allow_passwd_to_input == TRUE) {
        if (include 'DBConnect.php') {
            $sql = "UPDATE user_account SET password = '".md5($passwd)."' WHERE userID = '$user_id'";
            $result = $conn->query($sql);
            if ($result === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else {
                $conn->close();
                //redundancy below	
                $allow_passwd_to_input = FALSE;
            }
        }
    }
}
?>