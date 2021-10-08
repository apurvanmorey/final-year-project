<?php
session_start();

require_once 'dbh.inc.php';

//add exam fee
if (isset($_POST["feeStructureExam"])) {
        
    $semester = $_POST["semester"];
    $branch = $_POST["branch"];
    $feeamt = $_POST["feeamt"];
 
    
    $query = "INSERT INTO exam_fees (semester,branch,feeAmt) VALUES ('$semester','$branch','$feeamt')";
    $query_run = mysqli_query($conn,$query);
    
        if ($query_run) {
           $_SESSION['status'] = "Exam Fee Added Successfully";
           $_SESSION['status_code'] = "success";
           header('Location: ../fees-structure');
           exit();
        }
        else {
            $_SESSION['status'] = "Exam Fee Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: ../fees-structure');
            exit();
        }
}
//add tuition fee
if (isset($_POST["feeStructuretuition"])) {
        
    $category = $_POST["category"];
    $year = $_POST["year"];
    $tuitionFee = $_POST["stdAmt"];
 
    
    $query = "INSERT INTO standard_fees (category,year,tuition_fees) VALUES ('$category','$year','$tuitionFee')";
    $query_run = mysqli_query($conn,$query);
    
        if ($query_run) {
           $_SESSION['status'] = "Tuition Fee Added Successfully";
           $_SESSION['status_code'] = "success";
           header('Location: ../fees-structure');
           exit();
        }
        else {
            $_SESSION['status'] = "Tuition Fee Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: ../fees-structure');
            exit();
        }
        
   
}

//update exam fee
if (isset($_POST['update_exam_btn'])) {

    $exam_id = $_POST['edit_exam_id'];
    $feeAmt = $_POST['edit_feeAmt'];

    $query = "UPDATE exam_fees SET feeAmt='$feeAmt'  WHERE exam_id = '$exam_id'";

    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
    
        $_SESSION['status'] = "Exam Fees updated";
        $_SESSION['status_code'] = "success";
        header('Location: ../fees-structure');


    }
    else{

        $_SESSION['status'] = "Exam Fees not updated";
        $_SESSION['status_code'] = "error";
        header('Location: ../fees-structure');

    }

}

//delete exam fee
if (isset($_POST['deletebtn'])) {

    $exam_id = $_POST['deleteid'];

    $query = "DELETE FROM exam_fees WHERE exam_id = '$exam_id'";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {

        $_SESSION['status'] = "Exam Fees is deleted";
        $_SESSION['status_code'] = "success";
        header('Location: ../fees-structure');
        
        
    }
    else{
        $_SESSION['status'] = "Exam Fees not deleted";
        $_SESSION['status_code'] = "error";
        header('Location: ../fees-structure');

        

    }
}

// edit tuition fee
if (isset($_POST['updatebtn'])) {

    $tuition_id = $_POST['edit_tuition_id'];
    $tuitionFees = $_POST['edit_tuition_fees'];

    $query = "UPDATE standard_fees SET tuition_fees= '$tuitionFees'  WHERE fees_id = '$tuition_id'";

    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
    
        $_SESSION['status'] = "Tuition Fees updated";
        $_SESSION['status_code'] = "success";
        header('Location: ../fees-structure');


    }
    else{

        $_SESSION['status'] = "Tuition Fees not updated";
        $_SESSION['status_code'] = "error";
        header('Location: ../fees-structure');

    }

}




//delete tuition fee
if (isset($_POST['delete_tuition_btn'])) {

    $tuition_id = $_POST['delete_tuition_id'];

    $query = "DELETE FROM standard_fees WHERE fees_id = '$tuition_id'";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {

        $_SESSION['status'] = "Tuition Fees Deleted!";
        $_SESSION['status_code'] = "success";
        header('Location: ../fees-structure');
        
        
    }
    else{
        $_SESSION['status'] = "Tuition Fees Not Deleted!";
        $_SESSION['status_code'] = "error";
        header('Location: ../fees-structure');

        

    }
}
//delete facultydelete_faculty
if (isset($_POST['delete_faculty'])) {

    $faculty_id = $_POST['delete_id'];

    $query = "DELETE FROM admin WHERE ID = '$faculty_id'";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {

        $_SESSION['status'] = "Admin Profile Deleted!";
        $_SESSION['status_code'] = "success";
        header('Location: ../add-faculty');
        
        
    }
    else{
        $_SESSION['status'] = "Admin Profile not Deleted!";
        $_SESSION['status_code'] = "error";
        header('Location: ../add-faculty');

        

    }
}
 
 
 
 


