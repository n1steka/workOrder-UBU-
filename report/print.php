<?php
include("../service/dbConnect.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM workorder WHERE  order_id = '$id'");
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

<div class="diva">
    <div class="prints">
        <button onclick="myBack()">
            Буцах
        </button>
    </div>

    <script>
        const myBack = () => {
            window.open("http://localhost/order/admin-done.php", "_self");
        }
    </script>


    <div class="print">
        <button onclick="window.print();">
            Хэвлэх
        </button>
    </div>
</div>




<body>
    <div class="heads">
        <tr>
            <th>ОЛОН УЛСЫН УЛААНБААТАР ИХ СУРГУУЛЬ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

            <th>АЖ АХУЙН ХАНГАМЖИЙН ХЭЛТЭС</th>
        </tr>
    </div>
    <div class="container">
        <table border="0">
            <div class="contains">

            </div>
            <table>
                <div class="table">
                    <h4>ЗАХИАЛГЫН ХУУДАС</h4>
                </div>
            </table>
            <div class="info">
                <table border="0">
                    <tr>
                        <td>Алба,Хэлтэс,Тэнхим....
                            <?php $us = $row['userID'];
                            $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$us'");
                            $rw = mysqli_fetch_assoc($sql);
                            ?>
                            <b>
                                <u>
                                    <?php echo $rw['username']; ?>
                                </u>
                            </b>....&nbsp;&nbsp;&nbsp;&nbsp;


                            Засвар хийгдэх өрөөний дугаар
                            <b><u>
                                    <?php echo $row['roomNumber'] ?>
                                </u></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Захиалга өгсөн хүний нэр.... <b>
                                <?php
                                echo $rw['lastname'];
                                ?>
                            </b>....
                        </td>
                    </tr>
                    <tr>
                        <td>Захиалга өгсөн өдөр
                            <?php echo $row['orderDate'] ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="list">
                <table border="1">
                    <tr>
                        <td>№</td>
                        <td>Засвар үйлчилгээний нэр</td>
                        <td>Ажил дуусгасан огноо</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php echo $row['problem']; ?>
                        </td>
                        <td>
                            <?php echo $row['doneDate'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td></td>
                        <td>

                        </td>
                    </tr>
                </table>
            </div>
            <table>
                <tr>
                    <td>
                        Аж ахуйн хангамжийн хэлтэсийн дарга ............... Г.Амаржаргал
                    </td>
                </tr>
                <tr>
                    <td>
                        Ажил гүйцэтгэгчийн нэр :
                        <?php $eid = $row['employee_id'];
                        $sqli = mysqli_query($conn, "SELECT * FROM employee WHERE employee_id = '$eid'");
                        $rw = mysqli_fetch_assoc($sqli);
                        ?>
                        <b>
                            <?php
                            echo $rw['username'];
                            ?>
                        </b>

                    </td>
                </tr>
                <tr>
                    <td style="text-align: end;">
                        Ажилд томилсон он сар : <b>
                            <?php $date = date('m/d/Y ', time());
                            echo $date; ?>
                        </b>
                    </td>
                </tr>

            </table>


        </table>
    </div>



    <script>
        const d = new Date();
        document.getElementById("demo").innerHTML = d;
    </script>


</body>

</html>

</body>

</html>

<style>
    .container {
        margin-top: 100px;
        margin-left: 3%;
    }

    .table {
        margin-left: 300px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 800px;
    }

    table td {
        height: 30px;
    }

    .list td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .heads {
        position: absolute;
        left: 2%;
        top: 80px;
    }

    .diva {
        display: flex;
        height: 30px;
    }

    .print {
        position: absolute;
        top: 15px;
        right: 30%;
    }

    .prints {
        position: absolute;
        top: 15px;
        left: 20px;
    }

    button:hover {
        color: white;
    }

    button {
        width: 65px;
        height: 30px;
        color: black;
        border: 2px solid #e7e7e7;
        background-color: #e7e7e7;
    }
</style>