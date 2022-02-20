 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">  -->

<?php
include('inc/database.php');
// $con=new mysqli('localhost','root','','accounting'); 
$infor='select * from people';
$r=$db->query($infor);
?>
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
                      

                        <!-- contents goes here  -->
    
<div class='card'>
    <table class='table table-bordered'>
        <tr class="bg-primary">
            <td>SL</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Company</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        <?php
         $a=0; 
        while($result= $r->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo ++$a ?></td>
                            <td><?php echo $result['name']?></td>
                            <td><?php echo $result['email']?></td>
                            <td><?php echo $result['phone']?></td>
                            <td><?php echo $result['address']?></td>
                            <td><?php echo $result['company']?></td>
                            <td><?php echo $result['status']?></td>
                            <td>
                                <a href="people_view.php?id=<?php echo $result['id']?>" class="btn btn-xs btn-success" >View</a>
                                <a href="people_edit.php?id=<?php echo $result['id']?>" onclick="return confirm('are u sure?')" class="btn btn-xs btn-primary">Edit</a>
                                <a href="people_delete.php?id=<?php echo $result['id']?>" onclick="return confirm('are u sure?')" class="btn btn-xs btn-danger">Delete</a>
                                
                            </td>
                            
                        </tr>
          
                    <?php } ?>


                    
</table>
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
    <!-- Styles -->


<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->




  </body>
</html>
