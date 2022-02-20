<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php
include('inc/database.php');
$q = 'select * from assets ';
$data = $db->query($q);


?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Assets List</h1>
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
                        <!-- contents goes here  -->
                       
                           <table class="table table-bordered">
                               <thead>
                               <tr>
                                   <th>SL</th>
                                   <th>Title</th>
                                   <th>Note</th>
                                   <th>Amount</th>
                                   <th>Date</th>
                                   <th>Type</th>
                                   <th>Action</th>

                               </tr>
                               </thead>
                               <tbody>
                         <?php
                         $i=0;
                            while($m = $data->fetch_assoc()){

                             ?>
                               <tr>
                                   <td><?php echo ++$i ?></td>
                                   <td><?php echo $m['title'] ?></td>
                                   <td><?php echo $m['note'] ?></td>
                                   <td align="right"><?php echo number_format($m['amount'],2) ?></td>
                                   <td><?php echo $m['date'] ?></td>
                                   <td><?php echo $m['type'] ?></td>
                                  
                                   <td>
                                       <a href="edit_asset.php?id=<?php echo $m['id'] ?>" class="btn btn-md  btn-primary">Edit</a>
                                       <a href="delete_asset.php?id=<?php echo $m['id'] ?>" class="btn btn-md  btn-danger">Delete</a>
                                   </td>

                               </tr>

                              <?php } ?>
                            </tbody>
                              
                           </table>
                      
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