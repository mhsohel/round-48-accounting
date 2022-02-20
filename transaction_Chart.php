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
           <!-- Chart Code -->
           <!-- Styles -->
          


<!-- Chart code -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
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
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  scrollbarX: am5.Scrollbar.new(root, { orientation: "horizontal" }),
  scrollbarY: am5.Scrollbar.new(root, { orientation: "vertical" })
}));

chart.get("colors").set("step", 3);


// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, {
  minGridDistance: 15
});

xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: 0
});

xRenderer.grid.template.setAll({
  location: 0.5,
  strokeDasharray: [1, 3]
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "category",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  categoryXField: "category",
  adjustBulletPosition: false,
  tooltip: am5.Tooltip.new(root, {
    labelText: "{valueY}"
  })
}));
series.columns.template.setAll({
  width: 0.5
});

series.bullets.push(function() {
  return am5.Bullet.new(root, {
    locationY: 1,
    sprite: am5.Circle.new(root, {
      radius: 5,
      fill: series.get("fill")
    })
  })
})


// Set data

 var data = [
<?php 
    $sl =0;
    $account = $db->query("SELECT * FROM account_heads");
    
    
    while($headData = $account->fetch_assoc()){
        $tran = $db->query("SELECT sum(amount) as amount FROM transactions WHERE account_head_id=". $headData['id']);

        $trans = $tran->fetch_assoc();
        ?>
{ category: "<?php echo $headData['name']; ?>", value:<?php if($trans['amount']>0){echo $trans['amount'];}else{ echo 0;} ?> },
<?php } ?>
 ]

// for (var i = 0; i < names.length; i++) {
//   value += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
//   data.push({ category: names[i], value: value });
// }

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- contents goes here  -->
                          <div class="col-md-12 col-xl-12">
                          <div class="card">
                          <div id="chartdiv"></div> 
                         
                                 
                                 
                            <div>
                                <table class="table table-bordered">
                                    
                                    <thead class="bg-success">
                                        <tr>
                                            <th>SL</th>
                                            
                                            <th>Account Head</th>
                                            <th>Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sl =0;
                                        $account = $db->query("SELECT * FROM account_heads");
                                        
                                        
                                        while($headData = $account->fetch_assoc()){
                                            $tran = $db->query("SELECT sum(amount) as amount FROM transactions WHERE account_head_id=". $headData['id']);

                                            $trans = $tran->fetch_assoc();
                                            ?>
                                        <tr>
                                            <td><?php echo ++$sl ?></td>
                                            
                                            <td><?php echo $headData['name'] ?></td>
                                            <td align="right"><?php echo number_format($trans['amount'],2) ?></td>
                                           
                                            
                                           
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <!-- <tfoot class="bg-info">
                                        <tr>
                                            <td colspan="3" style="text-align: right;">Total</td>
                                            <td><?php //echo $total ?></td>
                                            <td></td>
                                        </tr>
                                    </tfoot> -->
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