<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $uid = intval($_GET['addid']);
        $invoiceid = mt_rand(100000000, 999999999);
        $sid = $_POST['sids'];
        for ($i = 0; $i < count($sid); $i++) {
            $svid = $sid[$i];
            $ret = mysqli_query($con, "insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");


            echo '<script>alert("Invoice created successfully. Invoice number is "+"' . $invoiceid . '")</script>';
            echo "<script>window.location.href ='invoices.php'</script>";
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
                    <h1 class="h3 mb-2 text-gray-800">Assign Services</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Assign Services:</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive/hide">
                                <form method="post">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service Name</th>
                                                <th>Service Price</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Service Name</th>
                                                <th>Service Price</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $ret = mysqli_query($con, "select *from  tblservices");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {

                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $cnt; ?>
                                                    </td>
                                                    <td><?php echo $row['ServiceName']; ?></td>
                                                    <td><?php echo $row['Cost']; ?></td>
                                                    <td><input type="checkbox" name="sids[]" value="<?php echo $row['ID']; ?>">
                                                    </td>

                                                </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            } ?>

                                        </tbody>

                                    </table>
                                    <button type="submit" name="submit" class="btn bg-primary text-white btn-user btn-block w-auto">Submit</button>
                                </form>
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