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

            <!-- Main content -->
            <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Online Store Visitors</h3>
                      <a href="javascript:void(0);">View Report</a>

                    </div>
                  </div>
                  <div class="card-body">
                    <h1>Liability List</h1>

                    <!-- between search---- -->
                    <div class="text-right"><form action="liability_BetweenSearch_show.php" method="post">  &nbsp<input type="date" name="first">&nbsp Between &nbsp<input type="date" name="second">&nbsp &nbsp<input type="submit" value="search" name="submit"></div></form><br>
                  
                     <table class="table table-bordered ">
                      <tr class="table-primary">
                            <td>SL</td>
                            <td>Title</td>
                            <td>Note</td>
                            <td>People</td>
                            <td>Amount</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td>Action/
                            <a href="liability_form.php" class="btn btn-xs btn-success">Add New</a> </td>
                      </tr>
                        <?php 
                        if(isset($_POST['submit'])){
                            $f_date=$_POST['first'];
                            $s_date=$_POST['second'];
                            $r=$db->query("select * from liability where date between '$f_date' and '$s_date' order by date asc");
                            if($r->num_rows>0){
                                $ali=0;
                                while($info=$r->fetch_assoc()){

                                
                                
                          
                        
                      
                         ?>
                        <tr >
                            <td><?php echo ++$ali ?></td>
                            <td><?php  echo $info['title'] ?></td>
                            <td><?php  echo $info['note'] ?></td>
                            <td><?php  echo $info['people_id'] ?></td>
                            <td><?php  echo $info['amount'] ?></td>
                            <td><?php  echo $info['date'] ?></td>
                            <td><?php  echo $info['status'] ?></td>
                            <td><a href="liability_edit.php?id=<?php  echo $info['id'] ?>" class="btn btn-xs btn-primary">Edit</a>&nbsp<a href="liability_delete.php?id=<?php  echo $info['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to remove it?')">Delete</a></td>
                      </tr>
                      <?php  }; };   };  ?>
                    </table>
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




