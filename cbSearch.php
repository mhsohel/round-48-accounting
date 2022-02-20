<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include 'inc/database.php';
?>

<style>
    .crr{
        margin-left: -25px;
    }
</style>
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
                                <li class="breadcrumb-item active"></li>
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
                        <?php 
                        $start= $_POST['start'];
                        $end= $_POST['end'];
                        $dr = $db->query("SELECT * FROM `transactions` JOIN account_heads on transactions.account_head_id=account_heads.id WHERE txn_type='debit' AND date BETWEEN '$start' AND '$end'  ORDER by date ASC;");
                        $cr = $db->query("SELECT * FROM `transactions` JOIN account_heads on transactions.account_head_id=account_heads.id WHERE txn_type='credit' AND date BETWEEN '$start' AND '$end'  ORDER by date ASC;");
                        $drAmount = 0;
                        $crAmount = 0;
                        $drDif = 0;
                        $crDif = 0;
                        $balance ='';
                        
                        ?>
                        <!-- contents goes here  -->
                        <div class="col-md-12 col-xl-12">
                          <div class="card">
                                 <div class="col-md-12 col-xl-12">
                                     <h1>Cash Book</h1>
                                     <form action="cbSearch.php" method="post">
                                         <table class="table table-bordered">
                                             <tr>
                                                 <td><input type="date" name="start" class="form-control" value="<?php echo $start ?>"></td>
                                                 <td><input type="date" name="end" class="form-control" value="<?php echo $end ?>"></td>
                                                 <td><input type="submit" class="btn btn-success" value="Search"></td>
                                             </tr>
                                         </table>
                                     </form>
                                 <table class="table" >
                                     <tr>
                                         <td>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4">Dr</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Account Head <br> Note</th>
                                                        <th>Ref</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead> 
                                                <tbody>
                                                    <?php while($dataDr=$dr->fetch_assoc()){ ?>
                                                        <tr>
                                                            <td><?php echo $dataDr['date'] ?></td>
                                                            <td><?php echo $dataDr['name'] ?></td>
                                                            <td></td>
                                                            <td><?php echo $dataDr['amount']; $drAmount+=$dataDr['amount']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    
                                                </tbody>
                                                <!-- <tfoot>
                                                    <tr>
                                                        <td colspan="3" style="text-align:right"> total</td>
                                                        <td><?php echo $drAmount ?>/=</td>
                                                    </tr>
                                                </tfoot> -->
                                            </table>
                                         </td>
                                         <td>
                                           <div class="crr">
                                            <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4" style="text-align:right">Cr</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Account Head <br> Note</th>
                                                            <th>Ref</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($dataCr=$cr->fetch_assoc()){ ?>
                                                            <tr>
                                                                <td><?php echo $dataCr['date'] ?></td>
                                                                <td><?php echo $dataCr['name'] ?></td>
                                                                <td></td>
                                                                <td><?php echo $dataCr['amount']; $crAmount+=$dataCr['amount']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                       
                                                    </tbody>
                                                    
                                                </table>
                                                
                                           </div>
                                        </td>
                                     </tr>
                                     <?php if($drAmount>$crAmount){
                                                                $drDif=$drAmount-$crAmount;
                                                               
                                                            }
                                                            if($drAmount<$crAmount){
                                                                  $crDif=$crAmount-$drAmount;
                                                                  
                                                             } ?>
                                     <tr>
                                         <td><table class="table table-bordered">
                                             <tr>
                                                 <td></td>
                                                 <td>
                                                 <td colspan="2"><?php if($crDif==0){
                                                     echo $balance='';
                                                 }else{
                                                     echo $balanc="Balance c/d";
                                                 }  ?></td>
                                                 </td>
                                                 <td></td>
                                                 <td class="text-right"><?php echo number_format($crDif,2); ?></td>
                                             </tr>
                                         </table></td>
                                         <td><table class="table table-bordered">
                                             <tr>
                                                 <td></td>
                                                 <td colspan="2"><?php  if($drDif==0){
                                                     echo $balance='';
                                                 }else{
                                                     echo $balanc="Balance c/d";
                                                 }  ?></td>
                                                 
                                                 <td class="text-right"><?php echo number_format($drDif,2); ?></td>
                                             </tr>
                                         </table></td>
                                     </tr>
                                    <tr>
                                    <td>
                                    <table class="table table-bordered">
                                                <tr>
                                                        <td></td>
                                                        <td colspan="2 " class="text-right">Total</td>
                                                        
                                                        <td  class="text-right"> <?php 
                                                        
                                                            
                                                            
                                                             if($drAmount>$crAmount){
                                                                echo number_format($drAmount,2);
                                                            }else{
                                                                echo number_format($drAmount+$crDif,2);
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                                
                                                </td>
                                                <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    
                                                       <div class="crr">
                                                           <td></td>
                                                           <td colspan="2 " class="text-right">Total</td>
                                                           
                                                       <td class="text-right"><?php 
                                                        
                                                        if($drAmount<$crAmount){
                                                           echo number_format($crAmount,2);
                                                        }else{
                                                          echo  number_format($crAmount+$drDif,2);

                                                        }
                                                        
                                                        ?></td>
                                                       </tr>
                                                </table>
                                          </td>
                                        </div>
                                    </tr>
                                  
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