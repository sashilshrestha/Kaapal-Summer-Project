<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $cid = $_GET['viewid'];
        $remark = $_POST['remark'];
        $status = $_POST['status'];



        $query = mysqli_query($con, "update  tblappointment set Remark='$remark',Status='$status' where ID='$cid'");
        if ($query) {
            $msg = "All remark has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
    }
?>
    <?php include('includes/head.php'); ?>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include('includes/sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include('includes/navigation.php'); ?>

                <!-- -- Added By Me Contents -- -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">View Appoinment</h1>
                    <div class="row">
                        <?php
                        $cid = $_GET['viewid'];
                        $ret = mysqli_query($con, "select * from tblappointment where ID='$cid'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="card col-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="font-weight: 800;">Appointment Number</li>
                                    <li class="list-group-item" style="font-weight: 800;">Name</li>
                                    <li class="list-group-item" style="font-weight: 800;">Email</li>
                                    <li class="list-group-item" style="font-weight: 800;">Mobile Number</li>
                                    <li class="list-group-item" style="font-weight: 800;">Appointment Date</li>
                                    <li class="list-group-item" style="font-weight: 800;">Appointment Time</li>
                                    <li class="list-group-item" style="font-weight: 800;">Services</li>
                                    <li class="list-group-item" style="font-weight: 800;">Apply Date</li>
                                    <li class="list-group-item" style="font-weight: 800;">Status</li>
                                </ul>
                            </div>
                            <div class="card col-9">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $row['AptNumber']; ?></li>
                                    <li class="list-group-item"><?php echo $row['Name']; ?></li>
                                    <li class="list-group-item"><?php echo $row['Email']; ?></li>
                                    <li class="list-group-item"><?php echo $row['PhoneNumber']; ?></li>
                                    <li class="list-group-item"><?php echo $row['AptDate']; ?></li>
                                    <li class="list-group-item"><?php echo $row['AptTime']; ?></li>
                                    <li class="list-group-item"><?php echo $row['Services']; ?></li>
                                    <li class="list-group-item"><?php echo $row['ApplyDate']; ?></li>
                                    <li class="list-group-item"><?php
                                                                if ($row['Status'] == "1") {
                                                                    echo "Selected";
                                                                }
                                                                if ($row['Status'] == "2") {
                                                                    echo "Rejected";
                                                                }; ?></li>

                                </ul>
                            </div>
                            <div class="col-12" style="margin-top: 1rem; padding: 0">
                                <?php if ($row['Remark'] == "") { ?>
                                    <form name="submit" method="post" enctype="multipart/form-data">
                                        <tr>
                                            <th>Remark :</th>
                                            <td>
                                                <textarea name="remark" placeholder="" rows="5" cols="5" class="form-control wd-450" required="true"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Status :</th>
                                            <td>
                                                <select name="status" class="form-control wd-450" required="true">
                                                    <option value="1" selected="true">Selected</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr align="center">
                                            <td colspan="2"><button type="submit" name="submit" class="btn bg-primary text-white btn-user btn-block mt-5">Submit</button></td>

                                        </tr>
                                    </form>
                                <?php } else { ?>
                                    <div class="row" style="padding: 0 15px;">
                                        <div class="card col-3">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="font-weight: 800;">Appointment Number</li>
                                                <li class="list-group-item" style="font-weight: 800;">Name</li>
                                            </ul>
                                        </div>
                                        <div class="card col-9">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><?php echo $row['Remark']; ?></li>
                                                <li class="list-group-item"><?php echo $row['RemarkDate']; ?> </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php
                        }
                        ?>
                    </div>


                </div>
                <!-- -- Added By Me Contents -- -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?php include('includes/footer.php'); ?>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
<?php }  ?>