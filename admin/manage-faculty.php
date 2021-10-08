<?php
session_start();
include_once 'includes/dbh.inc.php';
if (strlen($_SESSION['adminname']) == "") {
    header("Location: /admin");
  } else {
include('includes/header.php');
include('includes/sidenav.php');
?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

           <?php include('includes/topnav.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
<h2>Manage faculty</h2>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
 include('includes/scripts.php');
 include('includes/footer.php');  
} ?>
 