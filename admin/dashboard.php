<?php
session_start();
$page="dashboard";
require_once('includes/dbh.inc.php');
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
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0">Dashboard</h1>
      </div>
      <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row m-0 no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="
                      text-xs
                      font-weight-bold
                      text-primary text-uppercase
                      mb-1
                    ">
                      Total Students
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                    $query  = "SELECT id FROM student ORDER BY id";
                    $query_run = mysqli_query($conn,$query);
                    $row = mysqli_num_rows($query_run);
                    echo $row;
                    
                    ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
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
                    <div class="
                      text-xs
                      font-weight-bold
                      text-success text-uppercase
                      mb-1
                    ">
                      Fee Collected
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                    $query  = "SELECT SUM(amount) AS sum FROM payments";
                    $query_run = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                            $output = "$row[sum]";
                            if ($output==0) {
                                echo "₹ 0";
                            }
                            else
                             {
                                echo "₹ ";   echo $output;
                            }
                    }
                    ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row m-0 no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="
                      text-xs
                      font-weight-bold
                      text-success text-uppercase
                      mb-1
                    ">
                      Total Admin 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php 
                    $query  = "SELECT id FROM admin ORDER BY id";
                    $query_run = mysqli_query($conn,$query);
                    $row = mysqli_num_rows($query_run);
                    echo $row;
                    
                    ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>


          
        </div>
      <div class="row  mt-3">
        <!-- Content Column -->
        <div class="col-lg-12 mb-">
          <!-- Project Card Example -->
          <div class="card shadow mb">
            <div class="card-header
                    py-3
                    d-flex
                    flex-row
                    align-items-center
                    justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Search Student</h6>
            </div>
            <div class="container justify-content-center">
            <center>   <div class="alert alert-primary mt-2 col-md-6" role="alert"> <strong> Note:</strong> Select any <strong>ONE</strong> of
                the field above to search </div></center>
              <form action="" method="post">
                <div class="card-body mt-0 row ">
                  <div class="form-group col-md-3">
                    <label for="inputState">Registration Number :</label>
                    <input type="search" class="form-control" name="username" placeholder="Enter Registration Number" />
                  </div>

                  <div class="form-group col-md-3">
                    <label for="inputState">Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" />
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputState">Lastname:</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" />
                  </div>
                  <div class="mt-4 pb-2">
                    <button type="submit" name="search_by_id" class="home-dlink">
                      <span><i class="fas fa-search fa-sm text-white-50"></i>
                        Search</span>
                    </button>
                  </div>
              </form>

            </div>
          </div>
          <hr class="m-0" />
          <div class="">
            <div class="card-body">
              <div class="table-responsive">
                <?php 
if (isset($_POST['search_by_id']))
 {
  $username = $_POST['username'];
  $firstname = $_POST['name'];
  $lastname = $_POST['lastname'];
  // $year = $_POST['year'];
    $query = "SELECT * FROM student WHERE student_id = '$username' OR firstname = '$firstname'OR lastname = '$lastname'";
    $query_run = mysqli_query($conn,$query);
?>


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr .No</th>
                      <th>Registration Number</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Year</th>
                      <th>View</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $i=1;
    if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_array($query_run))
        {
       ?>
                    <tr>
                      <td class="text-center">
                        <?php  echo $i; ?>
                      </td>
                      <td>
                        <?php  echo $row['student_id']; ?>
                      </td>
                      <td>
                        <?php  echo $row['firstname']." ".$row['middlename']." ".$row['lastname'];  ?>
                      </td>
                      <td>
                        <?php echo $row['branch'] ?>
                      </td>
                      <td>Final Year</td>
                      <td class="text-center">
                        <a href="student-info?<?php echo "id=".$row['id']; ?>" class="btn btn-info">
                          <span class="text">View</span>
                        </a>
                      </td>
                    </tr>

                    <?php
                      $i++;
   }
  }
  else {
    $_SESSION['status'] = "No Data Found!";
    $_SESSION['status_code'] = "warning";
  }
}
else {
 
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
    </div>
  </div>
</div>
<!-- End of Main Content -->
<?php
 include('includes/scripts.php');
 include('includes/footer.php');  
}
?>