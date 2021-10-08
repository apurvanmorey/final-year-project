<?php
require_once 'dbh.inc.php';

if( isset($_POST['payment_id']) &&  
    isset($_POST['amt']) && 
    isset($_POST['name']) && 
    isset($_POST['student_id'])
){

    $payment_id = $_POST['payment_id'];
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $amt = $_POST['amt'];
    $payment_status="complete";
    $added_on = date('Y-m-d h:i:s');


    
    mysqli_query($conn,"INSERT INTO payments (student_id,student_name,amount,payment_status,transaction_id,pay_date)VALUES('$student_id','$name','$amt','$payment_status','$payment_id','$added_on')");

}

?>