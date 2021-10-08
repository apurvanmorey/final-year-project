<?php
session_start();
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['username']) == "") {
  header("Location: index");
} else {
  $page="fees-history";
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
          <h2 class="m-0">Paid History</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
        

              <thead>
                <tr>
                  <th>Receipt Id</th>
                  <th>Transaction Date</th>
                  <th>Transaction Amount</th>
                  <th>Fee Type</th>
                  <th>Academic Year</th>
                  <th>Download Receipt</th>
                </tr>
              </thead>

              <tbody>
              <?php
        $eid=$_SESSION['username'];
        $ret=mysqli_query($conn,"SELECT * FROM payments WHERE student_id='$eid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
                <tr>
                  <td><?php echo "aecpay00".$row['p_id'] ?></td>
                  <td><?php
                       $original_date = $row['pay_date'];
                       $timestamp = strtotime($original_date);
                       $new_date = date("d-m-Y  h:i:s a", $timestamp);
                       echo $new_date;?> </td>
                  <td><?php echo "₹ "; echo $row['amount'] ?></td>
                  <td><?php echo $row['feeType'] ?></td>
                  <td><?php echo $row['year'] ?></td>
                  <td class="text-center">
                    <a
                      href="#"
                      class="
                        btn btn-sm btn-primary
                        shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                        Download
                    </a>
                  </td>
                </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
  
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->
  </div>
  <?php
 include('includes/scripts.php');
 include('includes/footer.php');  
}?>
