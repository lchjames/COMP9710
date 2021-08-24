<?php

$target_dir = "../video/";
$target_file = $target_dir . basename($_FILES["videoToUpload"]["name"]);
$video_name = $_POST['videoName'];
$module_num = $_POST['module'];
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size > 50MB
//if ($_FILES["videoToUpload"]["size"] > 52428800) {
//  echo "Sorry, your file is too large.";
//  $uploadOk = 0;
//}
// Allow certain file formats
if ($videoFileType != "wmv" && $videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "MP4") {
    echo "Sorry, only wmv, mp4 & avi files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0 || empty($_POST["videoName"]) || empty($_POST["module"])) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["videoToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["videoToUpload"]["name"])). " has been uploaded for Module" . $module_num;
        $video_link = basename($_FILES["videoToUpload"]["name"]);
        include_once '../DBConnect.php';
        $sql = "INSERT INTO `videos`(`module`, `video_name`, `video_link`) VALUES ('$module_num','$video_name','$video_link')";
        $result = $conn->query($sql) or die(mysqli_error());
        $conn->close();
        header("location: moduleManage.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>