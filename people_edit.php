 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<?php 
include('inc/database.php');
// $conn=new mysqli('localhost','root','','accounting');
$info="select * from people where id=".$_GET['id'];
$con=$db->query($info);
$result=$con->fetch_assoc();
//print_r($result); 

?>
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
                <div class="container-fluid">
                    <div class="row">
                        <!-- contents goes here  -->
    <form action="people_update.php" method="post">
	<table class="table table-bordered">
		<input type="hidden" name="id" value="<?php echo $result['id'] ?>"
	>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo $result['email'] ?>"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="number" name="phone" value="<?php echo $result['phone'] ?>"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" value="<?php echo $result['address'] ?>"></td>
		</tr>
		<tr>
			<td>Company</td>
			<td><input type="text" name="company" value="<?php echo $result['company'] ?>"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><td>Active<input type="radio" name="status" value="active" 
				></td>
            <td>Inactive<input type="radio" name="status" value="inactive"></td></td>
		</tr>
		<tr>
			<td><input type="submit" name=""></td>
		</tr>
	</table>
</form>
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
