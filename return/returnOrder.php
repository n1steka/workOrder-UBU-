<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
echo $id;
$data = array();
$sql = mysqli_query($conn, "SELECT * FROM workorder WHERE order_id = '$id' AND money_order >=0 AND orderStatus IS NULL");

$row = mysqli_fetch_array($sql);

?>


<form action="" enctype="multipart/form-data">
    <div class="container">
        <label for="">Захиалгын код</label><br>
        <input type="email" name="" id="" value="<?php echo $row['order_id'] ?>"><br>
        <label for="">Ажилчин</label><br>
        <input type="email" name="" id="" value="<?php echo $row['employee_id'] ?>"><br>
        <label for="">Захиалга өгсөн өдөр</label><br>
        <input type="email" name="" id="" value="<?php echo $row['orderDate'] ?>"><br>
    </div>

</form>







<form action="" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <th>Код</th>
            <th>А код</th>
            <th>Захиалга өгсөн өдөр</th>
            <th>Тоот </th>
            <th>Эд хөрөнгийн нэр</th>
            <th>Асуудал </th>
            <th> Үнийн санал</th>
            <th> Аж ахуй</th>
            <th>Төсөв батлах</th>
            <th>Цуцлах</th>
        </tr>
        <?php foreach ($data as $rw) {
            ?>
            <tr>
                <td>
                    <?php echo $rw['order_id'] ?>
                </td>
                <td>
                    <?php echo $rw['employee_id'] ?>
                </td>
                <td>
                    <?php echo $rw['orderDate'] ?>
                </td>
                <td>
                    <?php echo $rw['roomNumber'] ?>
                </td>
                <td>
                    <?php echo $rw['item'] ?>
                </td>
                <td>
                    <?php echo $rw['problem'] ?>
                </td>
                <td>
                    <?php echo $rw['employee_id'] ?>
                </td>
                <td>
                    <?php if ($rw['dataStatusId'] == 1) {
                        echo "Баталсан";
                    } else {
                        echo "Батлаагүй";
                    } ?>
                </td>


            </tr>
        <?php } ?>

    </table>
</form>