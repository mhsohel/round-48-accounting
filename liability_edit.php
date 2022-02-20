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
<?php
$aaa=$_GET['id'];
$raw=$db->query("select * from liability where txn_id=$aaa");
$infor=$raw->fetch_assoc();
// print_r($infor);
$raw_txn=$db->query("select * from transactions where id=$aaa");
$infor_txn=$raw_txn->fetch_assoc();

?>
            <!-- Main content -->
            <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title ">Liability CRUD</h3>
                      <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h1>Liability Update Form</h1>
                   <form action="liability_update.php" method="post"> 
                    <table class="table table-boredered">
                        <tr>
                          <input type="hidden" value="<?php echo $infor['txn_id'] ?>" name="txn_id" >
                            
                            <td colspan="2">Title<input type="text" class="form-control" name="title" value="<?php echo $infor['title'] ?>"></td>
                            

                            <td> People Id<select  name="people" class="form-control select2" style="width: 100%;">
                                <option value="">Select People</option>
                                <?php $raw=$db->query('select * from people order by name asc'); while($info=$raw->fetch_assoc()){  ?>
                                  <option value="<?php echo $info['id'] ?>" <?php if($infor['people_id']==$info['id']){ echo 'selected';} ?>><?php echo $info['name'] ?></option>
                                  <?php } ?>
                                    </select></td>
                        </tr>
                        <tr>
                           
                            <td colspan="3">Note<textarea name="note" cols="60" rows="4" class="form-control"><?php echo $infor['note'] ?></textarea></td>
                        </tr>
                        
                        <tr>
                            
                            <td>Amount<input type="text" class="form-control" name="amount" value="<?php echo $infor['amount'] ?>"></td>
                            <td>Date<input type="date" name="date" class="form-control" value="<?php echo $infor['date'] ?>"></td>
                            <td > Accoun Heads<select name="acc_head" class="form-control select2" style="width: 100%;">
                            <option value="">Select Accounts Head</option>
                                <?php $rawraw=$db->query('select * from account_heads where type="liability" order by name asc'); 
                                while($information=$rawraw->fetch_assoc()){  ?>
                                  <option value="<?php echo $information['id'] ?>" <?php if($information['id']==$infor_txn['account_head_id']){ echo "selected";}?>><?php echo $information['name'] ?></option>
                                  <?php } ?>
                                    </select></td>
                        </tr>
                        <tr>
                        <td>Add After <select name="txn_type" id="" class="form-control select2" disabled><option></option value=""></select></td>
                           <td >Transaction Type <select name="type" id="" class="form-control select2"><Option>Select Transaction</Option><option value="debit" <?php if($infor_txn['txn_type']=='debit'){ echo "selected";}?>>Debit</option><option value="credit" <?php if($infor_txn['txn_type']=='credit'){ echo "selected";}?>>Credit</option></select></td> &nbsp &nbsp
                        <td><p>Status</p>  <input type="radio" class="form-check-input" value="active" name="state" <?php if($infor['status']=='active'){ echo 'checked';} ?>>Active &nbsp &nbsp  &nbsp &nbsp <input type="radio" class="form-check-input" value="inactive" name="state" <?php if($infor['status']=='inactive'){ echo 'checked';} ?>>Inactive</td>
                        </tr>
                        <tr>
                          <td ></td>
                          <td><a href="index.php"  class="btn btn-block btn-secondary">Cancel</a></td>
                          <td><input type="submit" class="btn btn-block btn-primary" value="Update" name="update"> </td>
                          </form>
                          
                         <!-- <td colspan="2"><button class="btn btn-block btn-success">Press me</button></td>  -->
                            <!-- <td colspan="2"><a href="" id="button" class="btn btn-block btn-success">Insert</a></td> -->
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
</html>