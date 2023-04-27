<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=student_list.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("../service/dbConnect.php");
$sql = mysqli_query($conn, "SELECT * FROM employee") or die("db error : " . mysqli_error($conn));
$records =  array();

while ($row  = mysqli_fetch_assoc($sql)) {
    $records[] = $row; 
}
