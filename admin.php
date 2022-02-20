<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
$query="select * from admin";
$data=$db->query($query);


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1  style="color:violet; text-align:center">Admin Table</h1>
                            <form action="">
                            <a href="admin_insert.php" class="btn btn-info">Insert</a>
                            <table class="table table-bordered" >

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=0;
                                    while ($file=$data->fetch_assoc()){
                                    ?>
                                     <tr>
                                        <th><?php echo ++$i?></th>
                                        <th><?php echo $file['name']?></th>
                                        <th><?php echo  $file['email']?></th>
                                        <th><?php echo  $file['password']?></th>
                                        <th><?php echo  $file['status']?></th>
                                        <th>
                                            <a href="admin_update.php?id=<?php echo $file['id']?>" class="btn btn-success">Update</a>
                                            <a href="admin_delete.php?id=<?php echo $file['id']?>" class="btn btn-danger">Delete</a>
                                        </th>
                                    </tr>
                                    <?php 
                                    }?>

                                </tbody>
                                
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