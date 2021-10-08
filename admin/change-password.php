<?php
session_start();
error_reporting(0);
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['adminname']) == "") {
  header("Location: /admin");
} else {
include('includes/header.php');
include('includes/sidenav.php');

if(isset($_POST['submit']))
{
    $username=$_SESSION['adminname'];
    echo $username;
    $cpassword=$_POST['currentpassword'];
    $newpassword=$_POST['newpassword'];
    $query=mysqli_query($conn,"SELECT username FROM admin WHERE username='$username' AND password='$cpassword'");
    $row=mysqli_fetch_array($query);
    
    if($row>0){
         $ret=mysqli_query($conn,"UPDATE admin SET password='$newpassword' WHERE username='$username'");
         $_SESSION['status'] = "Your password successully changed";
         $_SESSION['status_code'] = "success";
        } else { 
            $_SESSION['status'] = "Your current password is wrong";
            $_SESSION['status_code'] = "error";
         } 

} ?>

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
        <p style="font-size:16px; color:red" align="center"> 
                    <?php if($msg){echo $msg;}  ?> </p>
        <div class="card-body col-md-6 offset-md-3">
          <!-- form card change password -->
        
            <form name="changepassword" class="user" method="post" onsubmit="return checkpass();">
                 
                <?php
    $ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
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
