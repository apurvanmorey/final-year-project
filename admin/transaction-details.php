<?php
session_start();
define('PAYMENTS',true);
$page="transaction-details";
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
                    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h2 class="m-0">Transaction Details</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<?php 
    $query = "SELECT * FROM payments";
    $query_run = mysqli_query($conn, $query);
?>
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
              <thead>
      
                <tr>
                  <th>Transaction Id</th>
                  <th>Student Id</th>
                  <th>Student Name</th>
                  <th>Fee Amount</th>
                  <th>Transactipn Date</th>
                  <th>Receipt Number</th>
                  <th>Fee Type</th>
                  <th>Academic Year</th>
                  <th>Download Receipt</th>
                </tr>
              </thead>

              <tbody>
 <?php
  if (mysqli_num_rows($query_run) > 0) {
  while ($row = mysqli_fetch_assoc($query_run))
    {
 ?>
                <tr>
                  <td><?php echo $row['transaction_id']; ?></td>
                  <td><?php echo $row['student_id']; ?></td>
                  <td><?php echo $row['student_name']; ?></td>
                  <td><?php echo "₹ "; echo $row['amount']; ?></td>
                  <td>
                  <?php
                    $original_date = $row['pay_date'];
                    $timestamp = strtotime($original_date);
                    $new_date = date("d-m-Y h:i:s a", $timestamp);
                    echo $new_date;?>  </td>
                  <td><?php echo "aecpay0".$row['p_id'] ?></td>
                  <td><?php echo $row['feeType']; ?></td>
                  <td><?php echo $row['year']; ?></td>
                  <td> <button class="btn btn-primary btn-sm">Download</button> </td>
                </tr>
<?php
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
 