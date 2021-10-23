<?php

#DBConnect.php
//$conn = new mysqli();
//$host = "localhost";
//$user = "root";
//$password = "";
//$dbname = "comp9710";
//$conn->connect($host, $user, $password, $dbname);
//if (mysqli_connect_errno()) {
//    echo("Failed to connect, the error message is : " .
//    mysqli_connect_error());
//    exit();
//} /* else
//  echo "Connect to mySQL successfully <br/>";
//  if (!mysqli_set_charset($conn, "utf8")) {
//  printf("Error loading character set utf8: %s\n", mysqli_error($conn));
//  } else {
//  printf("Current character set: %s\n", mysqli_character_set_name($conn));
//  } */
//
//////$conn->close();
#DBConnect.php
$host = 'mytestserver2.mysql.database.azure.com';
$username = 'vasulg';
$password = 'Flinders@';
$db_name = 'comp9710';
$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, "cacert.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

//If connection failed, show the error
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}else{
    echo "CONNECT!";
}
?>
