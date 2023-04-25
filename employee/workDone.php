<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
echo $id;

$date = date('m/d/Y h:i:s', time());

// $sql = "UPDATE `workorder` SET `checkStatus` = '2' WHERE `workorder`.`order_id` = '$id';";


$sql = "UPDATE workorder SET doneDate = '$date' , checkStatus = 2 WHERE  order_id = '$id'";
$data = mysqli_query($conn, $sql);

if ($data) {
    ?>
    <script>
        alert(" Төсөв амжилттай баталсан !!");
        window.open("http://localhost/order/employee/employeeHomePage.php", "_self");
    </script>
<?php
}