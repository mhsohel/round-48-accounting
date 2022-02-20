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
    <form action="income_search.php" method="post">
        <input type="date" name="first_date" placeholder="date to" class="form-control">
        <input type="date" name="second_date" placeholder="date from" class="form-control">
        <button class="btn btn-primary">Search</button>
        
    </form>

</div>

  <div class="card col-md-12">                     



<table class="table table-bordered">
    <tr class="bg-primary">
        <td>sl</td>
        <td>title</td>
        <td>note</td>
        <td>people_name</td>
        <td>amount</td>
        <td>date</td>
        <!-- <td>txn_id</td> -->
        <td>action</td>
    </tr>


<?php
// $show = $db->query('Select * from income');
$show = $db->query('Select income.*,people.name from income join people on income.people_id=people.id');


$E = 0;

while($var = $show->fetch_assoc()){
    // print_r($var);

    ?>

    <tr>
        <td> <?php echo ++$E ?> </td>
        <td> <?php echo $var['title'] ?> </td>
        <td> <?php echo $var['note'] ?> </td>
        <td> <?php echo $var['name'] ?> </td>
        <td align="right"> <?php echo number_format($var['amount'],2) ?> </td>
        <td> <?php echo $var['date'] ?> </td>
        
        
        <td> <a href="income_edit.php?id=<?php echo $var['id'] ?>" class="btn btn-xs btn-success">Update</a> 
             <a href="income_delete.php?id= <?php echo $var['txn_id'] ?>" class="btn btn-xs btn-danger" onclick='return confirm("Do you really want to delete this row?")'>Delete</a>  </td>
    </tr>
    
<?php } ?>

</table>

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