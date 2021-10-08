<?php

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