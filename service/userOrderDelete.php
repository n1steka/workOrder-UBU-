<?php
include("./dbConnect.php");
$id = $_GET['id'];
$query  = "DELETE  FROM workorder WHERE order_id = '$id'";
$data  =  mysqli_query($conn, $query);
if ($data) {
?>
    <script>
        alert("Ажилттай утсгагдлаа !!");
        window.open("http://localhost/order/service/orderList.php", "_self");
    </script>
<?php
} else {
    echo '<script>alert("Захиалга өгсөн хэрэглэгч байна")</script>';
}
