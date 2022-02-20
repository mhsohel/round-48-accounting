

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">People Page</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        <!-- contents goes here  -->
                        <div class="card">
    <form action="people_save.php" method="post">
    <table class="table table-bordered">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" class="form-control"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class="form-control"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="number" name="phone"  class="form-control"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td> <input type="text" name="address" class="form-control"></td>
        </tr>
        <tr>
            <td>Company</td>
            <td><input type="text" name="company" class="form-control"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>Active<input type="radio" name="status" value="active" ></td>
            <td>Inactive<input type="radio" name="status" value="inactive" 
                ></td>
        </tr>
        <tr>
            <td><input type="submit" name=""></td>
        </tr>
    </table>
</form>
</div>
</div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">Anything you want</div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
  </body>
</html>