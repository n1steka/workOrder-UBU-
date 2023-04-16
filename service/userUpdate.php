<?php
include("./dbConnect.php");
$id = $_GET['id'];
echo  $id;
$select  = "SELECT * FROM users WHERE user_id = '$id'";
$data =  mysqli_query($conn, $select);
$row =  mysqli_fetch_array($data);

?>

<html>


<head>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="../style/userUpdate.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Body of Form starts -->
    <div class="container">
        <form method="post" autocomplete="on">
            <!--First name-->
            <div class="box">
                <label for="firstName" class="fl fontLabel"> Овог: </label>
                <div class="new iconBox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="fr">
                    <input value="<?php echo $row['user_id'] ?>" type="text" name="user_id" placeholder="Овог : " class="textBox" autofocus="on" required>
                </div>
                <div class="clr"></div>
            </div>
            <div class="box">
                <label for="firstName" class="fl fontLabel"> Овог: </label>
                <div class="new iconBox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="fr">
                    <input value="<?php echo $row['username'] ?>" type="text" name="username" placeholder="Овог : " class="textBox" autofocus="on" required>
                </div>
                <div class="clr"></div>
            </div>
            <!--First name-->


            <!--Second name-->
            <div class="box">
                <label for="secondName" class="fl fontLabel"> Нэр : </label>
                <div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="text" value="<?php echo $row['lastname'] ?>" required name="lastname" placeholder="Нэр :" class="textBox">
                </div>
                <div class="clr"></div>
            </div>
            <!--Second name-->


            <!---Phone No.------>
            <div class="box">
                <label for="phone" class="fl fontLabel"> Утасны дугаар: </label>
                <div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                <div class="fr">
                    <input value="<?php echo $row['phone'] ?>" type="text" required name="phone" maxlength="10" placeholder="Утасны дугаар:" class="textBox">
                </div>
                <div class="clr"></div>
            </div>
            <!---Phone No.---->


            <!---Email ID---->
            <div class="box">
                <label for="email" class="fl fontLabel"> Имэйл : </label>
                <div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="fr">
                    <input value="<?php echo $row['email'] ?>" type="email" required name="email" placeholder="Имэйл :" class="textBox">
                </div>
                <div class="clr"></div>
            </div>
            <!--Email ID----->


            <!---Password------>
            <div class="box">
                <label for="password" class="fl fontLabel"> Нууц үг : </label>
                <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
                <div class="fr">
                    <input type="Password" value="<?php echo $row['password'] ?>" required name="password" placeholder="Нууц үг : " class="textBox">
                </div>
                <div class="clr"></div>
            </div>
            <!---Password---->

            <!---Gender----->
            <div class="box radio">
                <label for="gender" class="fl fontLabel"> Gender: </label>
                <input type="radio" name="ab" value="Эрэгтэй" required> Эрэгтэй : &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="ab" value="Эмэгтэй" required> Эмэгтэй :
            </div>
            <!---Gender--->

            <!--Terms and Conditions------>

            <!--Terms and Conditions------>



            <!---Submit Button------>
            <div class="box" style="background: #2d3e3f">
                <input type="Submit" name="update-btn" class="submit" value="Update">
            </div>
            <!---Submit Button----->
        </form>
    </div>
    <!--Body of Form ends--->
</body>

</html>
<?php
if (isset($_POST['update-btn'])) {
    $id = $_POST['user_id'];
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $gender  = $_POST['ab'];


    $update = "UPDATE users SET  username = '$username' , lastname = '$lastname' , phone = '$phone' , email = '$email',
     password ='$password' , gender = '$gender' WHERE user_id = '$id'";
    $data = mysqli_query($conn, $update);
    if ($data) {
?>
        <script>
            alert("Хэрэглэгчийн мэдээллийг амжилттай шинэчлэлээ");
            window.open("http://localhost/order/admin-movie.php", "_self");
        </script>
<?php
    } else {
        echo '<script>alert("errror")</script>';
    }
};
?>