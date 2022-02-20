<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include 'inc/database.php';
?>
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Income List</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Income</li>
                            </ol>
                        </div>
<div class="col-md-12">
    
<!-- HTML -->
<div id="chartdiv"></div>

</div>

  <div class="card"> 

<table class="table table-bordered">
    <tr class="bg-primary">
        <td>sl</td>
        <td>title</td>
        <td>note</td>
        <td>people_Name</td>
        <td>amount</td>
        <td>date</td>
        <!-- <td>txn_id</td> -->
        <td>action</td>
    </tr>


<?php
// $show = $db->query('Select * from income');

$show = $db->query('Select income.*,people.name from income join people on income.people_id=people.id');


$E = 0;
while($var = $show->fetch_assoc()){
    ?>

    <tr>
        <td> <?php echo ++$E ?> </td>
        <td> <?php echo $var['title'] ?> </td>
        <td> <?php echo $var['note'] ?> </td>
        <td> <?php echo $var['name'] ?> </td>
        <td align="right"> <?php echo number_format($var['amount'],2) ?> </td>
        <td> <?php echo $var['date'] ?> </td>
        <!-- <td> <?php //echo $var['txn_id'] ?> </td> -->
        
        <td> <a href="income_edit.php?id= <?php echo $var['id'] ?>" class="btn btn-xs btn-success">Edit/Update</a> 
             <a href="income_delete.php?id= <?php echo $var['id'] ?>" class="btn btn-xs btn-danger" onclick='return confirm("Do you really want to delete this row?")'>Delete</a>  </td>
    </tr>
    
<?php } ?>

</table>

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


<!-- Resources -->
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
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  layout: root.verticalLayout
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  valueField: "value",
  categoryField: "category"
}));


// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
    <?php
$show = $db->query('Select * from income');
while($var = $show->fetch_assoc()){
    ?>
    { value: <?php if($var['amount']>0){echo $var['amount'];}else{echo 0;};?>, category: "<?php echo $var['date'];?>" },
<?php } ?>
  
]);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()
</script>


  </body>
</html>