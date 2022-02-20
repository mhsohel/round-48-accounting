<?php 
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
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Expense</li>
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
<?php 
        $inc=$db->query('select * from income');
        $ali=0;
        while($income=$inc->fetch_assoc()){
            $ss=$db->query("select sum(amount) as t_income from income");
            $uu=$ss->fetch_assoc();
            $ali=$ali+$uu['t_income'];
        };
?>

 <?php

        $exp=$db->query('select * from expense');
        $raju=0;
        while($expense=$exp->fetch_assoc()){
            $sss=$db->query("select sum(amount) as t_expense from expense");
            $uuu=$sss->fetch_assoc();
            $ali=$raju+$uuu['t_expense'];
        };
        $profit=$uu['t_income']-$uuu['t_expense'];

?>
<?php
        $capital=0;
        $withdraw=0;
        $cap=$db->query("select sum(equity.amount) as amount ,transactions.txn_type  from equity join transactions on transactions.id=equity.txn_id where txn_type='debit'")->fetch_assoc();

        if(isset($cap['amount'])){
            $capital=$cap['amount'];
        }

        $withd=$db->query("select sum(equity.amount) as amount,transactions.txn_type  from equity join transactions on transactions.id=equity.txn_id where txn_type='credit'")->fetch_assoc();
        if(isset($withd['amount'])){
            $withdraw=$withd['amount'];
        }
?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Owners Equity</h2>
                                <table class="table table-bordered">
                                    
                                    <thead>
                                        <tr class="bg-info">
                                           <th>Details</th>
                                           <th>Sub Total</th>
                                           <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                            <td>Capital</td>
                                            <td align="right"><?php echo number_format($capital,2);  ?></td>
                                            <td rowspan="2" align="right" style="padding-top: 60px;"><?php echo number_format($capital+$profit ,2)?></td>
                                        </tr>
                                        <tr>
                                        <td> 
                                            Net Profit/Loss (income - Expense)
                                        </td>
                                            <td align="right">
                                <?php echo ' ( '.$uu['t_income'].' - '.$uuu['t_expense'].' ) = '.number_format($profit,2); ?>
                                                    
                                                </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2">Withdraw</td>
                                            <td align="right"><?php echo number_format($withdraw,2); ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><strong>Total</strong></td>
                                            <td align="right"><strong><?php echo number_format(($capital+$profit)-$withdraw,2); ?></strong></td>
                                        </tr>
                                    </tbody>
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