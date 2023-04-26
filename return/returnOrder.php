<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
echo $id;
$update = mysqli_query($conn,  "UPDATE `workorder` SET `orderStatus` = '2' WHERE `workorder`.`order_id` = '$id';");


if($update) 
{ 
    ?>
    <script>
        alert("Амжилттай буцаагдлаа");
        window.open("http://localhost/order/pages/bossPage.php",  "_self");
    
    </script>
    <?php 
}

?>


<h1>hllo</h1>