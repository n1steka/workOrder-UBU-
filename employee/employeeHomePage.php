<?php
session_start();

if (empty($_SESSION['id'])) {
?>
    <script>
        window.open("http://localhost/order/pages/userLogin.php", "_self");
    </script>
<?php
}

$userID = $_SESSION['id'];
include("../service/dbConnect.php");
echo "Welcome user " . $userID;
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
        }

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 30%;
            height: 300px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 70%;
            border-left: none;
            height: 300px;
        }
    </style>
</head>

<body>

    <h2>Төсөв батлах</h2>
    <p>Төсөв батлах шаардлагатай захиалгууд </p>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Хийгдэх ажил</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Таны сонгосон ажил</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Дууссан ажилууд</button>
        <button><a href="../service/logout.php">Гарах</a></button>
    </div>

    <div id="London" class="tabcontent">
        <h3>Захиалгын жагсаалт</h3>
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT * FROM workorder WHERE employee_id = '$userID'  AND checkStatus IS NULL"
        );
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table border="1">
                <tr>
                    <td>Захиалгын код</td>
                    <td>Ажилтны код</td>
                    <td>Захиалга өгсөн өдөр</td>
                    <td>Тоот</td>
                    <td>Эд хөрөнгийн нэр </td>
                    <td>Асуудал </td>
                    <td>Үнийн санал </td>
                    <td>Аж ахуй</td>
                    <td>Ажил сонгох</td>
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
                            <?php
                            $usid =  $row["userID"];
                            $qry = mysqli_query($conn, "SELECT * FROM users WHERE  user_id = '$usid'");
                            $rws = mysqli_fetch_array($qry);
                            echo $rws['username'];

                            ?>
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
                            <?php echo $row["money_order"]; ?>₮
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
                                <a onclick="return confirm ('Та төсөв батлахдаа итгэлтэй байна уу  ? ')" href="./employeeCheck.php?id=<?php echo $row["order_id"] ?> "> Батлах</a>
                            </button>
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

    <div id="Paris" class="tabcontent">
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT * FROM workorder WHERE checkStatus = 1"
        );
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table border="1">
                <tr>
                    <td>Захиалгын код</td>
                    <td>Алба Тэнхим</td>
                    <td>Захиалга өгсөн өдөр</td>
                    <td>Тоот</td>
                    <td>Эд хөрөнгийн нэр </td>
                    <td>Асуудал </td>
                    <td>Үнийн санал </td>
                    <td>Аж ахуй</td>
                    <td>Төлөв</td>
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
                            <?php

                            $userid =  $row["userID"];
                            $qry = mysqli_query($conn, "SELECT * FROM users WHERE  user_id = '$userid'");
                            $rws = mysqli_fetch_array($qry);
                            echo $rws['username'];

                            ?>
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
                            <?php echo $row["money_order"]; ?>
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
                                <a onclick="return confirm ('Та төсөв батлахдаа итгэлтэй байна уу  ? ')" href="workDone.php?id=<?php echo $row["order_id"]; ?>">Дууссан</a>
                            </button>
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

    <div id="Tokyo" class="tabcontent">
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT * FROM workorder WHERE checkStatus = 2"
        );
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table border="1">
                <tr>
                    <td>Захиалгын код</td>
                    <td>Алба Тэнхим</td>
                    <td>Захиалга өгсөн өдөр</td>
                    <td>Тоот</td>
                    <td>Эд хөрөнгийн нэр </td>
                    <td>Асуудал </td>
                    <td>Үнийн санал </td>
                    <td>Аж ахуй</td>
                    <td>Төлөв</td>
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
                            <?php
                            $useride =  $row["userID"];
                            $qry = mysqli_query($conn, "SELECT * FROM users WHERE  user_id = '$useride'");
                            $rws = mysqli_fetch_array($qry);
                            echo $rws['username']; ?>
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
                            <?php echo $row["money_order"]; ?>
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
                            <?php
                            if ($row['checkStatus'] == 2) {
                            ?>
                                <p style="color:green">Дууссан</p>
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

        // Get the element with id="defaultOpen" and click on it
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