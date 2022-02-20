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
                            <h1 class="m-0">Starter Page</h1>
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
                
                        <div class="card">
                            <div class="card-body">
                                <h2 align="center">Account Heads Form</h2>
                                <form action="form.php" method="post">
                                    <table class="table table-bordered">
                                          <tr>
                                              <th>Type : </th>
                                              <td>
                                                  <input type="radio" name="type" value="asset"> asset &nbsp &nbsp &nbsp &nbsp
                                                  <input type="radio" name="type" value="equity"> equity &nbsp &nbsp &nbsp &nbsp
                                                  <input type="radio" name="type" value="expense"> expense &nbsp &nbsp &nbsp &nbsp
                                                  <input type="radio" name="type" value="income"> income &nbsp &nbsp &nbsp &nbsp 
                                                  <input type="radio" name="type" value="liability"> liability
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>Name : </th>
                                              <td>
                                                  <input type="text" name="name" class="form-control">
                                              </td>
                                          </tr>
                                          <tr>
                                              <td colspan="2" align="center">
                                                  <button class="btn btn-bolck btn-success">Cancel</button>
                                                  <button class="btn btn-bolck btn-primary">Submit</button>
                                              </td>
                                          </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <!-- contents goes here  -->
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