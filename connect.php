<?php
$host = 'localhost';  // or 127.0.0.1
$port = '3307';       // specify your port
$username = 'root';   // default username for XAMPP
$password = '';       // default password is empty
$database = 'voting';

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
echo 'Connected successfully';
?>