<?php
session_start();
include("../service/dbConnect.php");
$msg = "";
if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$code' && password = '$password' ");
    $num =  mysqli_num_rows($sql);

    if ($num > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['user_id'];
        header("location: ../service/userInterface.php");
    } else {
        $msg = "Таны нууц үг эсвэл нэвтрэх нэр буруу байна";
    }
}
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

    <form action="" method="post">
        <h2>Хэрэглэгч нэвтрэх</h2>

        <div class="form-group">
            <label for="username">Нэвтрэх нэр:</label>
            <input type="text" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="password">Нууц үг :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <?php if (isset($_GET['error'])); {
        } ?>
        <div class="adminLink">
            <!-- <a href="../pages/LoginPage.php">Админ эрхээр нэвтрэх</a> -->
        </div>

        <button type="submit" name="submit">Login</button>
        <div class="error">
            <p> <?php echo $msg ?></p>
        </div>
        <select name="formal" onchange="javascript:handleSelect(this)">
            <option value="contact">Сонгох</option>
            <option value="LoginPage">Admin</option>
            <option value="bossLogin">Ан жүмбүг</option>
            
        </select>

        <script type="text/javascript">
            function handleSelect(elm) {
                window.location = elm.value + ".php";
            }
        </script>
    </form>
</body>

</html>












<style>
    form {
        width: 300px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 10px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 5px;
        border-radius: 3px;
        border: 1px solid #ccc;
    }

    button[type="submit"] {
        display: block;
        margin: 10px auto 0;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #3e8e41;
    }

    .alert {
        color: red;
    }

    .adminLink {
        margin: 20px;
        margin-left: 120px;
    }

    .adminLink a:link {
        text-decoration: none;
    }

    .adminLink a:visited {
        text-decoration: none;
    }

    .adminLink a:hover {
        text-decoration: underline;
    }

    .adminLink a:active {
        text-decoration: underline;
    }
</style>