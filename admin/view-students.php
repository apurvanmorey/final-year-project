<?php
session_start();
define('PAYMENTS',true);
require_once 'includes/dbh.inc.php';
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
                
<div class="row justify-content-md-center mt-3 ">

<!-- Content Column -->
<div class="col-lg-12 mb-4">

    <!-- Project Card Example -->

            <div class="card">
            <div class="card-header">
                    <h2>View  Students</h2>
</div>
                <div class="card-body">
                            <div class="table-responsive">
<?php 
    $query = "SELECT * FROM student";
    $query_run = mysqli_query($conn, $query);
?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Registration Number</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Mobile Number</th>
                                            <th>Year</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
<?php
$i=1;
if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run))
     {
       ?>
            
                         
                                   <tr>
                                        <td class="text-center"><?php  echo $i; ?>  </td>
                                        <td><?php echo $row['student_id'];  ?>  </td>
                                        <td><?php  echo $row['firstname']; echo " "; echo $row['middlename']; echo " "; echo $row['lastname']; ?>  </td>
                                        <td><?php  echo $row['branch']; ?>  </td>
                                        <td><?php  echo $row['phone']; ?>  </td>
                                        <td><?php  echo $row['Year']; ?>  </td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-danger">
                                        <span class="text">Edit</span>
                                        </a>
                                        </td>
                                        <td class="text-center">
                                        <a href="view-student?" class="btn btn-primary">
                                        <span class="text">View</span>
                                        </a>
                                        </td>
                                        </tr>
<?php
$i++;
   }
}
else {
    echo "No Record Found";
}   

?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
 include('includes/scripts.php');
 include('includes/footer.php');  
}?>
 
