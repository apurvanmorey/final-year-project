<?php
session_start();
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

    <div
      class="modal fade" id="updateYear"data-backdrop="static"data-keyboard="false"tabindex="-1"role="dialog"  aria-labelledby=""aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Promote/Demote Student</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="includes/functions.inc.php" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  name="Name"
                  id="name"
                  aria-describedby="emailHelp"
                  value=""
                />
              </div>
              <div class="form-group">
                <label for="updateBranch">Branch</label>
                <select id="updateBranch" name="branch" class="form-control">
                  <option selected>Select Department...</option>
                  <option>Computer Science & Engineering</option>
                  <option>Electronics & Telecommunication</option>
                  <option>Mechanical Engineering</option>
                  <option>Chemical Engineering</option>
                  <option>Information Technology</option>
                </select>
              </div>
              <div class="form-group">
                <label for="year">Year</label>
                <select id="year" name="year_update" class="form-control">
                  <option selected>Select Year...</option>
                  <option>First Year</option>
                  <option>Second Year</option>
                  <option>Third Year</option>
                  <option>Final Year</option>
                </select>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" name="updateYear" class="btn btn-primary">
                  Update
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h2>Manage Students</h2>
      <div class="row justify-content-md-center mt-3">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Search Student</h6>
            </div>
            <div class="container">
              <form action="" method="post">
                <div class="card-body mt-0 row">
                  <div class="form-group col-md-3">
                    <label for="inputState">Department :</label>
                    <select id="inputState" name="dept" class="form-control">
                      <option selected>Select Department...</option>
                      <option>Computer Science & Engineering</option>
                      <option>Electronics & Telecommunication</option>
                      <option>Mechanical Engineering</option>
                      <option>Chemical Engineering</option>
                      <option>Information Technology</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputState">Year :</label>
                    <select id="inputState" name="year" class="form-control">
                      <option selected>Select Year...</option>
                      <option>First Year</option>
                      <option>Second Year</option>
                      <option>Third Year</option>
                      <option>Final Year</option>
                    </select>
                  </div>
                  <div class="mt-4 pb-2">
                    <button
                      type="submit"
                      name="search_by_id"
                      class="home-dlink"
                    >
                      <span
                        ><i class="fas fa-search fa-sm text-white-50"></i>
                        Search</span
                      >
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <!-- Card Body -->
        <div class="card shadow mb-4">
          <?php 
          if (isset($_POST['search_by_id']))
          {
            $department = $_POST['dept'];
            $year = $_POST['year'];
              $query = "SELECT * FROM student WHERE branch = '$department' AND Year = '$year'";
              $query_run = mysqli_query($conn,$query);
              
          ?>
          <div class="card-body m-0">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sr. No</th>
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Branch</th>
                    <th>Year</th>
                    <th>Action</th>
                    <th>Delete</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $i=1;
                    if (mysqli_num_rows($query_run) >0) {
                    while ($row = mysqli_fetch_array($query_run)) { ?>

                  <tr>
                    <td class="text-center">
                      <?php  echo $i; ?>
                    </td>
                    <td>
                      <?php  echo $row['student_id']; ?>
                    </td>
                    <td>
                      <?php  echo $row['firstname']." ".$row['lastname'];  ?>
                    </td>
                    <td>
                      <?php echo $row['branch'] ?>
                    </td>
                    <td>
                      <?php echo $row['Year'] ?>
                    </td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="align-top mt-0 btn btn-secondary"
                        data-toggle="modal"
                        data-target="#updateYear"
                      >
                        <i class="fas fa-edit fa-sm text-gray-300"></i>
                      </button>
                    </td>
                    <td class="text-center">
                      <a href="#" class="btn btn-danger">
                        <span class="text">Delete</span>
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
                  
                  }  ?>
                </tbody>
              </table>
            </div>
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
}
?>
