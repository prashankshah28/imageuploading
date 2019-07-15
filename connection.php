<?php
$servername = "localhost";
$username = "admin";
$password = "Admin@123";
$db = "imagelisting";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  
    die("Connection failed: " . $conn->connect_error);
} 
?>