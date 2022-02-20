 <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light">Accounting Software</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['name'];?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Expense Category
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="expense_category.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Expense Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="expense.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Expense</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="expense_list.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="expense_charts.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense Chart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Account heads
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="insert_account_heads.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Account heads</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="account_heads_list.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Account heads List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Transactions Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="transactions.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaction Add</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="transactionList.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaction List</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="transaction_Chart.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaction Chart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    People Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="people2.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>People Add</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="people_show.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>People List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="people_chart.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>People Chart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Liability Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="liability_form.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liability Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="liability_show.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liability List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="liability_chart.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Liability Chart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Asset Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="asset_form.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asset Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="asset_list.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asset List</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="search_asset.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asset Search</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="asset_chart.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asset Chart</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="asset_dep.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asset Depriciation</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Income Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="income.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Income Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="income_show.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Income List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="income_chart.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Income Chart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Equity Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="equityy.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Equity Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="equity_list.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Equity List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="equity_chart.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Equity Chart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Report 
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="cashBook.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cash Book </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="trial_balance.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Trial Balance</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="equity_report.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Owners Equity</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    User Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="admin.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>