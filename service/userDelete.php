<?php
include("./dbConnect.php");
$id = $_GET['id'];
$query  = "DELETE  FROM users WHERE user_id = '$id'";
$data  =  mysqli_query($conn, $query);
if ($data) {
?>
    <script>
        alert("Ажилттай утсгагдлаа !!");
        window.open("http://localhost/order/admin-movie.php", "_self");
    </script>
<?php
} else {
    echo '<script>alert("Захиалга өгсөн хэрэглэгч байна")</script>';
}
