<?php
session_start();
$page="fees-structure";
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['adminname']) == "") {
  header("Location: index");
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
      <div class="card shadow">
        <div class="card-header">
          <!-- Page Heading -->
          <h2 class="m-0">Fees Structure</h2>
        </div>
        <div class="card-body">
          <div class="row mt-1">
            <!-- Exam Fees Form-->
            <div class="modal fade" id="feeStructureExam" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                      Add Exam Fees
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
                  <form action="includes/functions.inc.php" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="Semester">Semester</label>
                        <select
                          id="Semester"
                          name="semester"
                          class="form-control"
                        >
                          <option>Select Semester</option>
                          <option>I</option>
                          <option>II</option>
                          <option>III</option>
                          <option>IV</option>
                          <option>V</option>
                          <option>VI</option>
                          <option>VII</option>
                          <option>VIII</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="branch">Branch</label>
                        <select
                          class="form-control"
                          name="branch"
                          id="branch"
                          required
                        >
                          <option>Select Branch</option>
                          <option>Computer Science & Engineering</option>
                          <option>Electronics & Telecommunication</option>
                          <option>Mechanical Engineering</option>
                          <option>Chemical Engineering</option>
                          <option>Information Technology</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="examFee">Fee Amount</label>
                        <input
                          type="number"
                          name="feeamt"
                          class="form-control"
                          id="examFee"
                          placeholder="Enter Amount"
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
                        name="feeStructureExam"
                        class="btn btn-primary"
                      >
                        Add
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div
              class="modal fade"
              id="feeStructuretuition"
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
                    <h5 class="modal-title" id="">
                      Add Tuition Fees
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
                  <form action="includes/functions.inc.php" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="inputState">Year</label>
                        <select id="inputState" name="year" class="form-control" required >
                          <option>Select Year</option>
                          <option>First Year</option>
                          <option>Second Year</option>
                          <option>Third Year</option>
                          <option>Fourth Year</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" name="category" class="form-control">
                          <option>Select Category</option>
                          <option>OPEN</option>
                          <option>OBC</option>
                          <option>VJNT</option>
                          <option>SC</option>
                          <option>ST</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="stdAmt">Fee Amount</label>
                        <input
                          type="number"
                          class="form-control"
                          name="stdAmt"
                          id="stdAmt"
                          aria-describedby="emailHelp"
                          placeholder="Enter Amount"
                        />
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
                          name="feeStructuretuition"
                          class="btn btn-primary"
                        >
                          Add
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Table -->
            <div class="col-xl-6 col-lg-6">
              <div class="card mb-4">
                <!-- Card Header - Dropdown -->
                <div
                  class="
                    card-header
                    py-3
                    d-flex
                    flex-row
                    align-items-center
                    justify-content-between
                  "
                >
                  <h6 class="m-0 font-weight-bold text-primary">Exam Fees</h6>
                  <button
                    type="button"
                    class="align-top mt-0 btn btn-primary"
                    data-toggle="modal"
                    data-target="#feeStructureExam"
                  >
                    Add Exam Fees
                  </button>
                </div>
                <!-- Card Body -->
                <div class="card-body m-0">
                  <div class="table-responsive">
<?php 
    $query = "SELECT * FROM exam_fees";
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
                          <th>Branch</th>
                          <th>Sem</th>
                          <th>Fees</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>

                      <tbody>
<?php
    if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run))
        {
       ?>
                        <tr>
                          
                          <td>
                            <?php  echo $row['branch']; ?>
                          </td>
                          <td class="text-center">
                            <?php  echo $row['semester']; ?>
                          </td>
                          <td>
                            <?php echo "₹";echo " "; echo $row['feeAmt']; ?>
                          </td>
                          <td>  


                          <form action="edit-fee.php" method="post">
                                <input type="hidden" name = "edit_id" value="<?php  echo $row['exam_id']; ?>" >
                                 <button type= "submit" name= "edit_exam" class ="btn btn-sm btn-warning">EDIT</button>
                              </form>
                            </td>
                          <td>  
                          
                              <form action="includes/functions.inc.php" method="post">
                                <input type="hidden" name= "deleteid" value="<?php echo $row['exam_id'];?>">
                                <button type="submit" name="deletebtn" class ="btn btn-danger btn-sm" >Delete</button>
                                
                              </form>
                              </a>
                            </td>
                           
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
            <div class="col-xl-6 col-lg-6">
              <div class="card mb-4">
                <!-- Card Header - Dropdown -->
                <div
                  class="
                    card-header
                    py-3
                    d-flex
                    flex-row
                    align-items-center
                    justify-content-between
                  "
                >
                  <h6 class="m-0 font-weight-bold text-primary">
                    Tuition Fees
                  </h6>
                  <button
                    type="button"
                    class="align-top mt-0 btn btn-primary"
                    data-toggle="modal"
                    data-target="#feeStructuretuition"
                  >
                    Add Tuition Fees
                  </button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                  <?php 
    $query = "SELECT * FROM standard_fees";
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
                          <th>Category</th>
                          <th>Year</th>
                          <th>Tuition Fees</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run))
            {
       ?>
                         <tr>
                          <td class="text-center"><?php  echo $row['category']; ?></td>
                          <td><?php  echo $row['year']; ?></td>
                          <td><?php echo "₹";echo " "; echo $row['tuition_fees']; ?></td>
                          <td>
                          <form action="edit-fee.php" method="post">
                                <input type="hidden" name = "fees_id" value="<?php  echo $row['fees_id']; ?>" >
                                 <button type= "submit" name= "edit_tuition" class ="btn btn-sm btn-warning">EDIT</button>
                              </form>
                              </td>

                              <td>  
                                <form action="includes/functions.inc.php" method="POST">
                                  <input type="hidden" name= "delete_tuition_id" value=<?php echo $row['fees_id']?>>
                                  <button type="submit" name="delete_tuition_btn" class ="btn btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
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

 