<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
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
                    <h1 class="h3 mb-2 text-gray-800">Accepted Appointment
                    </h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Accepted Appoinments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Appointment Number</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Appointment Number</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $ret = mysqli_query($con, "select *from  tblappointment where Status='1'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td><?php echo $row['AptNumber']; ?></td>
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><?php echo $row['PhoneNumber']; ?></td>
                                                <td><?php echo $row['AptDate']; ?></td>
                                                <td><?php echo $row['AptTime']; ?></td>
                                                <td><a class="pr-2" href="view-appoinment.php?viewid=<?php echo $row['ID']; ?>">View</a>|<a href="delete-appointment.php?deleteid=<?php echo $row['ID']; ?>" class="text-danger"><i class="fas fa-trash pl-2"></i></a></td>

                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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