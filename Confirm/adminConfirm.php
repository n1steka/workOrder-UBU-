<?php
$id = $_GET['id'];
include("../service/dbConnect.php");

$query  = "UPDATE `workorder` SET `dataStatusId` = '1' WHERE `workorder`.`order_id` = '$id'";
$data  =  mysqli_query($conn, $query);
if ($data) {

        // $row =  mysqli_fetch_assoc($data); 
        // $if($row['dataStatusId'] == 0 ) {
        // // $sql = "UPDATE `workorder` SET `dataStatusId` = '1' WHERE `workorder`.`order_id` = '$id'" ; 
        // $dataStatusId =  $row['dataStatusId'] + 1 ;
    // }
?>
    <script>
        alert(" Захиалгыг амжилттай баталсан !!");
        window.open("http://localhost/order/admin-users.php", "_self");
    </script>

<?php

} else {
    echo '<script>alert("Захиалга өгсөн хэрэглэгч байна")</script>';
}
