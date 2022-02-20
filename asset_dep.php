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
                       <form action=" " method="POST">
                           <table class="table table-bordered">
                               <tr>
                                   <td>Edit Date <input type="date" name="from_date" class="form-control" value="<?php if(isset($_GET['"Y/m/d"'])){echo $_GET['"Y/m/d"'];}else{}?>"></td>
                             

                               <td>Search <input type="submit" value="search" class="form-control btn btn-block btn-primary"></td>
                               </tr>
                          
                            </table>
                          
                          
                       </form>
                       
                           <table class="table table-bordered">
                               <thead>
                               <tr>
                                   <th>SL</th>
                                   <th>Title</th>
                                   
                                   <th> Purchase Amount</th>
                                 
                                    <th> perchase Date</th>
                                    <th>Present date</th>
                                    <th>Total Year</th>
                                    <th> Depreciation Rate</th>
                                    <th> Depreciation Amount</th>
                                     <th>Present Value</th>
                                    
                        

                                

                               </tr>
                               </thead>
                               <tbody>
                         <?php
                         $i=0;
                            while($m = $data->fetch_assoc()){
                                $q= date("Y/m/d");
                                if(isset($_POST["from_date"])){
                                $q=$_POST["from_date"];
                                
                                
                                }
                             ?>
                               <tr>
                                   <td><?php echo ++$i ?></td>
                                   <td><?php echo $m['title'] ?></td>
                                   <td align="right"><?php echo number_format($m['amount'],2) ?></td>
                                   <td><?php echo $m['date'] ?></td>
                                   <td><?php echo $q ?></td>
                                   <td align="right"> <?php $datetime1 = date_create( $m['date']);
                                            $datetime2 = date_create($q);
                                        $interval = date_diff($datetime1, $datetime2);
                            echo $duration=number_format($interval->format('%a')/365,2);

                                    ?></td>
                                    <td align="right"><?php echo number_format($m['depreciation_rate'],2) ?></td>
                                  
                                     <td align="right"><?php echo number_format((( $m['amount']*$m['depreciation_rate'])/100 )*$duration,2)?></td>
                                     <td align="right"><?php echo number_format($m['amount'] - (( $m['amount']*$m['depreciation_rate'])/100 )*$duration,2)?></td>

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