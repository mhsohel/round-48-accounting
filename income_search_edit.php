 <?php 
include 'inc/database.php';
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
                            <h1 class="m-0">Income</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Income</li>
                            </ol>
                        </div>



<?php 

$G = $_GET['id'];

$show = $db->query("Select * from income where id=$G");

$ash = $show->fetch_assoc();


?>

<div class="card col-md-10">

<form action="income_search_update.php" method="post">
    <table class="table table-bordered"> 

        <input type="hidden" name="stivejobs" value="<?php echo $ash['id'] ?>">

    <tr>
        <td>Title:</td>
        <td><input type="text" name="title" class="form-control" value="<?php echo $ash['title'] ?>"></td>
    </tr>
    <tr>
        <td>Note:</td>
        <td><input type="text" name="note" class="form-control" value="<?php echo $ash['note'] ?>"></td>
    </tr>
    <tr>
        <td>People Id:</td>
        <td><input type="text" name="people_id" class="form-control" value="<?php echo $ash['people_id'] ?>"></td>
    </tr>
    <tr>
        <td>Amount:</td>
        <td><input type="text" name="amount" class="form-control" value="<?php echo $ash['amount'] ?>"></td>
    </tr>
    <tr>
        <td>Date:</td>
        <td><input type="date" name="date" class="form-control" value="<?php echo $ash['date'] ?>"></td>
    </tr>
   <tr>
        <td>txn_id:</td>
        <td><input type="text" name="txn_id" class="form-control" value="<?php echo $ash['txn_id'] ?>"></td>
    </tr>
    
    <tr>
        <td> <button class="btn btn-block btn-primary">Submit</button> </td>
    </tr>
    
    </table>
    </form> 

    </div>




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