<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include 'inc/database.php';
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
<?php
$w=$_GET['id'];
$raw=$db->query("select * from equity where id=$w ");
// $info=$raw->fetch_all(MYSQLI_ASSOC);
$info=$raw->fetch_assoc();
    // echo "<pre>";
    // print_r($info);

?>
<!-- Main content -->
            <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12" >
                <div class="card" >
                  <div class="card-header border-0 bg-secondary">
                    <div class="d-flex justify-content-between ">
                      <h3 class="card-title ">Equity</h3>
                      <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h1>Equity Insert Form</h1>
                    

                    <form action="equity_update.php" method="post" >
                           
                        <input type="hidden" value="<?php echo $info['id']  ?>" name="id">

                           <table class="table table bordered ">
                           <tr>
                               <td>Title</td>
                               <td><input type="text" name="a" value="<?php echo $info['title']    ?>" class="form-control"></td>
                           </tr>
                           
                           <tr>
                               <td>Note</td>
                               <td><input type="text" name="b" value="<?php echo $info['note']    ?>" class="form-control"></td>
                           </tr>
                           <tr>
                               <td>Amount</td>
                               <td><input type="text" name="c" value="<?php echo $info['amount']    ?>" class="form-control"></td>
                           </tr>
                           
                           <tr>
                               <td>Date</td>
                               <td><input type="date" name="d" value="<?php echo $info['date']    ?>" class="form-control"></td>
                           </tr>
                           <tr>
                           <td><input type="submit" class="btn btn-primary"></td>
                           </tr>
                           
                           </table>
                           
                           
                                                   </form>
                  </div>
                </div>



               
       </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
                     
      
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