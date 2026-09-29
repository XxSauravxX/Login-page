<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "login_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("database connection failed: " . $conn->connect_error);
}

?>