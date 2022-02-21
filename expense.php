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
                            <h1 class="m-0">Expense Page</h1>
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
                            <div class="card">
                                <form action="expense_insert.php" method="POST">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                Category
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                            <?php 
                                $catSql = "SELECT * FROM expense_category ORDER BY category ASC";
                                $catRes = $db->query($catSql);
                                if ($catRes) {
                                    while ($catData = $catRes->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $catData['id'];?>"><?php echo $catData['category'];?></option>
                            <?php } } ?>
                                                </select>
                                            </td>
                                            <td>
                                                People
                                                <select name="people_id" class="form-control">
                                                    <option value="">Select People</option>
                             <?php 
                                $peopleSql = "SELECT * FROM people ORDER BY name ASC";
                                $peopleRes = $db->query($peopleSql);
                                if ($peopleRes) {
                                    while ($peopleData = $peopleRes->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $peopleData['id'];?>"><?php echo $peopleData['name'];?></option>
                            <?php } } ?>
                                                </select>
                                            </td>
                                            <td>
                                                Date
                                                <input type="date" name="date" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Title
                                            <input type="text" name="title" class="form-control" placeholder="Title"></td>
                                            <td>
                                                Amount
                                            <input type="number" name="amount" class="form-control" placeholder="Amount"></td>
                                            <td>
                                                Accounts head
                                                <select name="head_id" class="form-control">
                                                    <option>Select Expense</option>
                                                <?php 
                                                $selectAccHead="SELECT * FROM account_heads WHERE type='expense' ORDER BY name ASC";
                                                $resAccHead = $db->query($selectAccHead);
                                                if ($resAccHead) {
                                                    while ($accHeadData = $resAccHead->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $accHeadData['id'];?>"><?php echo $accHeadData['name'];?></option>
                                                <?php } } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Your Note
                                                <textarea name="note" class="form-control" placeholder="Put your note" rows="5"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row1 -->
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