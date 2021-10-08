<?php
session_start();
error_reporting(0);
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['username']) == "") {
  header("Location: index");
} else {
  $page="profile";
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
      <div class="card shadow">
        <div class="card-header">
          <h2 class="m-0">My Profile</h2>
        </div>
        <div class="card-body">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-0 p-0">
            <table class="table">
              <?php
        $eid=$_SESSION['username'];
        $ret=mysqli_query($conn,"select * from student where student_id='$eid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
              <tbody>
                <tr>
                  <td><strong>Full Name :</strong></td>
                  <td>
                    <?php echo $row['firstname']; echo " "; echo $row['middlename']; echo " "; echo $row['lastname'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Mother Name :</strong></td>
                  <td>
                    <?php echo $row['mothername'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Year :</strong></td>
                  <td>
                    <?php echo $row['Year'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Branch :</strong></td>
                  <td>
                    <?php echo $row['branch'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Phone Number :</strong></td>
                  <td>
                    <?php echo '+91-'; echo $row['phone'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Date of Birth :</strong></td>
                  <td>
                    <?php
                                    $original_date = $row['dob'];
                                    $timestamp = strtotime($original_date);
                                    $new_date = date("d-m-Y", $timestamp);
                                    echo $new_date;?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Gender :</strong></td>
                  <td>
                    <?php echo $row['gender'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Category :</strong></td>
                  <td>
                    <?php echo $row['category'];?>
                  </td>
                </tr>
                <tr>
                  <td><strong>Maritial Status :</strong></td>
                  <td>
                    <?php echo $row['marital_status'];?>
                  </td>
                </tr>

                <tr></tr>
                <tr>
                  <td><strong>Email :</strong></td>
                  <td>
                    <a href="mailto:<?php echo $row['email'];?>">
                      <?php echo $row['email'];?>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td><strong>Address :</strong></td>
                  <td>
                    <?php echo $row['address'];?>
                  </td>
                </tr>
              </tbody>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->






    <!-- End of Main Content -->
  </div>

  <?php
 include('includes/scripts.php');
 include('includes/footer.php');  
} 
  ?>