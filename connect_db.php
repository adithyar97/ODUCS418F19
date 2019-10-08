<?php
$servername = "localhost";
$username = "admin";
$password = "monarchs";
$dbname = "web_programming";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>