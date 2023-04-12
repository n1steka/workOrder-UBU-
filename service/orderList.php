<?php
include("dbConnect.php");

$sql = "SELECT userID, item , problem , orderDate FROM workorder ";
if ($res = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($res) > 0) {
        echo "<div class='container'>";
        echo "<table border=1 >";
        echo "<tr>";
        echo "<th>Албаны код</th>";
        echo "<th>Эвдэрсэн болон хэрэг болсон зүйл</th>";
        echo "<th>Асуудал</th>";
        echo "<th>Захиалга өгсөн өдөр</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['item'] . "</td>";
            echo "<td>" . $row['problem'] . "</td>";
            echo "<td>" . $row['orderDate'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        mysqli_free_result($res);
    } else {
        echo "No matching records are found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. "
        . mysqli_error($conn);
}
mysqli_close($conn);
?>



<style>
    table {
        table-layout: fixed;
        width: 100%;
        border-collapse: collapse;
        border: 3px solid purple;
    }

    thead th:nth-child(1) {
        width: 30%;
    }

    thead th:nth-child(2) {
        width: 20%;
    }

    thead th:nth-child(3) {
        width: 15%;
    }

    thead th:nth-child(4) {
        width: 35%;
    }

    th,
    td {
        padding: 20px;
    }

    .container {
        margin-left: 30%;
        margin-top: 200px;
    }
</style>