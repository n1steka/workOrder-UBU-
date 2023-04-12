<?php
include("../service/dbConnect.php");
session_start();
// initialize variables
$name = "";
$address = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')");
    $_SESSION['message'] = "Address saved";
    header('location: index.php');
}
if (isset($_SESSION['message'])) : ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<html>

<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
</head>

<body>
    <form method="post" action="server.php">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="">
        </div>
        <div class="input-group">
            <label>Address</label>
            <input type="text" name="address" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="save">Save</button>
        </div>
    </form>
</body>

</html>

<style>
    body {
        font-size: 19px;
    }

    table {
        width: 50%;
        margin: 30px auto;
        border-collapse: collapse;
        text-align: left;
    }

    tr {
        border-bottom: 1px solid #cbcbcb;
    }

    th,
    td {
        border: none;
        height: 30px;
        padding: 2px;
    }

    tr:hover {
        background: #F5F5F5;
    }

    form {
        width: 45%;
        margin: 50px auto;
        text-align: left;
        padding: 20px;
        border: 1px solid #bbbbbb;
        border-radius: 5px;
    }

    .input-group {
        margin: 10px 0px 10px 0px;
    }

    .input-group label {
        display: block;
        text-align: left;
        margin: 3px;
    }

    .input-group input {
        height: 30px;
        width: 93%;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid gray;
    }

    .btn {
        padding: 10px;
        font-size: 15px;
        color: white;
        background: #5F9EA0;
        border: none;
        border-radius: 5px;
    }

    .edit_btn {
        text-decoration: none;
        padding: 2px 5px;
        background: #2E8B57;
        color: white;
        border-radius: 3px;
    }

    .del_btn {
        text-decoration: none;
        padding: 2px 5px;
        color: white;
        border-radius: 3px;
        background: #800000;
    }

    .msg {
        margin: 30px auto;
        padding: 10px;
        border-radius: 5px;
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #3c763d;
        width: 50%;
        text-align: center;
    }
</style>