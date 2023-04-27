<?php
include("../service/dbConnect.php");
include("./export_excel.php");
?>

<form action="" method="POST">
    <table border="1">
        <tr>
            <th>Gender</th>
            <th>Age</th>
            <th>Designation</th>
            <th>Address</th>
        </tr>
        <tbody>
            <?php foreach ($records  as $row) { ?>
                <tr>
                    <td> <?php echo $row['employee_id']; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td> <?php echo $row['phone']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                </tr>
            <?php } ?>
        </tbody>


    </table>

</form>
<a href="export_excel.php">Save as Excel</a>
