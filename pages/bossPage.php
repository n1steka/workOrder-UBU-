<?php
session_start();
$userID = $_SESSION['boss_id'];
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
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Төсөв батлагдаагүй</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Төсөв батласан</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
        <button><a href="../service/logout.php">Гарах</a></button>
    </div>

    <div id="London" class="tabcontent">
        <h3>Захиалгын жагсаалт</h3>
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT order_id , orderDate  , item , roomNumber, problem , userID , dataStatusId ,money_order FROM workorder WHERE  dataStatusId = 1 AND money_order >=0 AND orderStatus IS NULL "
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
                    <td>Төсөв батлах</td>
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
                                <a onclick="return confirm ('Та төсөв батлахдаа итгэлтэй байна уу  ? ')" href="../service/uproveBudget.php?id=<?php echo $row["order_id"]; ?>">Батлах</a>
                            </button>
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

    <div id="Paris" class="tabcontent">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p>
        <?php
        $result = mysqli_query(
            $conn,
            "SELECT * FROM workorder WHERE  dataStatusId = 1 AND money_order >=0 AND orderStatus = 1  "
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
                    <td>Төсөв батлах</td>
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
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
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