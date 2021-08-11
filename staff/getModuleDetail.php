<?php

//if ($_SESSION["usertype"] == 'admin') {
include_once '../DBConnect.php';
$sql = "SELECT * FROM modules";
$result = $conn->query($sql) or die(mysqli_error());
//}
?>