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
                            <h1 class="m-0">Expense List</h1>
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
                            <form action="expense_search.php" method="POST">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="date" name="start_date" class="form-control"></td>
                                        <td><input type="date" name="end_date" class="form-control"></td>
                                        <td><input type="submit" name="search" value="Search" class="btn btn-primary"></td>
                                    </tr>
                                </table>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <th>SL</th>
                                    <th>People</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                            <?php
                            $expenseSql = "SELECT expense_category.category, people.name, expense.* FROM expense JOIN expense_category ON expense.category_id = expense_category.id JOIN people ON expense.people_id = people.id ORDER BY expense.date DESC";
                            $expenseRes = $db->query($expenseSql);
                            if ($expenseRes) {
                                $sl = 0;
                                while ($expenseData = $expenseRes->fetch_assoc()) {
                                    $sl++;
                            ?>
                            <tr>
                                <td><?php echo $sl;?></td>
                                <td><?php echo $expenseData['name'];?></td>
                                <td><?php echo $expenseData['category'];?></td>
                                <td><?php echo $expenseData['title'];?></td>
                                <td align="right"><?php echo number_format($expenseData['amount'],2);?></td>
                                <td><?php echo $expenseData['note'];?></td>
                                <td><?php echo $expenseData['date'];?></td>
                                <td>
                                    <a href="expense_edit.php?editId=<?php echo $expenseData['id'];?>" class="btn btn-primary">Edit</a>
                                    <a href="expense_delete.php?delId=<?php echo $expenseData['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure delete??')">Delete</a>
                                </td>
                            </tr>
                        <?php  } } ?>
                                </tbody>
                            </table>
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