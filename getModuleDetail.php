<?php

if ($_SESSION["usertype"] == 1 || $_SESSION["usertype"] == 2) {
    include_once 'DBConnect.php';
    $sql = "SELECT * FROM module";
    $result = $conn->query($sql) or die(mysqli_error());
}
?>