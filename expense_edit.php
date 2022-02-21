<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php 
if (isset($_GET['editId'])) {
    $editId = $_GET['editId'];
}
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Expense Update Page</h1>
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
            <?php 
                if (isset($_POST['update'])) {
                    $txn_id = $_POST['txn_id'];
                    $delTranSql = "DELETE FROM transactions WHERE id=$txn_id";
                    $db->query($delTranSql);
                    $category_id = $_POST['category_id'];
                    $people_id = $_POST['people_id'];
                    $date = $_POST['date'];
                    $title = $_POST['title'];
                    $amount = $_POST['amount'];
                    $head_id = $_POST['head_id'];
                    $note = $_POST['note'];

                    $insertTransectionSql = "INSERT INTO transactions(account_head_id,note,txn_type,people_id,amount,date) VALUES($head_id,'$note','credit',$people_id,$amount,'$date')";
                    $db->query($insertTransectionSql);
                    $txn_id=$db->insert_id;

                    $insertExpensSql = "INSERT INTO expense(category_id,title,note,people_id,amount,date,txn_id) VALUES($category_id,'$title','$note',$people_id,$amount,'$date',$txn_id)";
                    $insertRes = $db->query($insertExpensSql);
                    if($insertRes) {
                        echo "<script>window.location='expense_list.php'</script>";
                    }
                }
            ?>
             <?php
                $expenseShowSql = "SELECT * FROM expense WHERE id=$editId";
                $expenseShowRes = $db->query($expenseShowSql);
                if ($expenseShowRes) {
                    while ($expenseShowData = $expenseShowRes->fetch_assoc()) {
                        $txn_id = $expenseShowData['txn_id'];
                        $acc_headSql = "SELECT transactions.account_head_id  FROM transactions WHERE id=$txn_id";
                        $acc_headRes = $db->query($acc_headSql);
                        $acc_headData = $acc_headRes->fetch_assoc();
                        $acc_headId = $acc_headData['account_head_id'];

                ?>
                            <form action="" method="POST">
                                <table class="table table-bordered">
                                    <tr>
                                        <input type="hidden" value="<?php echo $expenseShowData['txn_id'];?>" name="txn_id">
                                        <td>
                                            Category
                                            <select name="category_id" class="form-control">
                                            <option value="">Select Category</option>
                        <?php 
                            $catSql = "SELECT * FROM expense_category ORDER BY category ASC";
                            $catRes = $db->query($catSql);
                            if ($catRes) {
                                while ($catData = $catRes->fetch_assoc()) {
                                    $catSelected='';
                                    if ($catData['id']==$expenseShowData['category_id']) {
                                        $catSelected='selected';
                                    }
                        ?>
                        <option <?php echo $catSelected;?> value="<?php echo $catData['id'];?>"><?php echo $catData['category'];?></option>
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
                                     $peopleSelected='';
                                    if ($peopleData['id']==$expenseShowData['people_id']) {
                                        $peopleSelected='selected';
                                    }
                        ?>
                        <option <?php echo $peopleSelected;?> value="<?php echo $peopleData['id'];?>"><?php echo $peopleData['name'];?></option>
                        <?php } } ?>
                                            </select>
                                        </td>
                                        <td>
                                        Date
                                            <input type="date" value="<?php echo $expenseShowData['date'];?>" name="date" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Title
                                        <input type="text" value="<?php echo $expenseShowData['title'];?>" name="title" class="form-control" placeholder="Title">
                                        </td>
                                        <td>
                                            Amount
                                        <input type="number" value="<?php echo $expenseShowData['amount'];?>" name="amount" class="form-control" placeholder="Amount">
                                        </td>
                                        <td>
                                                Accounts head
                                                <select name="head_id" class="form-control">
                                                    <option>Select Expense</option>
                                                <?php 
                                                $selectAccHead="SELECT * FROM account_heads WHERE type='expense' ORDER BY name ASC";
                                                $resAccHead = $db->query($selectAccHead);
                                                if ($resAccHead) {
                                                    while ($accHeadData = $resAccHead->fetch_assoc()) {
                                                        $headSelected = '';
                                                        if ($accHeadData['id']==$acc_headId) {
                                                            $headSelected='selected';

                                                        }
                                                ?>
                                                <option <?php echo $headSelected;?> value="<?php echo $accHeadData['id'];?>"><?php echo $accHeadData['name'];?></option>
                                                <?php } } ?>
                                                </select>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Your Note
                    <textarea name="note" class="form-control" placeholder="Put your note" rows="5"> <?php echo $expenseShowData['note'];?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary btn-block">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                <?php } } ?>
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