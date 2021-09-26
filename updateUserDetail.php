<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_update'])) {
    $roleid = $_POST['role'];
    $user_id = $_POST['UserID'];
    $user = $_SESSION['username'];
    $today = date("Y-m-d");
    if (include 'DBConnect.php') {
        $sql = "UPDATE users SET role_id='$roleid',last_modified_date='$today',last_modified_by='$user' WHERE user_id = '$user_id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    //header("location: moduleManage.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_delete'])) {
    $user_id = $_POST['UserID'];
    if (include 'DBConnect.php') {
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("location: moduleManage.php");
}
?>