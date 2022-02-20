 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">  -->

<?php
include('inc/database.php');
// $con=new mysqli('localhost','root','','accounting'); 
$infor='select * from account_heads';

$r=$db->query($infor);
?>
<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<style>
#chartdiv {
  width: 100%;
  height: 400px;
}
</style>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"> 
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">People Page</h1>
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
                <div class="container-fluid">
                    <div class="row">
                      <div id="chartdiv"></div>
                      <div class="col-md-12">

                        <!-- contents goes here  -->
    
            <div class='card'>
                <table class='table table-bordered'>
                    <tr class="bg-primary">
                        <th>Head Name</th>
                        <th>Amount</th>
                    </tr> 
                    <?php 
                    $infor_chart='select * from account_heads';
                    $r_chart=$db->query($infor_chart);


                    while ( $a_chart=$r_chart->fetch_assoc()){ 

             $info_ch=  " SELECT sum(amount) as amount FROM `transactions` WHERE account_head_id=".$a_chart['id'];

              
              $i=$db->query($info_ch)->fetch_assoc();


                      ?>

                      <tr>
                      <td><?php echo $a_chart['name'] ?> </td>
                      <td><?php if(isset($i['amount'])){
                        echo $i['amount']; }else{
                          echo 0;}?> </td>
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
series.data.setAll([
 <?php 
        $b=0;
        while ( $a=$r->fetch_assoc()){ 

 $info_chart=  " SELECT sum(amount) as amount FROM `transactions` WHERE account_head_id=".$a['id'];

  
  $i_chart=$db->query($info_chart)->fetch_assoc();


          ?>
   {
          
        category: " <?php echo $a['name'] ?>",
        value:  <?php if($i_chart['amount']>0){echo $i_chart['amount'];}else{echo 0;}  ?>
  },
       
        <?php } ?>
]);

series.appear(1000, 100);

}); // end am5.ready()
</script>



  </body>
</html>
