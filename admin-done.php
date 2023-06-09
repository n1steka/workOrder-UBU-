<?php
session_start();
include("./service/dbConnect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> Админ Панел</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="admin-index.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: 0.8;" />
                <span class="brand-text font-weight-light">Админ Панел</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="admin-movie.php" class="nav-link">
                                <i class="nav-icon fas fa-video"></i>
                                <p>
                                    Алба тэнхим
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-users.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Захиалгын жагсаалт</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-orderConfirm.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Баталсан захиалга</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="workProcess.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Төлөв</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="admin-done.php" class="nav-link active">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Дууссан захиалгууд</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="employee-user.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Ажилчдын мэдээлэл</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./service/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Гарах</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="donwload">
            </div>

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Захиалгууд</h1>
                        </div>
                    </div>
                </div>

                <div class="excel">
                    <a href="export/export_excel.php">Тайлан татах</a>
                </div>

                <style>
                    .excel a:link,
                    a:visited {
                        background-color: #DCDCDC;
                        color: black;
                        border: 2px #A9A9A9;
                        padding: 2px 6px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                    }

                    .excel a:hover,
                    a:active {
                        background-color: #DCDCDC;
                        color: white;
                    }

                    .excel {
                        position: absolute;
                        top: 20px;
                        right: 10px;
                    }
                </style>

                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <?php
            include("./service/dbConnect.php");
            $sql = "SELECT * FROM workorder  WHERE checkStatus = 2 AND employee_id IS NOT NULL ORDER BY orderDate DESC ";
            $result = $conn->query($sql);
            $dev = array();
            if ($result->num_rows > 0) {
                // output data of each row
                ?>

                <section class="content">
                    <form action="./employee/sent.php" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Хэрэглэгчид</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped projects">
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
                                            <th style="width: 10%; text-align: center">Дэлгэрэнгүй</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
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
                                                    if (mysqli_num_rows($res) > 0) {
                                                        $rw = mysqli_fetch_assoc($res)
                                                            ?>

                                                        <?php
                                                        echo $rw['username'];
                                                    }
                                                    ?>
                                                    <?php if ($row['checkStatus'] == 2) {

                                                        ?>
                                                        <p style="color: green">Дууссан</p>

                                                        <?php
                                                    } else {
                                                    }
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

                                                    }
                                                    ;
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

                                                    }
                                                    ;
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
                                                    }
                                                    ;
                                                    ?>
                                                </td>

                                                <td>
                                                    <button>
                                                        <a href="report/print.php?id=<?php echo $row['order_id'] ?> ">Харах</a>
                                                    </button>

                                                </td>

                                            </tr>
                                        </tbody>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
                </section>
                <?php

            } else {
                echo "0 results";
            }
            $conn->close();

            ?>


            <style>
                .status1 {
                    color: blueviolet;
                }

                .status {
                    color: green;
                }

                .status2 {
                    color: red;
                }

                .tag a:link,
                a:visited {
                    background-color: white;
                    color: black;
                    border: 2px solid green;
                    padding: 0px 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                }
            </style>

        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>

        <script type="text/javascript">
            $(function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                });

                $(".swalDefaultSuccess").click(function () {
                    Toast.fire({
                        icon: "success",
                        title: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".swalDefaultInfo").click(function () {
                    Toast.fire({
                        icon: "info",
                        title: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".swalDefaultError").click(function () {
                    Toast.fire({
                        icon: "error",
                        title: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".swalDefaultWarning").click(function () {
                    Toast.fire({
                        icon: "warning",
                        title: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".swalDefaultQuestion").click(function () {
                    Toast.fire({
                        icon: "question",
                        title: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });

                $(".toastrDefaultSuccess").click(function () {
                    toastr.success(
                        "Lorem ipsum dolor sit amet, consetetur sadipscing elitr."
                    );
                });
                $(".toastrDefaultInfo").click(function () {
                    toastr.info(
                        "Lorem ipsum dolor sit amet, consetetur sadipscing elitr."
                    );
                });
                $(".toastrDefaultError").click(function () {
                    toastr.error(
                        "Lorem ipsum dolor sit amet, consetetur sadipscing elitr."
                    );
                });
                $(".toastrDefaultWarning").click(function () {
                    toastr.warning(
                        "Lorem ipsum dolor sit amet, consetetur sadipscing elitr."
                    );
                });

                $(".toastsDefaultDefault").click(function () {
                    $(document).Toasts("create", {
                        title: "Toast Title",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultTopLeft").click(function () {
                    $(document).Toasts("create", {
                        title: "Toast Title",
                        position: "topLeft",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultBottomRight").click(function () {
                    $(document).Toasts("create", {
                        title: "Toast Title",
                        position: "bottomRight",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultBottomLeft").click(function () {
                    $(document).Toasts("create", {
                        title: "Toast Title",
                        position: "bottomLeft",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultAutohide").click(function () {
                    $(document).Toasts("create", {
                        title: "Toast Title",
                        autohide: true,
                        delay: 750,
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultNotFixed").click(function () {
                    $(document).Toasts("create", {
                        title: "Toast Title",
                        fixed: false,
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultFull").click(function () {
                    $(document).Toasts("create", {
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        icon: "fas fa-envelope fa-lg",
                    });
                });
                $(".toastsDefaultFullImage").click(function () {
                    $(document).Toasts("create", {
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        image: "../../dist/img/user3-128x128.jpg",
                        imageAlt: "User Picture",
                    });
                });
                $(".toastsDefaultSuccess").click(function () {
                    $(document).Toasts("create", {
                        class: "bg-success",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultInfo").click(function () {
                    $(document).Toasts("create", {
                        class: "bg-info",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultWarning").click(function () {
                    $(document).Toasts("create", {
                        class: "bg-warning",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultDanger").click(function () {
                    $(document).Toasts("create", {
                        class: "bg-danger",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
                $(".toastsDefaultMaroon").click(function () {
                    $(document).Toasts("create", {
                        class: "bg-maroon",
                        title: "Toast Title",
                        subtitle: "Subtitle",
                        body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
                    });
                });
            });
        </script>
</body>

</html>