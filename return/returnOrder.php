<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
echo $id;
$data = array();
$sql = mysqli_query($conn, "SELECT * FROM workorder WHERE order_id = '$id' AND money_order >=0 AND orderStatus IS NULL");
$row = mysqli_fetch_array($sql);
$image = $row['file'];

?>
<link rel="stylesheet" href="styles.css">

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="head">

            <label for="">Захиалгын код</label><br>
            <input type="text" name="" id="" value="<?php echo $row['order_id'] ?>"><br>
            <label for="">Ажилчин</label><br>
            <input type="text" name="" id="" value="<?php echo $row['employee_id'] ?>"><br>
            <label for="">Захиалга өгсөн өдөр</label><br>
            <input type="text" name="" id="" value="<?php echo $row['orderDate'] ?>"><br>
            <label for="">Тоот</label><br>
            <input type="text" name="" id="" value="<?php echo $row['roomNumber'] ?>"><br>
            <label for="">Эд хөрөнгийн нэр</label><br>
            <input type="text" name="" id="" value="<?php echo $row['item'] ?>"><br>
            <label for="">Тайлбар</label><br>
            <textarea name="" id="" cols="30" rows="10"><?php echo $row['problem'] ?></textarea>
        </div>
        <div class="bod">
            <label for="">Судалгааны зураг</label><br>
            <img style="margin: 20;" src="../Confirm/<?php echo $image ?>" alt=""><br>
            <label for="">Үнийн санал</label><br>
            <input type="text" name="" id="" value="<?php echo $row['money_order'] ?>₮"><br>
            <label for="">Аж ахуй баталсан эсэх</label><br>
            <input type="text" name="" id="" value="<?php if ($row['dataStatusId'] == 1) {
                echo "Баталсан";
            } else {
                echo "Батлаагүй";
            } ?>"><br>

        </div>
        <div class="done">



            <label for="">Төсөв </label><br>
            <button class="button button4" type="submit" value="submit" name="submit">
                Балах
            </button>

            <a href="">
                <button class="button button4">
                    Цуцлах
                </button>
            </a>
        </div>
    </div>

</form>

<?php
if (isset($_POST['submit'])) {
    $qry = mysqli_query($conn, "UPDATE `workorder` SET `orderStatus` = '1' WHERE `workorder`.`order_id` = '$id'");
    if ($qry) {
        ?>
        <script>
            alert("done");
                window.open("http://localhost/order/pages/bossPage.php" , "_self");
        </script>
        <?php
    }

}
?>