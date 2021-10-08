<?php
session_start();
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['username']) == "") {
    header("Location: index");
} else {
      $page="tuition-fees";
include('includes/header.php');
include('includes/sidenav.php');

?>

<?php
     $eid = $_SESSION['username'];
     $cat = mysqli_query($conn,"SELECT * FROM student WHERE student_id='$eid'");
     while ($row=mysqli_fetch_array($cat)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $category = $row['category'];
        $year = $row['Year'];

     }

     $totalfees = mysqli_query($conn,"SELECT tuition_fees FROM standard_fees WHERE category = '$category' AND year = '$year'");

    
     if (mysqli_num_rows($totalfees) > 0) {
         while ($row=mysqli_fetch_assoc($totalfees)) {
            $tuition_fee = $row['tuition_fees'];
        }  }
        else {
            echo "No Data Found!";
        }

        $query  = "SELECT SUM(amount) AS sum FROM payments WHERE student_id = '$eid';";
                            $query_run = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                    $output = "$row[sum]";
                            }
                            $remainingfees = $tuition_fee - $output;
     ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

           <?php include('includes/topnav.php'); ?>

                <!-- Begin Page Content -->
<div class="container-fluid">
               
    <div class="card shadow ">
    <div class="card-header">
    <!-- Page Heading -->
        <h2 class="m-0 ">Tuition fees</h2>
    </div>
    <div class="card-body">
    <div class="row mt-1">

<!-- Payment Form-->
<div class="col-xl-6 col-lg-6">
    <div class="card  mb-4">
        <!-- Card Header - Dropdown -->
       
        <!-- Card Body -->
        <div class="card-body">
            <form>
            <div class="form-group">
            <div class="form-group">
                    
                    <input type="text" class="form-control"  value="Tuition Fees" readonly>

                    <input type="hidden" name="student_id" id="student_id"value="<?php echo $eid; ?>">
                    
                    <input type="hidden" name="name" id="name"value="<?php echo $firstname." ".$lastname; ?>">
                  
                </div>

                </div>
                <div class="form-group">
                    <label for="feeAmount">Remaining Fee</label>
                    <input type="text" class="form-control" id="feeAmount" value="<?php echo "₹ "; echo $remainingfees;?>"  disabled>
                  
                </div>
                
                <div class="form-group">
                    <label for="pay_amount">Pay Amount</label>
                    <input type="textbox" class="form-control" name="amt" id="amt" placeholder="Enter amount"/>

                   
                </div>
                <div class="text-right">
                    <!-- <input class="btn btn-outline-primary" type="reset" value="Reset"> -->
            <input type="button" class="btn btn-primary" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />

                </div>
            </form>
        </div>
    </div>
</div>
<!-- Table -->
<div class="col-xl-6 col-lg-6">
        <div class="card">
        <div class="card mb-0">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Fees Break Down</h6>   
            </div>
            <!-- Card Body -->
            <div class="card-body">   
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                            <tr>                                            
                                <th>Alloted Fees</th>
                                <th>Paid</th>
                                <th>Remaining Fees</th>
                                <th>Fee Type</th>
                                <th>Academic Year</th>                                           
                            </tr>
                        </thead>
                                                    
                        <tbody>
                            <tr>
                                <td><?php echo '₹ ';  echo $tuition_fee ?></td>                                       
                                <td><?php 
                                    if ($output==0) {
                                        echo "₹ 0";
                                    }
                                    else
                                    {
                                        echo "₹ ".$output;
                                    }?>
                                </td>                                       
                                <td><?php echo '₹ ';  echo $remainingfees; ?></td>                                       
                                <td>Tuition Fees</td>
                                <td><?php echo $year;?></td>
                            </tr>
                        </tbody>
                      
                    </table>
                </div>
            </div>
        </div>
     
        </div>
        
    </div>
</div>

</div>
    </div>
    </div>
    
 
                <!-- /.container-fluid -->

</div>


            <!-- End of Main Content -->
          
 <script>

function pay_now(){

    var name = jQuery('#name').val();
    var student_id = jQuery('#student_id').val();
    var amt = jQuery('#amt').val();

    var options = {
    "key": "rzp_test_W20BgZPhNAWid3", 
    "amount": amt * 100, 
    "currency": "INR",
    "name": "AEC Pay",
    // "account_id": student_id,
    "description": "Tuition Fees",
    "image": "img/headerlogo.png",
    
    "handler": function (response){

       jQuery.ajax({
        type:'post',
        url:'includes/payment_process.php',
        data:"payment_id =" +response.razorpay_payment_id + "&amt=" +amt+ "&name="+name+ "&student_id"+ student_id,
        success:function(result){
            swal({
                title: "Payment Success!",
                text: "<?php echo 'Hey, ';  echo $firstname; echo ' You have paid your Tuition fees!';?>",
                icon: "success",
                }).then(function(){ 
                location.reload();
                });   
        }

       });
    }
};
        var rzp1 = new Razorpay(options);
        rzp1.open();
}


</script>
<?php
 include('includes/scripts.php');
 include('includes/footer.php');  
}?>
 