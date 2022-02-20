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
                        <div class="card-header border-0 bg-success">
                            <div class="d-flex justify-content-between ">
                                <h3 class="card-title ">Equity</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1>Equity Insert Form</h1>




                            <form action="equity_recieved.php" method="post">

                                <table class="table table bordered ">
                                    <tr>
                                        <td>Title</td>
                                        <td><input type="text" name="a" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Note</td>
                                        <td><input type="text" name="b" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><input type="text" name="c" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td>Date</td>
                                        <td><input type="date" name="d" class="form-control"></td>
                                    </tr>
                                    <tr>

                                    <tr>
                                        <td>Account Head</td>

                                        <td>
                                            <select name="acc" id="" class="form-control">
                                                <?php 

                               $w=$db->query("select * from account_heads where type ='equity'");
                               while($em = $w->fetch_assoc()) {

                                print_r($em);
                               
                               ?>

                                                <option value="<?php echo $em['id']   ?>"><?php echo $em['name']; ?>
                                                </option>
                                                <?php };?>






                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>txn_type</td>
                                        <td>
                                        <select name="txn" id="" class="form-control">

                                            <option value="debit">Debit</option>
                                            <option value="credit">Credit</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>people_id</td>
                                       <td><select name="pol" id="" class="form-control">
                                            <?php 

                                           $l=$db->query("select * from people");
                                          while( $m=$l->fetch_assoc()) {  ?>

                                            // print_r($m);
                                            <option value=" <?php echo $m['id']   ?>"><?php echo $m['name'] ?></option>

                                            <?php }; ?>

                                            ?>
                                        </select>
                                        </td> 
                                    </tr>

                                    <tr>
                                        <td><input type="submit" class="btn btn-primary"></td>
                                        <td></td>
                                    </tr>

                                </table>


                            </form>
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
        <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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