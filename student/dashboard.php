<?php
session_start();
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['username']) == "") {
  header("Location: index");
} else {
  $page="dashboard";
  include('includes/header.php');
?>

<?php

include('includes/sidenav.php');
?>

<?php
     $eid = $_SESSION['username'];
     $cat = mysqli_query($conn,"SELECT * FROM student WHERE student_id='$eid'");
     while ($row=mysqli_fetch_array($cat)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $category = $row['category'];
        $year = $row['Year'];

     }
     $totalfees = mysqli_query($conn,"SELECT tuition_fees FROM standard_fees WHERE category = '$category' AND year = '$year'");

    
     if (mysqli_num_rows($totalfees) > 0) {
         while ($row=mysqli_fetch_assoc($totalfees)) {
            $tuition_fee = $row['tuition_fees'];
        }  }
        else {
            echo "No Data Found!";
        }

        $query  = "SELECT SUM(amount) AS sum FROM payments WHERE student_id = '$eid';";
                            $query_run = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                    $output = "$row[sum]";
                            }
                            $remainingfees = $tuition_fee - $output;
?>

        <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
        <div id="content">

           <?php include('includes/topnav.php'); ?>
                <!-- Begin Page Content -->
             <div class="container-fluid">

          
<div class="position-fixed top-0 right-0 p-3" style="position: relative; top: 0; right: 0;">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-header">
      <img src="img/headerlogo.ico" style="width: 23px;" class="rounded mr-2" alt="...">
      <strong class="mr-auto text-dark">AEC Pay</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
    Welcome to AEC Pay <?php echo $firstname; ?>
    </div>
  </div>
</div>
                <!-- Page Heading -->
    <!-- <h2>Dashboard</h2> -->
   <div class="heding mb-5"> <h2 class=""><?php echo "Hello,"; echo $firstname; echo " "; echo $lastname;?></h2>

    </div>
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row m-0 no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="
                      text-xs
                      font-weight-bold
                      text-primary text-uppercase
                      mb-1
                    "
                    >
                    College Fees Remaining
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <?php echo "₹ "; echo $remainingfees;?>
                    </div>
                
                </div>
                <div class="col-auto">
                  <i class="fas fa-university fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row m-0 no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="
                      text-xs
                      font-weight-bold
                      text-success text-uppercase
                      mb-1
                    "
                  >
                    Total Fees Paid
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                 
                  <?php 
                       if ($output==0) {
                          echo "₹ 0";
                         }
                         else
                           {
                            echo "₹ ";   echo $output;
                            }?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
               <!-- /.container-fluid -->
        </div>
        </div>
          
            <!-- End of Main Content -->

<?php
 include('includes/scripts.php');
 ?>
 <script>
  $('.toast').toast('show');
</script>
 <?php
 include('includes/footer.php');  
} ?>