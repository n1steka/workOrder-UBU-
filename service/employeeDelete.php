<?php
include("./dbConnect.php");
$eid = $_GET['eid'];
$query  = "DELETE  FROM employee WHERE employee_id = '$eid'";
$data  =  mysqli_query($conn, $query);
if ($data) {
?>
    <script>
        alert("Ажилттай утсгагдлаа !!");
        window.open("http://localhost/order/employee-user.php", "_self");
    </script>
<?php
} else {
    echo '<script>alert("Захиалга өгсөн хэрэглэгч байна")</script>';
}
