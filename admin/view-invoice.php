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
                <div class="container-fluid" id="exampl">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Invoice Details</h1>
                    <div class="row">
                        <?php
                        $invid = intval($_GET['invoiceid']);
                        $ret = mysqli_query($con, "select DISTINCT  tblinvoice.PostingDate,tblcustomers.Name,tblcustomers.Email,tblcustomers.MobileNumber,tblcustomers.Gender
                        from  tblinvoice 
                        join tblcustomers on tblcustomers.ID=tblinvoice.Userid 
                        where tblinvoice.BillingId='$invid'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>

                            <div class="card col-12 p-0 mb-3">
                                <div class="card-header py-3 col-12 bg-primary">
                                    <h5 class="m-0 font-weight-bold text-white ">Invoice #<?php echo $invid; ?></h5>
                                </div>
                            </div>

                            <div class="card col-12 p-0">
                                <div class="card-body py-3 col-12">
                                    <h6 class="m-0 font-weight-bold text-primary"><u>Customer Details</u></h6>
                                </div>
                            </div>

                            <div class="card col-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="font-weight: 800;">Invoice #</li>
                                    <li class="list-group-item" style="font-weight: 800;">Name</li>
                                    <li class="list-group-item" style="font-weight: 800;">Contact no.</li>
                                    <li class="list-group-item" style="font-weight: 800;">Email </li>
                                    <li class="list-group-item" style="font-weight: 800;">Gender</li>
                                    <li class="list-group-item" style="font-weight: 800;">Invoice Date</li>
                                </ul>
                            </div>

                            <div class="card col-9">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $invid; ?></li>
                                    <li class="list-group-item"><?php echo $row['Name']; ?></li>
                                    <li class="list-group-item"><?php echo $row['MobileNumber']; ?></li>
                                    <li class="list-group-item"><?php echo $row['Email']; ?></li>
                                    <li class="list-group-item"><?php echo $row['Gender']; ?></li>
                                    <li class="list-group-item"><?php echo $row['PostingDate']; ?></li>



                                </ul>
                            </div>
                            <div class="col-12" style="margin-top: 1rem; padding: 0">
                                <div class="row" style="padding: 0 15px;">
                                    <div class="card col-12 p-0">
                                        <div class="card-body py-3 col-12">
                                            <h6 class="m-0 font-weight-bold text-primary mb-3"><u>Service Details</u></h6>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Service</th>
                                                            <th>Cost</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $ret = mysqli_query($con, "select tblservices.ServiceName,tblservices.Cost  
                                                        from  tblinvoice 
                                                        join tblservices on tblservices.ID=tblinvoice.ServiceId 
                                                        where tblinvoice.BillingId='$invid'");
                                                        $cnt = 1;
                                                        while ($row = mysqli_fetch_array($ret)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $cnt; ?>
                                                                </td>
                                                                <td><?php echo $row['ServiceName']; ?></td>
                                                                <td><?php echo $subtotal = $row['Cost'] ?></td>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $cnt = $cnt + 1;
                                                            $gtotal += $subtotal;
                                                        }
                                                        ?>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="2" style="text-align:center">Grand Total</th>
                                                            <th><?php echo $gtotal ?></th>

                                                        </tr>
                                                    </tfoot>
                                                    </tbody>
                                                </table>
                                                <i class="fa fa-print fa-2x" style="cursor: pointer;" OnClick="CallPrint(this.value)"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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

<script>
    function CallPrint(strid) {
        var prtContent = document.getElementById("exampl");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>