<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include 'inc/database.php';
$q= "select * from account_heads where type='asset'";
$data=$db->query($q);

$p= "select * from people ";
$info=$db->query($p);

?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Asset</h1>
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
                        <div class="card col-md-12">
                       <form action="insert_asset.php" method="post">
                           <table class="table table-bordered">
                               <tr>
                                   <th>Title</th>
                                   <td><textarea name="title" id="" cols="35" rows="5"></textarea></td>
                                   <th>Note</th>
                                   <td><textarea name="note" id="" cols="35" rows="5"></textarea></td>

                               </tr>
                               <tr>
                                   <th>Amount</th>
                                   <td><input type="text" name="amount" class="form-control"></td>
                                   <th>Date</th>
                                   <td><input type="date" name="date" class="form-control"></td>

                               </tr>
                               <tr>
                                   <th>Type</th>
                                   <td>
                                       <input type="radio" name="type" value="current" checked>Current &nbsp &nbsp 
                                       <input type="radio" name="type" value="fixed" id="fix">Fixed &nbsp<span id="fixedBtn"></span>
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
                                   <td colspan="2"><input type="submit" value="Insert"  class="btn btn-block btn-success" ></td>
                                   <td></td>
                                   
                               </tr>
                           </table>
                       </form>
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
     <script>
            $(document).ready(function(){
                $(document).on('click','#fix',function(){
                    //console.log('ok')
                     let p="<input type='text' name='Fixed_type'>";
                     $('#fixedBtn').html(p);

                })
            })
        </script>
  </body>
</html>