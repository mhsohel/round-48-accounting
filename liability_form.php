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

<!-- Main content -->
            <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12" >
                <div class="card" >
                  <div class="card-header border-0 bg-primary">
                    <div class="d-flex justify-content-between ">
                      <h3 class="card-title ">Liability CRUD</h3>
                      <a href="liability_chart.php">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h1>Liability Insert Form</h1>
                    <form action="liability_insert.php" method="post">
                    <table class="table table-boredered">
                        <tr>
                            
                            <td colspan="2">Title<input type="text" class="form-control" name="title" placeholder="Enter account title"></td>
                            

                            <td > People Id<select name="people" class="form-control select2" style="width: 100%;">
                                <option value="">Select People</option>
                                <?php $raw=$db->query('select * from people order by name asc'); while($info=$raw->fetch_assoc()){  ?>
                                  <option value="<?php echo $info['id'] ?>"><?php echo $info['name'] ?></option>
                                  <?php } ?>
                                    </select></td>
                        </tr>
                        <tr>
                            
                            <td colspan="3">Note<textarea name="note" cols="60" rows="4" class="form-control"></textarea></td>
                            
                        </tr>
                        
                        <tr>
                           
                            <td>Amount<input type="text" class="form-control" name="amount" placeholder="Enter amount"></td>
                            <td >Date<input type="date" name="date" class="form-control" placeholder="Enter date"></td> &nbsp &nbsp
                           
                            <td > Accoun Heads<select name="acc_head" class="form-control select2" style="width: 100%;">
                            <option value="">Select Accounts Head</option>
                                <?php $rawraw=$db->query('select * from account_heads where type="liability" order by name asc'); while($information=$rawraw->fetch_assoc()){  ?>
                                  <option value="<?php echo $information['id'] ?>"><?php echo $information['name'] ?></option>
                                  <?php } ?>
                                    </select></td>
                          </tr>
                        <tr>
                           
                           <td>Add After <select name="txn_type" id="" class="form-control select2" disabled><option></option value=""></select></td>
                           <td >Transaction Type <select name="type" id="" class="form-control select2"><Option>Select Transaction</Option><option value="debit">Debit</option><option value="credit">Credit</option></select></td> &nbsp &nbsp
                           <td><p>Status</p>  &nbsp &nbsp  &nbsp &nbsp<input type="radio" class="form-check-input" value="active" name="state">Active &nbsp &nbsp  &nbsp &nbsp <input type="radio" class="form-check-input" value="inactive" name="state">Inactive</td>
                          
                       </tr>
                        <tr>
                         
                          <td></td>
                          <td><a href="liability_show.php"  class="btn btn-block btn-secondary">Cancel</a></td>
                          <td><input type="submit" class="btn btn-block btn-primary" value="Save"></a></td>
                          
                         
                        </tr>
                    </table>
                    </form>
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
                     
      <script>
      //   $(document).ready(function(){
      //       $(document).on('click','#button',function(){
      //           let aa=$('#title').val();
      //           let bb=$('#people').val();
      //           let cc=$('#note').val();
      //           let dd=$('#amount').val();
      //           let ee=$('#date').val();
      //           // console.log(aa,bb,cc,dd);
      //           $.ajax({
      //               type:'post',
      //               url: 'liability_insert.php',
      //               data:{
      //                 title: aa,
      //                 people: bb,
      //                 note: cc,
      //                 amount: dd,
      //                 date: ee
      //               },
                    
      //               success: function(arif){
      //                 aa=$('#title').val('');
      //                 bb=$('#people').val('');
      //                 cc=$('#note').val('');
      //                 dd=$('#amount').val('');
      //                 ee=$('#date').val('');
      //                 console.log(arif);
      //               }
      //           });
      //       });
      //   });
      // </script>
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