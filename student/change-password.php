<?php
session_start();
error_reporting(0);
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['username']) == "") {
  header("Location: index");
} else {
  $page="change-password";
include('includes/header.php');
?>
  <script type="text/javascript">
  function checkpass() {
    if (
      document.changepassword.newpassword.value !=
      document.changepassword.confirmpassword.value
    ) {
        swal("Nope!", "New Password and Confirm Password field does not match", "success");
      document.changepassword.confirmpassword();
      return false;
    }
    return true;
  }
</script>
<?php
include('includes/sidenav.php');

if(isset($_POST['submit']))
{
    $username=$_SESSION['username'];
    $cpassword=$_POST['currentpassword'];
    $newpassword=$_POST['newpassword'];
    $query=mysqli_query($conn,"SELECT student_id FROM student WHERE student_id='$username' AND password='$cpassword'");
    $row=mysqli_fetch_array($query);
    
    if($row>0){
         $ret=mysqli_query($conn,"UPDATE student SET password='$newpassword' WHERE student_id='$username'");
         $_SESSION['status'] = "Your password successully changed";
         $_SESSION['status_code'] = "success";
        } else { 
            $_SESSION['status'] = "Your current password is wrong";
            $_SESSION['status_code'] = "error";
         } 

} ?>



<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <?php include('includes/topnav.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h2></h2>
      <div class="card shadow">
        <div class="card-header">
          <h5>Change Paasword</h5>
        </div>
       
        <div class="card-body col-md-6 offset-md-3">
          <span class="anchor" id="formChangePassword"></span>
          <!-- form card change password -->
          <div class="card card-outline-secondary">
            <div class="card-body">
            <form name="changepassword" class="user" method="post" onsubmit="return checkpass();">
                 
                <?php
    $cid=$_SESSION['username'];
    $ret=mysqli_query($conn,"SELECT * FROM student WHERE student_id='$cid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="form-group">
                  <label for="inputPasswordOld">Current Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="inputPasswordOld"
                    name="currentpassword"
                    required="true"
                  />
                </div>
                <div class="form-group">
                  <label for="inputPasswordNew">New Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="newpassword"
                    id="inputPasswordNew"
                    required="true"
                  />
                  <span class="form-text small text-muted">
                    The password must be 8-20 characters, and must
                    <em>not</em> contain spaces.
                  </span>
                </div>
<?php } ?>
<div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Change" class="btn btn-primary btn-user btn-block">
                    </div>
              </form>
            </div>
          </div>
          <!-- /form card change password -->
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

