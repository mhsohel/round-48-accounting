<?php 

include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php 
include('inc/database.php');
$id=$_GET['id'];
$q = "select *  from assets where id='$id'";
$data = $db->query($q);
$m = $data->fetch_assoc();


$account= "select * from account_heads where type='asset'";
$data=$db->query($account);

$p= "select * from people ";
$info=$db->query($p);
//$type_value='';
// for(i=0; i<$m.length; i++){

//     if($id==$m['type']){
//         type_value+=$m['type'].checked;

//     }
// }


?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Update Asset</h1>
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
                    <div class="row card">
                        <!-- contents goes here  -->
                       <form action="update_asset.php" method="post">
                           <input type="hidden" name="id" value="<?php echo $m['txn_id'] ?>">
                           <table class="table table-bordered">
                               <tr>
                                   <th>Title</th>
                                   <td><textarea name="title" id="" cols="35" rows="5"><?php echo $m['title'] ?></textarea></td>
                                   <th>Note</th>
                                   <td><textarea name="note" id="" cols="35" rows="5"><?php echo $m['note'] ?></textarea></td>

                               </tr>
                               <tr>
                                   <th>Amount</th>
                                   <td><input type="text" name="amount" class="form-control" value="<?php echo $m['amount'] ?>"></td>
                                   <th>Date</th>
                                   <td><input type="date" name="date" class="form-control" value="<?php echo $m['date'] ?>"></td>

                               </tr>
                               <tr>
                                   <th>Type</th>
                                   <td>
                                       <input type="radio" name="type" value="current" checked>Current &nbsp &nbsp 
                                       <input type="radio" name="type" value="fixed" id="fix">Fixed &nbsp<span></span>
                                 </td>
                                 <th>Head Name</th>
                                 <td>
                                     <select  name="account_head">
                                         <option value="">Select Heads</option>
                                         <?php
                                         while($m=$data->fetch_assoc()){
                                            
                                             ?>
                                            <option value="<?php echo $m['id'] ?>"><?php echo $m['name'] ?></option>
                                         <?php } ?>
                                     </select>

                                 </td>
                                  

                               </tr>
                               <tr>
                                   
                               <th>People</th>
                                 <td>
                                     <select  name="people_id">
                                         <option value="">Select People</option>
                                         <?php
                                         while($k=$info->fetch_assoc()){
                                             ?>
                                            <option value="<?php echo $k['id'] ?>"><?php echo $k['name'] ?></option>
                                         <?php } ?>
                                     </select>

                                 </td>
                                 <th>Txn Type</th>
                                   <td>
                                       <input type="radio" name="txn_type" value="debit" checked>Debit &nbsp &nbsp 
                                       <input type="radio" name="txn_type" value="credit">Credit
                                 </td>
                               

                               </tr>
                               <tr>
                                   <td></td>
                                   <td colspan="2"><input type="submit" value="Update"  class="btn btn-block btn-success" ></td>
                                   <td></td>
                                   
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

    <!-- my javascript -->
    <script src="jquery link/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on('click','#fix',function(){
                    //console.log('ok')
                     let p="<input type='text' name='Fixed_type'>";
                     $('span').html(p);

                })
            })
        </script>
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







