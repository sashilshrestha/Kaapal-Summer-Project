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
                    <h1 class="h3 mb-2 text-gray-800">Search Invoices:
                    </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 pl-2 font-weight-bold text-primary">Search by: Invoice Number / Customer Name</h6>
                        </div>
                        <div class="card-body">
                            <form action="" class="user" method="post">
                                <div class="form-group mb-4 d-flex">
                                    <input type="text" class="form-control form-control-user w-75" id="searchdata" name="searchdata" value="" required=""><input type="submit" name="search" value="Search" class="btn bg-primary text-white btn-user btn-block w-25 ml-3">
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['search'])) {

                                $sdata = $_POST['searchdata'];
                            ?>
                                <h4 class="my-3 font-weight-bold text-primary">Result against <span class="text-danger">"<?php echo $sdata; ?>"</span> </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-5" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice Id</th>
                                                <th>Customer Name</th>
                                                <th>Invoice Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $ret = mysqli_query($con, "select distinct  tblcustomers.Name,tblinvoice.BillingId,tblinvoice.PostingDate from  tblcustomers   
                                            join tblinvoice on tblcustomers.ID=tblinvoice.Userid  where tblinvoice.BillingId like '%$sdata%' || tblcustomers.Name like '%$sdata%'");
                                            $num = mysqli_num_rows($ret);
                                            if ($num > 0) {
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {

                                            ?>

                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['BillingId']; ?></td>
                                                        <td><?php echo $row['Name']; ?></td>
                                                        <td><?php echo $row['PostingDate']; ?></td>
                                                        <td><a href="view-invoice.php?invoiceid=<?php echo $row['BillingId']; ?>">View</a></td>

                                                    </tr>
                                                <?php
                                                    $cnt = $cnt + 1;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="8"> No record found against this search</td>

                                                </tr>

                                        <?php }
                                        } ?>

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