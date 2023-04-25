<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Өгөгдлийн сантай холбогдож чадсангүй: " . $conn->connect_error);
}
echo "";
