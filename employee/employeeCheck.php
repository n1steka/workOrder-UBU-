<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
echo $id;

$sql = "UPDATE `workorder` SET `checkStatus` = '1' WHERE `workorder`.`order_id` = '$id';";

$data = mysqli_query($conn, $sql);

if ($data) {
?>
    <script>
        alert(" Төсөв амжилттай баталсан !!");
        window.open("http://localhost/order/employee/employeeHomePage.php", "_self");
    </script>
<?php
}
