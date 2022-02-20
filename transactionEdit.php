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
            <?php 
            
            
            $pplQuery = $db->query("SELECT * FROM people");
            $accountQuery = $db->query("SELECT * FROM account_heads");
            $transEdit = $db->query("SELECT * FROM `transactions` where transactions.id=".$_GET['id']);
            $transData= $transEdit->fetch_assoc(); 
            
            
            
            ?>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- contents goes here  -->
                          <div class="col-md-12 col-xl-12">
                          <div class="card">
                                 <div class="col-md-12 col-xl-12">
                                       <h1>Transactions Update</h1>
                                       <form action="transactionUpdate.php" method="POST">
                                       <table class="table table-bordered">
                                           <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                            <tr>
                                                <td>
                                                    <select name="peopleId" id="" class="form-control">
                                                       
                                                        <?php while( $peopleData = $pplQuery->fetch_assoc()){ 
                                                            
                                                            ?>
                                                        <option value="<?php echo $peopleData['id'] ?>" <?php if($transData['people_id']==$peopleData['id']){ echo "selected";} ?>><?php echo $peopleData['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                
                                                <td colspan="2">
                                                   <select name="accountHead" id="" class="form-control">
                                                        <option value="">Account Head</option>
                                                        <?php while($accountHdata = $accountQuery->fetch_assoc()){?>
                                                            <option value="<?php echo $accountHdata['id'] ?>"<?php if($transData['people_id']==$accountHdata['id']){ echo "selected";} ?>><?php echo $accountHdata['name'] ?></option>
                                                        
                                                        <?php } ?>
                                                        
                                                    </select>
                                                    
                                                </td>
                                                <td>
                                                    <select name="txnType" id="" class="form-control">
                                                      
                                                        <option value="<?php echo $transData['txn_type'] ?>"><?php echo $transData['txn_type'] ?></option>
                                                        <option value="debit">Debit</option>
                                                        <option value="credit">Credit</option>
                                                        
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Note</th>
                                                <td colspan="3">
                                                <input type="text" name="note" id="note" class="form-control" value="<?php echo $transData['note'] ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><input type="text" name="amount" class="form-control" value="<?php echo $transData['amount'] ?>"></td>
                                                <th>Date</th>
                                                <td>
                                                    <input type="date" class="form-control" name="date" value="<?php echo $transData['date'] ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><input type="submit" class="btn btn-block btn-info"></td>
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