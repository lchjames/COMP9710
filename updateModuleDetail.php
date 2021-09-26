<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$moduleid = "";
$modulestate = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['module_update'])) {
    $moduleid = $_POST['moduleID'];
    $today = date("Y-m-d");
    $module_name = $_POST['module_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $user = $_SESSION['username'];
    if (include 'DBConnect.php') {
        $sql = "UPDATE module SET module_id='$moduleid',module_name='$module_name',start_date='$start_date',end_date='$end_date',last_modified_date='$today',last_modified_by='$user' WHERE module_id = '$moduleid'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("location: moduleManage.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['module_delete'])) {
    $moduleid = $_POST['moduleID'];
    if (include 'DBConnect.php') {
        $sql = "DELETE FROM module WHERE module_id = '$moduleid'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("location: moduleManage.php");
}
?>