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
<div id="content-wrapper">
  <!-- Main Content -->
  <div id="content">
    <?php include('includes/topnav.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Page Heading -->
      <!-- <h2 class="mb-2">Add Faculty</h2> -->

      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        role="dialog"
        aria-labelledby=""
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">
                Add Admin Profile
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/register.inc.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    placeholder="enter username"
                  />
                </div>

                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input
                    type="text"
                    name="fname"
                    class="form-control"
                    id="fname"
                    placeholder="First Name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="mname">Middle Name</label>
                  <input
                    type="text"
                    name="mname"
                    class="form-control"
                    id="mname"
                    placeholder="Middle Name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input
                    type="text"
                    name="lname"
                    class="form-control"
                    id="lname"
                    placeholder="Last Name"
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="phone">Mobile Number</label>
                  <input
                    type="tel"
                    class="form-control"
                    name="phone"
                    id="phone"
                    placeholder="1234567890"
                    minlength="10"
                    maxlength="10"
                    size="10"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    aria-describedby="emailHelp"
                    placeholder="Enter email"
                  />
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control" name="role" id="role" required>
                    <option select>Select Role</option>
                    <option>Administration</option>
                    <option>Staff</option>
                    <option>Accountant</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="dept">Department</label>
                  <select class="form-control" name="dept" id="dept" required>
                    <option selected>Select Branch</option>
                    <option>Administration</option>
                    <option>Accountant</option>
                    <option>Computer Science & Enginering</option>
                    <option>Electronics & Telecommunication</option>
                    <option>Mechanical Engineering</option>
                    <option>Chemical Engineering</option>
                    <option>Information Technology</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    name="password"
                    id="password"
                    placeholder="Enter password"
                  />
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button
                  type="submit"
                  name="registerstaff"
                  class="btn btn-primary"
                >
                  Add
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header form-inline py-3">
          <h6 class="m-2 mb-3 font-weight-bold text-primary">Admin Profiles</h6>

          <button
            type="button"
            class="align-top mt-0 btn btn-primary"
            data-toggle="modal"
            data-target="#staticBackdrop"
          >
            Add Admin profile
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <?php 
    $query = "SELECT * FROM admin WHERE username !='admin'";
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
                  <th>Id</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Role</th>
                  <th>Mobile Number</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $i=1;
            if (mysqli_num_rows($query_run) > 0) {
               while ($row = mysqli_fetch_assoc($query_run)) 
               { ?>
                <tr>
                  <td class="text-center"><?php  echo $i; ?></td>
                  <td><?php echo $row['username'];?></td>
                  <td>
                    <?php  echo $row['firstname']; echo " "; echo $row['middlename']; echo " "; echo $row['lastname']; ?>
                  </td>
                  <td><?php  echo $row['department']; ?></td>
                  <td><?php  echo $row['role']; ?></td>
                  <td><?php  echo $row['phone']; ?></td>
                  <td class="text-center">
                    <a href="#" class="btn btn-warning">
                      <span class="text">Edit</span>
                    </a>
                  </td>
                  <td class="text-center">
                    
                  <form action="includes/functions.inc.php" method="post">
                  <input type="hidden" name = "delete_id" value="<?php  echo $row['ID']; ?>" >
                    <button type="submit" name="delete_faculty" class="btn btn-danger">DELETE</button>
                    
                  </form>
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
    
  <!-- End of Main Content -->
  </div>
  <?php
 include('includes/scripts.php');
 include('includes/footer.php');  
}?>
