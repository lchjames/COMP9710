<?php

$moduleid = "";
$modulestate = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['module_update'])) {
    $moduleid = $_POST['moduleID'];
    $modulestate = $_POST['modulestate'];
    if (include '../DBConnect.php') {
        $sql = "UPDATE modules SET active = '$modulestate' WHERE modules = '$moduleid'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("location: moduleManage.php");
}
//} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['activity_delete'])) {
//    if (include 'DBConnect.php') {
//        $activityId = $_POST['activityID'];
//        $sql = "DELETE FROM activity WHERE activity_id = '$activityId'";
//        if ($conn->query($sql) === FALSE) {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
//        $conn->close();
//        header("location: adminActivity.php");
//    }
//}
?>