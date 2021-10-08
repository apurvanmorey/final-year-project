<?php
session_start();
require_once 'includes/dbh.inc.php';
if (strlen($_SESSION['adminname']) == "") {
    header("Location: /admin");
} else {
    include('includes/header.php');
    include('includes/sidenav.php');
?>

    <?php

    $query = "SELECT student_id FROM student ORDER BY student_id DESC";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['student_id'];
    $year = date("y");
    if (!empty($lastid)) {
        $idd = str_replace("1832", "", $lastid);
        $id = str_pad($idd + 1, 4, 0, STR_PAD_LEFT);
        $number = '1832' . $id;
    } else {
        $number = '1832' . $year . '00001';
    }

    ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php include('includes/topnav.php'); ?>
            <!-- Begin Page Content -->

            <div class=" card container py-3 px-4 rounded shadow ">
                <!-- Page Heading -->
                <h3 class="mb-2 ">Add Student</h3>
                <form action="includes/register.inc.php" method="POST">
                    <hr>
                    <div class="form-row form-inline p-0 mb-3">
                        <div class="form-group col-md-4 mb-2">
                            <label for="adm_id" class="list-inline-item">Admission ID</label>
                            <input type="text" name="adm_id" class="form-control mb-2 mr-sm-2" id="adm_id" value="<?php echo $number; ?>" required readonly>
                        </div>
                        <div class="form-group col-md-6 p-o">
                            <label for="year" class="list-inline-item">Year</label>
                            <select class="form-control mb-2 mr-sm-2" name="year" id="year" required>
                                <option selected>First Year</option>
                                <option>Second Year</option>
                                <option>Third Year</option>
                                <option>Final Year</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="mothername">Mother Name</label>
                            <input type="text" name="mothername" class="form-control" id="lname" placeholder="Mother Name" required>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option selected>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="marstatus">Marital Status</label>
                            <select class="form-control" name="marstatus" id="marstatus" required>
                                <option selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone">Mobile Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="1234567890" minlength="10" maxlength="10" size="10" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">Email id</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="branch">Branch</label>
                            <select class="form-control" name="branch" id="branch" required>
                                <option selected>Select Branch</option>
                                <option>Computer Science & Engineering</option>
                                <option>Electronics & Telecommunication</option>
                                <option>Mechanical Engineering</option>
                                <option>Chemical Engineering</option>
                                <option>Information Technology</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admyear">Admission Year</label>
                            <select class="form-control" name="admyear" id="admyear" required>
                                <option selected>Select Year</option>
                                <option>2020-2021</option>
                                <option>2021-2022</option>
                                <option>2022-2023</option>
                                <option>2023-2024</option>
                                <option>2024-2025</option>
                                <option>2025-2026</option>
                                <option>2026-2027</option>
                                <option>2027-2028</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option selected>Select Category</option>
                                <option>OPEN</option>
                                <option>OBC</option>
                                <option>VJNT</option>
                                <option>SC</option>
                                <option>ST</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admcategory">Admission Category</label>
                            <select class="form-control" name="admcategory" id="admcategory" required>
                                <option selected>Select Admission Category</option>
                                <option>TFWS</option>
                                <option>OPEN</option>
                                <option>OBC</option>
                                <option>VJNT/SBC</option>
                                <option>SC/ST</option>
                            </select>
                        </div>
                        <!-- <div class="form-group col-md-4">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                     </div>
                    <div class="form-group col-md-4">
                        <label for="cpwd"> Confirm Password</label>
                        <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm Password">
                     </div> -->

                        <!-- <div class="form-group col-md-4">
                        <label for="pwd">Password</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" aria-describedby="pwdhelper" placeholder="Password" readonly required>
                        <small id="pwdhelper" class="form-text text-muted">Same as Admission Id</small>
                    </div> -->
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" name="registerbtn" class="home-dlink"><span> <i class="fas fa-plus fa-sm text-white-50"></i> Add Student</span></button>
                    </div>
                </form>


                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
<?php
    include('includes/scripts.php');
    include('includes/footer.php');
} ?>