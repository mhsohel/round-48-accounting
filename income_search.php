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
                            <h1 class="m-0">Income List</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Income</li>
                            </ol>
                        </div>

<div class="col-md-6">
    <form action="" method="post">
        <input type="date" name="first_date" class="form-control">
        <input type="date" name="second_date" class="form-control">
        <button class="btn btn-primary" name="">Search</button>
        
    </form>

</div>

<div class="card">
    <?php
    $firstDate = $_POST['first_date'];
    $secondDate = $_POST['second_date'];

    ?>

    <div class="card">                     



<table class="table table-bordered">
    <tr class="bg-primary">
        <td>sl</td>
        <td>title</td>
        <td>note</td>
        <td>people_Id</td>
        <td>amount</td>
        <td>date</td>
        <td>txn_id</td>
        <td>action</td>
    </tr>


<?php

$E = 0;

$Q = $db->query("SELECT * FROM income WHERE date BETWEEN '$firstDate' AND '$secondDate';");


while($fa = $Q->fetch_assoc()){

//     echo "<pre>";
//     print_r($fa);
// exit;
    ?>


    <tr>
        <td> <?php echo ++$E ?> </td>
        <td> <?php echo $fa['title'] ?> </td>
        <td> <?php echo $fa['note'] ?> </td>
        <td> <?php echo $fa['people_id'] ?> </td>
        <td align="right"> <?php echo number_format($fa['amount'],2) ?> </td>
        <td> <?php echo $fa['date'] ?> </td>
        <td> <?php echo $fa['txn_id'] ?> </td>


        <td> <a href="income_search_edit.php?id= <?php echo $fa['id'] ?>" class="btn btn-xs btn-success">Edit/Update</a> 
             <a href="income_search_delete.php?id= <?php echo $fa['id'] ?>" class="btn btn-xs btn-danger" onclick='return confirm("Do you really want to delete this row?")'>Delete</a></td>
    </tr>
    
<?php } ?>

</table>

</div> 
    
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