<?php
session_start();
error_reporting(0);
 $page="exam-fees";
 require_once 'includes/dbh.inc.php';
 if (strlen($_SESSION['username']) == "") {
    header("Location: index");
  } else {
include('includes/header.php');
include('includes/sidenav.php');
?>
<?php 
  $eid = $_SESSION['username'];
  $cat = mysqli_query($conn,"SELECT * FROM student WHERE student_id='$eid'");
  while ($row=mysqli_fetch_array($cat)) {
     $year = $row['Year'];
     $branch = $row['branch'];

  }
    $semester = mysqli_query($conn, "SELECT semester FROM exam_fees WHERE year = '$year' AND branch = '$branch'");

    $fees = array();
    $sem = array();

    if(mysqli_num_rows($semester) > 0)
        while ($row=mysqli_fetch_assoc($semester)) {
        $fees[] = $row;
    }

            foreach ($fees as $exam_fee) {
                $sem[]= $exam_fee['semester'];
            }   
            $optionOne = $sem[0];
            $optionTwo = $sem[1];
?>

<?php  ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

           <?php include('includes/topnav.php'); ?>

                <!-- Begin Page Content -->
<div class="container-fluid">                   
    <div class="card shadow ">
    <div class="card-header">
    <!-- Page Heading -->
        <h2 class="m-0 ">Exam fees</h2>
    </div>
    <div class="card-body">
    <div class="row mt-1">

<!-- Payment Form-->
<div class="col-xl-6 col-lg-6">
    <div class="card  mb-4">
        <!-- Card Header - Dropdown -->
       
        <!-- Card Body -->
        <div class="card-body">
            <form>
            <div class="form-group">
            <div class="form-group"> 
                <input type="text" name="type" class="form-control" id="" value="Exam Fees" disabled>  
            </div>
            <div class="form-group">
            <label for="semester">Semester</label>
                    <select id="semester" name="semester" class="form-control">
                        <option selected>Select Semester</option>
                        <option><?php echo $optionOne; ?></option>
                        <option><?php echo $optionTwo; ?></option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="feeAmount">Fee Amount</label>
                    <input type="text" name="amt" class="form-control" id="feeAmount"  placeholder="Enter Amount" >
                  
                </div>
                
                
                <div class="text-right">
                    <!-- <input class="btn btn-outline-primary" type="reset" value="Reset"> -->
                    <button type="submit" class="btn btn-primary">Pay Now <i class="fas fa-chevron-right fa-sm text-white-50"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Table -->
<div class="col-xl-6 col-lg-6">
        <div class="card">
        <div class="card mb-0">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Exam Fees Applicable</h6>   
            </div>
            <!-- Card Body -->
            <div class="card-body">   
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <?php 
    $query = "SELECT * FROM exam_fees WHERE year = '$year' AND branch = '$branch'";
    $query_run = mysqli_query($conn, $query);
?>
                    <thead>
                            <tr>                                            
                                <th>Semester</th>
                                <th>Year</th>
                                <th>Applicable Fees</th>                                          
                            </tr>
                        </thead>
                                                    
                        <tbody>
                        <?php
    if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run))
        {
       ?>
                            <tr class="text-center">
                                <td><?php echo $row['semester']; ?></sup></td>                                       
                                <td><?php echo $row['year'];?></td>                                       
                                <td><?php echo "₹ ".$row['feeAmt']; ?></td>                                       
                            </tr>
                        </tbody>
                        <?php } } 
                        else {
                            echo "No Record Found";
                        }   ?>
                    </table>
                </div>
            </div>
        </div>
       
       
    </div>
</div>

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
 