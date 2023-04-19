<?php
session_start();
$wid = $_POST['id'];
include("../service/dbConnect.php");
$employee =  $_POST['emp'];
$sql = "UPDATE `workorder` SET `employee_id` = '$employee' WHERE `workorder`.`order_id` = '$wid';";
$res = mysqli_query($conn, $sql);

if ($res) {
?>
    <script>
        alert("Хэрэглэгчийн мэдээллийг амжилттай шинэчлэлээ");
        window.open("http://localhost/order/admin-orderConfirm.php", "_self");
    </script>
<?php
} else {
}
