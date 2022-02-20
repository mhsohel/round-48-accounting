 <?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>

 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">  -->

<?php
include('inc/database.php');
// $con=new mysqli('localhost','root','','accounting'); 


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
            <div>
        <form action="people_search.php?id=<?php echo $_GET['id'] ?>" method="post">
            
        &nbsp&nbsp&nbsp<input type="date" name="first" value="<?php //if(isset($_GET['first'])){echo $_GET['first'] ;}else{}  ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="date" name="second" value="<?php //if(isset($_GET['second'])){echo $_GET['second'] ;}else{}  ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" name="submit" value="search"><br><br>
        
    </form></div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- contents goes here  -->

<div class='card'>
    <table class='table table-bordered'>
        <tr class="bg-primary">
            <td>Name</td>
            <td>Note</td>
            <td>Txn</td>
            <td>Amount</td>
            <td>Date</td>
            
        </tr>
        <?php 
        $id=$_GET['id'];
    $infor="SELECT transactions.*, account_heads.name  FROM transactions  join   account_heads on account_heads.id= transactions.account_head_id where people_id=$id ";
 $q= "select * from people where id=$id";
 $p=$db->query($q)->fetch_assoc();
 echo $p['name'];
 
     $r=$db->query($infor);

while($t=$r->fetch_assoc()){
    ?>
    <tr>
        <td><?php echo $t['name'] ?></td>
        <td><?php echo $t['note'] ?></td>
        <td><?php echo $t['txn_type'] ?></td>
        <td><?php echo $t['amount'] ?></td>
        <td><?php echo $t['date'] ?></td>
        
</tr>
    <?php 
} ?>
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
  </body>
</html>
