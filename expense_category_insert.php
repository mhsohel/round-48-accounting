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
                        <div class="col-sm-12">
                            <h1 style="color:violet; text-align:center">Expense Category Insert Page</h1>
                            <form action="expense_category_insert_data.php" method="post">
                            <a href="expense_category.php" class="btn btn-info">Back</a>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Category Name</th>
                                        <th><input type="text" name="category" class="form-control"></th>
                                    </tr>
                                 
                                    <tr>
                                        <th>Status</th>
                                       <th><label>Active</label><input type="radio" name="status" value="active"><label>Inactive</label><input type="radio" name="status" value="inactive"></th> 
                                    </tr>
                                    <tr>
                                        <th><input type="reset" class="btn btn-success"></th>
                                       <th><input type="submit"  class="btn btn-primary"></th> 
                                    </tr>
                                </table>
                            </form>
                        
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
                        <!-- contents goes here  -->
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