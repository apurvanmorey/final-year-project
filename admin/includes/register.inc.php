<?php
session_start();

require_once 'dbh.inc.php';

if (isset($_POST["registerbtn"])) {
        
    $student_id = $_POST["adm_id"];
    $year = $_POST["year"];
    $firstname = $_POST["fname"];
    $middlename = $_POST["mname"];
    $lastname = $_POST["lname"];
    $mothername = $_POST["mothername"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $mobileno = $_POST["phone"];
    $marstatus = $_POST["marstatus"];
    $branch = $_POST["branch"];
    $admyear = $_POST["admyear"];
    $email = $_POST["email"];
    $category = $_POST["category"];
    $admcategory = $_POST["admcategory"];
 
    
    $query = "INSERT INTO student (student_id,year,firstname,middlename,lastname,mothername,gender,dob,year_study,branch,phone,marital_status,email,category,adm_category,password) VALUES ('$student_id','$year','$firstname','$middlename','$lastname','$mothername','$gender','$dob','$admyear','$branch','$mobileno','$marstatus','$email','$category','$admcategory','$mothername')";
    $query_run = mysqli_query($conn,$query);
    
        if ($query_run) {
        //    echo "Saved";
           $_SESSION['status'] = "Student Profile Added";
           $_SESSION['status_code'] = "success";
           header('Location: ../add-student');
           exit();
        }
        else {
            $_SESSION['status'] = "Student Profile Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: ../add-student');
            exit();
        }
        
   
}


if (isset($_POST["registerstaff"])) {
        
    $username = $_POST["username"];
    $firstname = $_POST["fname"];
    $middlename = $_POST["mname"];
    $lastname = $_POST["lname"];
    $mobileno = $_POST["phone"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $department = $_POST["dept"];
    $password = $_POST["password"];
    

        $query = "INSERT INTO admin (username,firstname,middlename,lastname,phone,email,password,role,department) VALUES ('$username','$firstname','$middlename','$lastname','$mobileno','$email','$password','$role','$department')";
        $query_run = mysqli_query($conn, $query);
    
        if ($query_run) {
        //    echo "Saved";
           $_SESSION['status'] = "Staff Profile Added";
           $_SESSION['status_code'] = "success";
           header('Location: ../add-faculty');
           exit();
        }
        else {
            $_SESSION['status'] = "Staff Profile Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: ../add-faculty');
            exit();
        }
   
}