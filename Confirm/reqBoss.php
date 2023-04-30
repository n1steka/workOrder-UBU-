<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM workorder WHERE order_id = '$id'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <label for="">Захиалгын дугаар : </label> <br>
            <input type="text" value="<?php echo $id ?>"> <br>
            <label for="">Захиалгын он сар өдөр : </label><br>
            <input type="text" value="<?php echo $row['orderDate'] ?>"><br>
            <label for="">Засвар хийгдэх өрөөний дугаар : </label><br>
            <input type="text" value="<?php echo $row['roomNumber'] ?>"><br>
            <label for="">Эд хөрөнгө</label><br>
            <input type="text" value="<?php echo $row['item'] ?>"><br>
            <label for="">Асуудал</label><br>
            <label for="">Зураг оруулах </label><br>
            <input type="file" name="fileToUpload" id="fileToUpload" style="margin-bottom: 30px;"><br>



            <textarea name="" id="" cols="30" rows="10"><?php echo $row['problem'] ?></textarea><br>
            <label for="">Алба тэнхим</label><br>
            <input type="text" value="<?php
                                        $usID = $row['userID'];
                                        $sql = "SELECT *  FROM users  WHERE user_id = '$usID'";
                                        $data = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($data) > 0) {
                                            $rows = mysqli_fetch_assoc($data);
                                            echo $rows['username'];
                                        }

                                        ?>"><br>
            <label for="">Үнийн санал : </label><br>
            <input type="text" value="" placeholder="төгрөгөөр бичих" name="money"><br>
            <input type="submit" name="submit" value="Батлах">

            <input type="submit" name="cancel" value="Буцах">
        </div>
    </form>


</body>

</html>







<?php


if (isset($_POST['submit'])) {
    $money = $_POST['money'];
    $image = $_FILES['fileToUpload'];
    echo $money;
    print_r($image);
    echo "<br>";
    $imgFileName = $image['name'];
    echo "<br>";
    print_r($imgFileName);
    echo "<br>";
    $imageFileError  = $image['error'];
    echo "<br>";
    print_r($imageFileError);
    $imageSize = $image['size'];
    echo "<br>";
    print_r($imageSize);
    echo "<br>";
    $imageFileTemp = $image['tmp_name'];
    print_r($imageFileTemp);

    $fileName_separate = explode('.', $imgFileName);
    print_r($fileName_separate);
    echo "<br>";

    $file_extensions = strtolower(end($fileName_separate));

    print_r($file_extensions);

    $extension  = array('jpeg', 'jpg', 'png');


    if (in_array($file_extensions, $extension)) {
        $upload_image = 'images/' . $imgFileName;
        move_uploaded_file($imageFileTemp, $upload_image);
        $sql = "UPDATE `workorder` SET `file` = '$upload_image'  , money_order = '$money'  WHERE `workorder`.`order_id` = '$id';";
        $update = mysqli_query($conn, $sql);

        if ($update) {
            echo "success";
        } else {
            echo "errr";
        }
    } else {
        echo  "zuragnii hemjee ih bna ";
    }
}











if (isset($_POST['cancel'])) {
?>
    <script>
        window.open("http://localhost/order/admin-users.php", "_self");
    </script>
<?php
}
?>

<style>
    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 60%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        margin-top: 20px;
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
        margin-left: 10px;
    }

    input[type=can] {
        margin-top: 20px;
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
        margin-left: 10px;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row::after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
</style>