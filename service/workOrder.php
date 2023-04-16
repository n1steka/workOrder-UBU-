<?php
session_start();
include("./dbConnect.php");
$userID = $_SESSION['user_id'];
echo $userID;
if (isset($_POST['save-btn'])) {
    $item = $_POST['item'];
    $subject = $_POST['subject'];


    $query = "INSERT INTO workorder (item,problem, userID)
             VALUES('$item' , '$subject' , '$userID')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        header("Location: userInterface.php ")

?>
        <script>
            alert("Захиалга амжилттай бүртгэгдлээ ")
        </script>
<?php
    } else {
        echo '<script>alert("errror")</script>';
    }
}
