<?php

//Create Conn Credentials
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_password = '';

//Create mysqli Object
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

// Error Handler
if($mysqli->connect_error){
    printf("Connection Failed!", $mysqli->connect_error);
    exit();
}
?>