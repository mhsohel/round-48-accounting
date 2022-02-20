<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include 'inc/database.php';
$q = "select sum(amount) as total from assets where type='current'";
$data =$db->query($q)->fetch_assoc();
$p = "select sum(amount) as addition from assets where type='fixed'";
$info =$db->query($p)->fetch_assoc();

?>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Asset Chart</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Asset Chart</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

             <!-- chart style -->
             <style>
                 #chartdiv {
                     width: 100%;
                     height: 300px;
                 }
             </style>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card col-md-12">
                        <div id="chartdiv"></div>
                        </div>
                        <br><br>
                        <div class="card col-md-12">
                        <table class="table table-bordered">
                               <thead>
                               <tr>
                                   <th>SL</th>
                                   <th>Type</th>
                                   <th>Total Amount</th>
                                   
                                   

                               </tr>
                               </thead>
                               <tbody>
                         
                         
                               <tr>
                                   <td><?php echo 1 ?></td>
                                  <td><?php echo 'current' ?></td>
                                 <td align="right"><?php echo number_format($data['total'],2);?></td>
                                  
                                  
                                   

                               </tr>
                               <tr>
                                   <td><?php echo 2 ?></td>
                                   <td><?php echo 'fixed' ?></td>
                                   <td align="right"><?php echo number_format($info['addition'],2) ?></td>
                                  
                                </tr>


                              
                            </tbody>
                              
                           </table>

                        </div>
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
            <!-- chart javascript -->
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    endAngle: 270
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "value",
    categoryField: "category",
    endAngle: 270
  })
);

series.states.create("hidden", {
  endAngle: -90
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([{
  category: "current",
  value:<?php if ($data['total']>0){echo $data['total'];}else{echo 0;} {
      // code...
  }; ?>
}, {
  category: "fixed",
  value:<?php echo $info['addition']; ?>
}]);

series.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->


</html>