<?php
session_start();
error_reporting(0);
require_once 'includes/dbh.inc.php';
if ($_SESSION['adminname'] != '') {
    $_SESSION['adminname'] = '';
}
if (isset($_POST['submit']))
{
  $query= mysqli_query($conn,"SELECT * FROM admin WHERE username= '".$_POST['username']."' AND password= '".$_POST['password']."' ");

  if (mysqli_num_rows($query) > 0) {

    $_SESSION['adminname'] = $_POST['username'];
    header('location: dashboard');

  }
  else{

    $msg = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid Details!</strong> Please Try Again..
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/headerlogo.ico">
    <title>AEC Pay - Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="">

<nav class="navbar navbar-dark justify-content-between shadow">           
            <!-- College LOGO -->
         <div class="mx-auto px-4">
            <img class=" logo img-fluid" src="img/logo.png" alt="Anuradha Engineering College">
         </div>
</nav>
    <div class="container">
        <div class="row mt-0 justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 ">
                <div class="card  o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">                    
                    <div class="row mt-0">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <p style="font-size:16px; color:red" align="center"> 
                                        <?php if($msg){echo $msg;}  ?>
                                    </p>
                                    </div>
                                    <form action = "index.php" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                            name = "username"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name = "password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                       
                                       <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name= "submit" value="submit">
                                            Login
                                        </button>
                                        </div>
                                        <hr>
                                    
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>