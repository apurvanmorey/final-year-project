<?php
session_start();
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['adminname']) == "") {
  header("Location: /admin");
} else {
include('includes/header.php');
include('includes/sidenav.php');

?>
 
  <div id="content-wrapper" class="d-flex flex-column">
    
    <!-- Main Content -->
    <div id="content">
      
      <?php include('includes/topnav.php'); ?>
      
      <!-- Begin Page Content -->
      <div class="container-fluid">
        
        <!-- Page Heading -->
        
        <?php
  if(isset($_POST['edit_exam']))
  {  $exam_id = $_POST['edit_id'];
    
    $query= "SELECT * FROM exam_fees WHERE exam_id = '$exam_id'";
    $query_run = mysqli_query($conn, $query);
    
    foreach($query_run as $row) 
    {
      
    }
    ?>

<div class="card shadow">
  <div class="card-header">
    <h2 class="m-0">Edit Exam Fee Amount</h2>
  </div>
  <div class="card-body mx-auto col-md-6">
    <form action="includes/functions.inc.php" method="POST">
      
    <input type="hidden" name="edit_exam_id" value="<?php echo  $row['exam_id'];?>">
      
      <div class="form-group">
        <label for="Semester">Semester</label>
        <input class="form-control" type="text" name="edit_semester" value="<?php echo  $row['semester'];?>" disabled>
      </div>
      
      <div class="form-group">
        <label for="branch">Branch</label>
        <input class="form-control" type="text" name="edit_branch" value="<?php echo  $row['branch'];?>" disabled>
      </div>
      <div class="form-group">
        <label for="examFee">Fee Amount</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">₹</div>
          </div>
          <input class="form-control" type="number" name="edit_feeAmt" value="<?php  echo  $row['feeAmt'];?>" >
        </div>
      </div>
        <div class="text-right"> 
        <a href="fees-structure" class="btn btn-danger">CANCEL</a>
        <button type="submit" name="update_exam_btn" class="btn btn-primary">UPDATE</button>
      </div>
      
    </form>
  </div>
  
</div>



<?php
}
?>

<?php
  if(isset($_POST['edit_tuition']))
  {  $fees_id = $_POST['fees_id'];

    $query= "SELECT * FROM standard_fees WHERE fees_id = '$fees_id'";
    $query_run = mysqli_query($conn, $query);

    foreach($query_run as $row) 
    {

  }
?>

<div class="card shadow">
  <div class="card-header">
  <h2 class="m-0">Edit Tuition Fee </h2>
    </div>
    <div class="card-body mx-auto col-md-6">
      
                      <form action="includes/functions.inc.php" method="POST">
                     
                      <input type="hidden" name="edit_tuition_id" value="<?php echo  $row['fees_id'];?>">

                       <div class="form-group">
                        <label for="category">Category</label>
                        <input class="form-control" type="text" name="category" value="<?php echo  $row['category'];?>" disabled>
                      </div>

                      <div class="form-group">
                        <label for="year">Year</label>
                         <input class="form-control" type="text" name="year" value="<?php echo  $row['year'];?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="tuition_fees">Tuition Fees</label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">₹</div>
                        </div>
                          <input class="form-control" type="number" name="edit_tuition_fees" value="<?php  echo  $row['tuition_fees'];?>" >
                        </div>
                      </div>



    <div class="text-right"> 
    <a href="fees-structure" class="btn btn-danger">CANCEL</a>
    <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
    </div>

</form>
    </div>
    
  </div>


<?php
}
?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include('includes/scripts.php');
include('includes/footer.php');  
}?>






