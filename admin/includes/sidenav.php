    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="includes/logout.inc.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
        <?php
      
   require_once 'dbh.inc.php';
    $query = mysqli_query($conn,"SELECT * FROM admin WHERE username='".$_SESSION['adminname']."'");
    while ($row = mysqli_fetch_array($query)) {

       $role = $row['role'];
    }
    if ($role=='Administration') { ?>
         <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <hr class="sidebar-divider my-0 mt-5">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($page == "dashboard" ? "active" : "")?>">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Controls
            </div>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Students Section</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Students:</h6>
                        <a class="collapse-item" href="add-student">Add Student</a>
                        <a class="collapse-item" href="add-bulk-students">Add Bulk Students</a>
                        <a class="collapse-item" href="view-students">View All Students</a>
                        <a class="collapse-item" href="manage-students">Manage Students</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php echo ($page == "transaction-details" ? "active" : "")?>">
                    <a class="nav-link" href="transaction-details">
                        <i class="fas fa-fw fa-university"></i>
                        <span>Transaction Details</span></a>
                </li>
            <li class="nav-item <?php echo ($page == "add-faculty" ? "active" : "")?>">
                <a class="nav-link" href="add-faculty">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Manage Admin/Faculty</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item <?php echo ($page == "fees-structure" ? "active" : "")?>">
                <a class="nav-link" href="fees-structure">
                    <i class="fas fa-fw fa-university"></i>
                    <span>Fees Structure</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item  <?php echo ($page == "profile" ? "active" : "")?>">
                <a class="nav-link" href="profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item  <?php echo ($page == "change-password" ? "active" : "")?>">
                <a class="nav-link" href="change-password">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-fw"></i>
                <span>Logout</span>
                </a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    <?php } elseif ($role=="Staff") { ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <hr class="sidebar-divider my-0 mt-5">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item  <?php echo ($page == "dashboard" ? "active" : "")?>">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Controls
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Students Section</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Students:</h6>
                        <a class="collapse-item" href="add-student">Add Student</a>
                        <a class="collapse-item" href="add-bulk-students">Add Bulk Students</a>
                        <a class="collapse-item" href="view-students">View All Students</a>
                        <a class="collapse-item" href="manage-students">Manage Students</a>
                        <a class="collapse-item" href="transaction-details">View Transaction Details</a>
                    </div>
                </div>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item  <?php echo ($page == "profile" ? "active" : "")?>">
                <a class="nav-link" href="profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            <li class="nav-item  <?php echo ($page == "chane-password" ? "active" : "")?>">
                <a class="nav-link" href="change-password">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-fw"></i>
                <span>Logout</span>
                </a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    <?php  } elseif ($role=="Accountant") { ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <hr class="sidebar-divider my-0 mt-5">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item  <?php echo ($page == "dashboard" ? "active" : "")?>">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Controls
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Students Section</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Students:</h6>
                        <a class="collapse-item" href="view-students">View All Students</a>
                        <a class="collapse-item" href="manage-students">Manage Students</a>
                    </div>
                </div>
            </li>
            <li class="nav-item  <?php echo ($page == "transaction-details" ? "active" : "")?>">
                    <a class="nav-link" href="transaction-details">
                        <i class="fas fa-fw fa-university"></i>
                        <span>View Transaction Details</span></a>
                </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item  <?php echo ($page == "profile" ? "active" : "")?>">
                <a class="nav-link" href="profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            <li class="nav-item  <?php echo ($page == "change-password" ? "active" : "")?>">
                <a class="nav-link" href="change-password">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-fw"></i>
                <span>Logout</span>
                </a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <?php }?>
        
