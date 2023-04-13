<?php
session_start();

include("dbConnect.php");

$sql = "INSERT INTO users VALUES(
'{$_POST['classCode']}', 
'{$_POST['username']}', 
'{$_POST['lastname']}', 
'{$_POST['phone']}' ,
'{$_POST['email']}',
'{$_POST['password']}',
'{$_POST['ab']}')";


// Execute SQL query
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Амжилттай бүртгэгдлээ")</script>';
    header("Location: ../admin-movie.php");
    // echo "'<script>
    // alert(' new record created successfully')</script>'";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
