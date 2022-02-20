<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
$conn = new mysqli('localhost','root','','accounting');
$qry = $conn->query('SELECT * FROM people');
$q = $conn->query('SELECT * FROM account_heads WHERE type="income"');
$que = $conn->query('SELECT * FROM transactions');
?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Income:</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Income</li>
                            </ol>
                        </div>


        <div class="card col-md-10">

                <form action="incone_save.php" method="post">
                    <table class="table table-bordered">
    
                        <!-- <tr>
                            <td>SL:</td>
                            <td><input type="number" name="sl" class="form-control"></td>
                        </tr> -->

                        <tr>
                            <td>Title:</td>
                            <td><input type="text" name="title" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Note:</td>
                            <!-- <td><input type="text" name="note" class="form-control"></td> -->
                            <td> <textarea name="note" class="form-control"></textarea> </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="people_id" class="form-control">
                                    <option>Select People</option>
                                    <?php while($peopleData = $qry->fetch_assoc()){ ?>
                                        <option value="<?php echo  $peopleData['id'] ?>"><?php echo $peopleData['name']  ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>Amount:</td>
                            <td><input type="number" name="amount" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date" name="date" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select class="form-control" name="account_head">
                                    <option>Account Heads</option>
                                    <?php while($account_heads = $q->fetch_assoc()){ ?>
                                        <option value="<?php echo  $account_heads['id'] ?>"><?php echo $account_heads['name']  ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            
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