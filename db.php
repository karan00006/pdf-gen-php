<?php

$host = "localhost";
$user = "root";
$password = "";
$DB = "mydb"; 

$conn = new mysqli($host, $user, $password, $DB);
if($conn->connect_error){
    die('Error!');
}

?>