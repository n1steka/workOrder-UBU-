<?php
session_start();

if (empty($_SESSION['user_id'])) {
?>
    <script>
        window.open("http://localhost/order/pages/userLogin.php", "_self");
    </script>
<?php
}
$userID = $_SESSION['user_id'];
echo "Welcome user " . $userID;
?>
<!DOCTYPE html>
<html lang="en">
    <title>Хэрэглэгч</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    </head>

    <body>

        <h2>Захиалгын жагсаалт</h2>
        <!-- <p>Click on the buttons inside the tabbed menu:</p> -->

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Судлагдаж буй
                захиалга</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Захиалга үүсгэх</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Аж ахуй баталсан захиалга</button>
            <button class="tablinks" onclick="openCity(event, 'Sanhuu')">Төсөв баталсан захиалга</button>
            <button class="tablinks" onclick="openCity(event, 'done')">Ажил хийгдэж дууссан</button>
            <button><a href="logout.php">Гарах</a></button>

        </div>
        <div id="London" class="tabcontent">
            <h3>Захиалга</h3>
            <p>Захиалгын жагсаалт</p>
            <?php
            include("dbConnect.php");
            $result = mysqli_query($conn, "SELECT roomNumber ,order_id , orderDate  , item , problem , userID , dataStatusId , orderStatus FROM workorder WHERE userID = '$userID' AND dataStatusId IS NULL ");
            ?>
            <!DOCTYPE html>
            <html>

            <head>
                <title> Retrive data</title>
                <link rel="stylesheet" href="style.css">
            </head>

            <body>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table border="1">
                        <tr>
                            <td>Захиалгын код</td>1
                            <td>Ажилтны код</td>
                            <td>Захиалга өгсөн өдөр</td>
                            <td>Тоот </td>
                            <td>Эд хөрөнгийн нэр </td>
                            <td>Асуудал </td>
                            <td>Аж ахуй баталсан </td>
                            <td>Төсөв баталсан </td>
                        </tr>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row["order_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["userID"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["orderDate"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["roomNumber"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["item"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["problem"]; ?>
                                </td>
                                <td>
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
                                <td>
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
                                <td>
                                    <button>
                                        <a onclick="return confirm ('Та захиалгыг устгахдаа итгэлтэй байна уу  ? ')" href="userOrderDelete.php?id=<?php echo $row["order_id"]; ?>">Устгах</a> </button>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo "Судлагдаж буй захиалга байхгүй байна";
                }
                ?>
            </body>

            </html>


        </div>


        <div id="Paris" class="tabcontent">
            <h3>Захиалга үүсгэх</h3>

            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    body {
                        font-family: Arial, Helvetica, sans-serif;
                    }

                    * {
                        box-sizing: border-box;
                    }

                    input[type=text],
                    select,
                    textarea {
                        width: 100%;
                        padding: 12px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-sizing: border-box;
                        margin-top: 6px;
                        margin-bottom: 16px;
                        resize: vertical;
                    }

                    input[type=submit] {
                        background-color: #04AA6D;
                        color: white;
                        padding: 12px 20px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }

                    input[type=submit]:hover {
                        background-color: #45a049;
                    }

                    .container {
                        border-radius: 5px;
                        background-color: #f2f2f2;
                        padding: 20px;
                    }

                    .status {
                        color: #04AA6D;
                    }

                    .status2 {
                        color: red;

                    }
                </style>
            </head>
            <h3>Contact Form</h3>
            <div class="container">
                <form action="workOrder.php" method="POST">
                    <label for="fname">Эд хөрөнгө : </label>
                    <input type="text" id="fname" name="item" placeholder="Хөрөнгө">
                    <label for="fname">Засвар хийх өрөөний дугаар : </label>
                    <input type="text" id="room" name="room" placeholder="Засвар хийх өрөөний дугаар">
                    <label for="country">Асуудал : </label>
                    <label for="subject"></label>
                    <textarea id="subject" name="subject" placeholder="Тайлбар бичих" style="height:200px"></textarea>
                    <input type="submit" name="save-btn" value="Submit">
                </form>
            </div>

    </body>


    </div>

    <div id="Tokyo" class="tabcontent">
        <h3>Батлагдсан захиалга</h3>
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT order_id , orderDate  , item , problem , userID , dataStatusId ,orderStatus FROM workorder WHERE userID = '$userID' AND dataStatusId = 1 AND orderStatus IS NULL "
        );
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table border="1">
                <tr>
                    <td>Захиалгын код</td>
                    <td>Ажилтны код</td>
                    <td>Захиалга өгсөн өдөр</td>
                    <td>Эд хөрөнгийн нэр </td>
                    <td>Тоот</td>
                    <td>Асуудал </td>
                    <td>Аж ахуй баталсан</td>
                    <td>Төсөв баталсан</td>
                </tr>

                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row["order_id"]; ?>
                        </td>
                        <td>
                            <?php echo $row["userID"]; ?>
                        </td>
                        <td>
                            <?php echo $row["orderDate"]; ?>
                        </td>
                        <td>
                            <?php echo $row["item"]; ?>
                        </td>
                        <td>
                            <?php echo $row["problem"]; ?>
                        </td>
                        <td>
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
                        <td>
                            <?php if ($row['orderStatus'] == 1) {
                            ?>
                                <p class="status">Баталсан </p>
                            <?php
                            } else {
                            ?>
                                <p class="status2">Батлагдаагүй</p>
                            <?php

                            };
                            ?>
                        </td>

                        <td>
                            <button>
                                <a onclick="return confirm ('Та захиалгыг устгахдаа итгэлтэй байна уу  ? ')" href="userOrderDelete.php?id=<?php echo $row["order_id"]; ?>">Устгах</a> </button>
                        </td>
                    </tr>

                <?php
                    $i++;
                }
                ?>
            </table>

        <?php
        } else {
            echo "Батлагдсан захиалга байхгүй эсвлэл Төсөв батлагдсан төлөврүү шилжсэн байна";
        }


        ?>
    </div>

    <div id="Sanhuu" class="tabcontent">
        <h3>Төсөв батлагдсан захиалга</h3>
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT order_id , orderDate  , item , problem , userID , dataStatusId ,orderStatus FROM workorder WHERE userID = '$userID' AND dataStatusId = 1  AND orderStatus=1 "
        );
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table border="1">
                <tr>
                    <td>Захиалгын код</td>
                    <td>Ажилтны код</td>
                    <td>Захиалга өгсөн өдөр</td>
                    <td>Эд хөрөнгийн нэр </td>
                    <td>Асуудал </td>
                    <td>Аж ахуй баталсан</td>
                    <td>Төсөв баталсан</td>
                </tr>

                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row["order_id"]; ?>
                        </td>
                        <td>
                            <?php echo $row["userID"]; ?>
                        </td>
                        <td>
                            <?php echo $row["orderDate"]; ?>
                        </td>
                        <td>
                            <?php echo $row["item"]; ?>
                        </td>
                        <td>
                            <?php echo $row["problem"]; ?>
                        </td>
                        <td>
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
                        <td>
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
                        <td>
                            <button>
                                <a onclick="return confirm ('Та захиалгыг устгахдаа итгэлтэй байна уу  ? ')" href="userOrderDelete.php?id=<?php echo $row["order_id"]; ?>">Устгах</a> </button>
                        </td>
                    </tr>

                <?php
                    $i++;
                }
                ?>
            </table>

        <?php
        } else {
            echo "Өгөгдөл байхгүй";
        }


        ?>
    </div>

    <div id="done" class="tabcontent">
        <h3>Төсөв батлагдсан захиалга</h3>
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT * FROM workorder WHERE userID = '$userID' AND dataStatusId = 1  AND orderStatus=1 AND checkStatus = 2 "
        );
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table border="1">
                <tr>
                    <td>Захиалгын код</td>
                    <td>Ажилтны код</td>
                    <td>Захиалга өгсөн өдөр</td>
                    <td>Эд хөрөнгийн нэр </td>
                    <td>Асуудал </td>
                    <td>Аж ахуй баталсан</td>
                    <td>Төсөв баталсан</td>
                    <td>Дууссан эсэх</td>
                </tr>

                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row["order_id"]; ?>
                        </td>
                        <td>
                            <?php echo $row["userID"]; ?>
                        </td>
                        <td>
                            <?php echo $row["orderDate"]; ?>
                        </td>
                        <td>
                            <?php echo $row["item"]; ?>
                        </td>
                        <td>
                            <?php echo $row["problem"]; ?>
                        </td>
                        <td>
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
                        <td>
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
                       
                        <td>
                            <?php 
                                 if($row['checkStatus'] ==2 ) { 
                                    ?>
                                            <p style="color:#04AA6D" >Дууссан</p>                                    
                                    <?php 
                                 }    
                            ?>
                        </td>


                    </tr>

                <?php
                    $i++;
                }
                ?>
            </table>

        <?php
        } else {
            echo "Өгөгдөл байхгүй";
        }


        ?>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>