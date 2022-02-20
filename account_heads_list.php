<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include 'inc/database.php';
$q = "select * from account_heads";
$data = $db->query($q);
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
                
                        <div class="card">
                            <div class="card-body">
                                <h2 align="center">Account Heads List</h2>
                                     <a href="insert_account_heads.php" class="btn btn-bolck btn-success">Add Account Heads</a>
                                     <br>
                                     <br>
                                     <form action="account_heads_search.php" method="post">
                                        <table class="table table-bordered">
                                            <tr>
                                              <td><input type="text" name="search" placeholder="search your account type" class="form-control" >
                                              </td>
                                              <td>
                                                <input value="Search" type="submit" class="btn btn-primary btn-block">
                                              </td>
                                             </tr>
                                        </table>
                                    </form>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr class="bg-info text-center">
                                              <th>SL</th>
                                              <th>Type</th>
                                              <th>Name</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                           <tbody>
                                          <tr>
                                             <?php
                                             $i = 0;
                                             while ($r = $data->fetch_assoc()) {
                                                                                                 
                                             ?>
                                                       <td><?php echo ++$i ?></td>
                                                       <td><?php echo $r['type'] ?></td>
                                                       <td><?php echo $r['name'] ?></td>
                                                       <td>
                                                        <a href="account_heads_view.php?id=<?php echo $r['id'] ?>" class="btn btn-bolck btn-primary">View</a>&nbsp &nbsp &nbsp &nbsp
                                                            <a href="update_account_heads.php?id=<?php echo $r['id'] ?>" class="btn btn-bolck btn-success">Edit</a>&nbsp &nbsp &nbsp &nbsp
                                                            <a href="delete_account_heads.php?id=<?php echo $r['id'] ?>" class="btn btn-bolck btn-danger">Delete</a>
                                                       </td>
                                                  </tr>
                                             <?php } ?>
                                        </tbody>
                                          </tr>
                                    </table>
                            </div>
                        </div>
                        <!-- contents goes here  -->
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