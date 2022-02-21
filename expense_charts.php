<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<style>
#chartdiv {
  width: 100%;
  height: 300px;
}
</style>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Expense Charts</h1>
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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Category Chart -->
                           <div class="card">
                               <div id="chartdiv"></div>
                           </div>

                           <!-- Category Table -->
                           <div class="card">
                               <table class="table table-bordered">
                                   <tr>
                                       <th>SL</th>
                                       <th>Category</th>
                                       <th>Total</th>
                                   </tr>
                                   <?php 
                                    $sql="SELECT * FROM expense_category";
                                    $sql = $db->query($sql);
                                    $sl=0;
                                    while ($data = $sql->fetch_assoc()) {
                                        $sl++;
                        $expSql = "SELECT sum(amount) as amount FROM expense WHERE category_id=".$data['id'];
                                        $expRes = $db->query($expSql);
                                        $expData = $expRes->fetch_assoc();
                                        ?>
                                        <tr>
                                            <td><?php echo $sl;?></td>
                                            <td><?php echo $data['category'];?></td>
                                            <td align="right"><?php echo number_format($expData['amount'],2);?></td>
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
    <!-- Styles -->

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
        am5.ready(function() {
        var root = am5.Root.new("chartdiv");
        root.setThemes([
          am5themes_Animated.new(root)
        ]);
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
          layout: root.verticalLayout
        }));
        var series = chart.series.push(am5percent.PieSeries.new(root, {
          valueField: "value",
          categoryField: "category"
        }));

        series.data.setAll([
             <?php 
                    $sql="SELECT * FROM expense_category";
                    $sql = $db->query($sql);
                    while ($data = $sql->fetch_assoc()) {
        $expSql = "SELECT sum(amount) as amount FROM expense WHERE category_id=".$data['id'];
                        $expRes = $db->query($expSql);
                        $expData = $expRes->fetch_assoc();
                        ?>
                        { value: <?php if ($expData['amount']>0){echo $expData['amount'];}else{ echo 0;};?>, category: "<?php echo $data['category'];?>" },
                <?php } ?>
        ]);
        series.appear(1000, 100);

        }); 
    </script>
  </body>
</html>