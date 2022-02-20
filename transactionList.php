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
                            <h1 class="m-0"></h1>
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

            
            
            
            ?>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- contents goes here  -->
                          <div class="col-md-12 col-xl-12">
                          
                               
                                
                                <div class="card">
                                <?php 
                                $transData = $db->query("SELECT people.name as peopleName,people.id as peopleID,account_heads.id as aID, account_heads.name as accountHadesName, transactions.note, transactions.txn_type,transactions.amount,transactions.date,transactions.id FROM `transactions` JOIN account_heads on transactions.account_head_id=account_heads.id JOIN people on transactions.people_id= people.id ORDER BY transactions.date DESC");
                                
                                
                                ?>
                                <div class="col-md-12 col-xl-12">
                                    <a href="transactions.php" class="btn btn-success">Add Transaction</a>
                                   <h1>Transactions Table</h1>
                                   <form action="transactionSearch.php" method="POST">
                                       <table class="table table-bordered">
                                           <tr>
                                               <th>Start Date</th>
                                               <td><input type="date" name="startDate" class="form-control"></td>
                                               <th>End Date</th>
                                               <td><input type="date" name="endDate" class="form-control"></td>
                                               <td><input type="submit" class="btn btn-success" value="Search"></td>
                                           </tr>
                                       </table>
                                   </form>
                                        <table class="table table-bordered ">
                                            <thead class="bg-primary" style="text-align: center;">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>People Name</th>
                                                    <th>Account Head</th>
                                                    <th>Note</th>
                                                    <th colspan="2" >Amount</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr class="bg-info">
                                                    <th colspan="4"></th>
                                                    <th>Debit</th>
                                                    <th>Credit</th>
                                                    <th colspan="2"></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
                                              
                                                <?php
                                                $debit =0;
                                                $credit = 0;
                                                $sl = 1; while($trsData =$transData->fetch_assoc()){ ?>
                                                    <tr>
                                                        <td><?php echo $sl++?></td>
                                                        <td><?php echo $trsData['peopleName'] ?></td>
                                                        <td><?php echo $trsData['accountHadesName'] ?></td>
                                                        <td><?php echo $trsData['note'] ?></td>
                                                        <td align="right"><?php if($trsData['txn_type']=='debit'){ echo number_format($trsData['amount'],2); $debit+=$trsData['amount'];} ?></td>
                                                        <td align="right"><?php if($trsData['txn_type']=='credit'){ echo number_format($trsData['amount'],2); $credit+=$trsData['amount'];} ?></td>
                                                        
                                                        <td><?php echo $trsData['date'] ?></td>
                                                        <td>
                                                        <a href="transactionEdit.php?id=<?php echo $trsData['id'] ?>" class="btn btn-info">Edit</a>    
                                                        <a href="transactionDelete.php?id=<?php echo $trsData['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure!!')">Delete</a>    
                                                        
                                                        
                                                        </td>
                                                    </tr>
                                                    
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" style="text-align: right;">Total</td>
                                                    <td><?php echo number_format($debit,2) ?></td>
                                                    <td><?php echo number_format($credit,2) ?></td>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
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