<?php
include("dbConnect.php");

$username = $_POST['username'];
$password = $_POST['password'];

//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT *FROM users WHERE user_id ='$username' AND PASSWORD ='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    header("Location: orderList.php");
} else {
    // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    header("Location: ../pages/userLogin.php");
}




// Close database connection
mysqli_close($conn);
