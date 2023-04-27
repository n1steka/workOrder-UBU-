<?php
session_start();
$adminID = $_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Админ Панел</title>
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
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Админ Панел</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="admin-movie.php" class="nav-link ">
                <i class="nav-icon fas fa-video"></i>
                <p>Алба тэнхим</p>
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
              <a href="admin-done.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Дууссан захиалгууд</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="employee-user.php" class="nav-link active">
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6"></div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#employee-lg">
          Ажилтан нэмэх
        </button>
        <!-- Default box -->

        <!-- /.card -->
      </section>

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Та устгахдаа итгэлтэй байна уу?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">
                Хаах
              </button>
              <button type="button" class="btn btn-danger">Тийм</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php
      include("./service/dbConnect.php");
      $sql = "SELECT employee_id, username, lastname, email, phone FROM employee ORDER BY username";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          // echo "id: " . $row["user_id"] . " - Name: " . $row["username"] . " " . $row["email"] . " " . $row["phone"] . "<br>";
          echo '<section class="content">';
          echo '<!-- Default box -->';
          echo '<div class="card">';
          echo '<div class="card-header">';
          echo '<h3 class="card-title">Хэрэглэгчид</h3>';
          echo '</div>';
          echo '<div class="card-body p-0">';
          echo '<table class="table table-striped projects">';
          echo '<thead>';
          echo '<tr>';
          echo '<th style="width: 1%">Код</th>';
          echo '<th style="width: 30%">Нэр</th>';
          echo '<th style="width: 19%">Имэйл</th>';
          echo '<th style="width: "15%">Дугаар</th>';
          echo '<th style="width: 10%; text-align: center">Тохиргоо</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          echo '<tr>';
          echo "<td>" . $row['employee_id'] . "</td>";
          echo '<td>';
          echo "<a>" . $row['lastname'] . "</a>";
          echo '<br />';
          echo '</td>';
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['phone'] . "</td>";
          echo '<td class="project-actions text-right">';

          ?>
          <button type="button" class="btn btn-default" data-toggle="modal">
            <a onclick="return confirm('Утгахдаа итгэлтэй байна уу ? ')"
              href="./service/employeeDelete.php?eid=<?php echo $row["employee_id"]; ?>">Устгах</a></button>

          <script>
            var modal = document.getElementById('id01');
            window.onclick = function (event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
          </script>
          <button onclick="" type="button" class="btn btn-default" data-toggle="modal">
            <a href="./service/userUpdate.php?eid=<?php echo $row["employee_id"]; ?>">Засах</a>
          </button>
          <?php
          echo '</button>';
          echo '</td>';
          echo '</tr>';
          echo '</tbody>';
          echo '</table>';
          echo '</div>';
          echo '<!-- /.card-body -->';
          echo '</div>';
          echo '<!-- /.card -->';
          echo '</section>';
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>

      <div class="modal fade" id="employee-lg">

        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ажилтан нэмэх</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="./service/addEmployee.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Ажилтаны код : </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Албаны код"
                      required="true" name="employeeCode" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Овог : </label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Овог "
                      name="username" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Нэр : </label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Нэр"
                      name="lastname" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Утасны дугаар :</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Утасны дугаар"
                      name="phone" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Имэйл : </label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Имэйл "
                      name="email" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password : </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Нууц үг "
                      name="password" />
                  </div>
                  <div class="form-group">
                    <input type="radio" name="ab" value="Эрэгтэй" required>Эрэгтэй &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="ab" value="Эмэгтэй" required> Эмэгтэй
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">
                    Хадгалах
                  </button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">
                Хаах
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



      <!-- <div class="modal fade" id="sda-we">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Хэрэглэгчийн мэдээллийг өөрчлөх</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Албаны код : </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Албаны код" required="true" name="classCode" value="<?php echo $row['user_id']; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Овог : </label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Овог " name="username" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Нэр : </label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Нэр" name="lastname" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Утасны дугаар :</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Утасны дугаар" name="phone" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Имэйл : </label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Имэйл " name="email" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password : </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Нууц үг " name="password" />
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">
                    Хадгалах
                  </button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">
                Хаах
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div> -->
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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