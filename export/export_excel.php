<?php
session_start();

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Тайлан_list.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("../service/dbConnect.php");
$output = "";

$sql = mysqli_query($conn, "SELECT * FROM workorder WHERE checkStatus = 2") or die("db error " .  mysqli_error($conn));
$data = array();

while ($row =  mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}

$output = "";

?>

<table border="1">

    <thead>
        <tr>
            <th style="width: 10%">Код</th>
            <th style="width: 30%">Он/сар/өдөр</th>
            <th style="width: 19%">Хэрэгсэл</th>
            <th style="width: 10%; text-align: center">Тоот</th>
            <th style="width: 15%">Асуудал</th>
            <th style="width: 30%">Алба Тэнхим</th>
            <th style="width: 10%; text-align: center">Ажилчин</th>
            <th style="width: 10%; text-align: center">Төлөв</th>
            <th style="width: 10%; text-align: center">ҮСИ</th>
            <th style="width: 10%; text-align: center">СА</th>
        </tr>
    </thead>
    <?php foreach ($data  as $row) {

    ?>
        <tbody>

            <tr>
                <td>
                    <?php echo $row['order_id'] ?>
                </td>
                <td>
                    <a>
                        <?php echo $row['orderDate'] ?>
                    </a>
                    <br />
                </td>
                <td>
                    <?php echo $row['item'] ?>
                </td>
                <td>
                    <?php echo $row['roomNumber'];
                    $_SESSION['rNumber'] = $row['roomNumber'];
                    ?>
                </td>
                <td>
                    <?php echo $row['problem'] ?>
                </td>
                <td>
                    <?php
                    $useri = $row['userID'];
                    $sqls = "SELECT * FROM users WHERE user_id  = '$useri'";
                    $dat = mysqli_query($conn, $sqls);
                    if (mysqli_num_rows($dat) > 0) {
                        $usi = mysqli_fetch_assoc($dat);
                        echo $usi['username'];
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $employee_id = $row['employee_id'];
                    $emp = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
                    $res = mysqli_query($conn, $emp);
                    $rw = mysqli_fetch_assoc($res);
                    echo $rw['username'];
                    ?>

                </td>

                <td class="project-actions text-right">
                    <?php if ($row['dataStatusId'] == 1) {
                    ?>
                        <p class="status">Баталсан </p>
                    <?php
                    } else {
                    ?>
                        <p class="status2">Батлаагүй</p>
                    <?php

                    };
                    ?>
                </td>
                <td class="project-actions text-right">
                    <?php if ($row['money_order'] > 0) {
                    ?>
                        <p class="status1">Илгээсэн </p>
                    <?php
                    } else {
                    ?>
                        <p class="status2">Илгээгээгүй</p>
                    <?php

                    };
                    ?>
                </td>

                <td class="project-actions text-right">
                    <?php if ($row['orderStatus'] == 1) {
                    ?>
                        <p class="status">Баталсан </p>
                    <?php
                    } else {
                    ?>
                        <p class="status2">Батлаагүй</p>
                    <?php
                    };
                    ?>
                </td>
            </tr>
        </tbody>
    <?php  } ?>

</table>

<!-- /.card -->