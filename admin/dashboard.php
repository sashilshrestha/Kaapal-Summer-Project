<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['bpmsaid']==0)) {
        header('location:logout.php');
    } 
?>
<?php include('includes/head.php');?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include('includes/sidebar.php');?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php include('includes/navigation.php');?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm bg-kp shadow-sm text-white"><i
                            class="fas fa-download fa-sm text-white"></i> Generate
                        Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <?php 
                        $query1=mysqli_query($con,"Select * from tblcustomers");
                        $totalcust=mysqli_num_rows($query1);
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Customer
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalcust;?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="./customer-list.php"><i
                                                class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <?php 
                        $query2=mysqli_query($con,"Select * from tblappointment");
                        $totalappointment=mysqli_num_rows($query2);
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Appoinments
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalappointment;?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="./all-appoinments.php">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-primary text-uppercase mb-1">
                                            Tasks
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    50%
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Pending Requests Card Example -->
                    <?php 
                        $query3=mysqli_query($con,"Select * from tblappointment where Status='1'");
                        $totalaccapt=mysqli_num_rows($query3);
                    ?>
                    <div class=" col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Accepted Appoinments
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalaccapt;?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="./accepted-appoinments.php">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <?php 
                        $query4=mysqli_query($con,"Select * from tblappointment where Status='1'");
                        $totalrejapt=mysqli_num_rows($query4);
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Rejected appoinments
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalrejapt;?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="./rejected-appoinments.php">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <?php 
                        $query5=mysqli_query($con,"Select * from  tblservices");
                        $totalser=mysqli_num_rows($query5);
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Services
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalser; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="./manage-services.php"><i
                                                class="fas fa-comments fa-2x text-gray-300"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <?php
                        //todays sale
                        $query6=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost from tblinvoice join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE();");
                        while($row=mysqli_fetch_array($query6)) {
                            $todays_sale=$row['Cost'];
                            $todysale+=$todays_sale;
                        }
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Today Sales
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php if($todysale) {
                                                    echo $todysale;
                                                    } else { echo "0";};?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <?php 
                        //Yesterday's sale
                        $query7=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost from tblinvoice join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;");
                        while($row7=mysqli_fetch_array($query7)) {
                            $yesterdays_sale=$row7['Cost'];
                            $yesterdaysale+=$yesterdays_sale;
                        }
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Yesterday's sales
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $yesterdaysale;?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <?php
                        //Last Sevendays Sale
                        $query8=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost from tblinvoice join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)>=(DATE(NOW()) - INTERVAL 7 DAY);");
                        while($row8=mysqli_fetch_array($query8)) {
                            $sevendays_sale=$row8['Cost'];
                            $tseven+=$sevendays_sale;
                        }
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Last Seven day's sales
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $tseven; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <?php
                        //Total Sale
                        $query9=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost from tblinvoice join tblservices  on tblservices.ID=tblinvoice.ServiceId");
                        while($row9=mysqli_fetch_array($query9)) {
                            $total_sale=$row9['Cost'];
                            $totalsale+=$total_sale;
                        }
                    ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Sales
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalsale; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
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

<?php include('includes/footer.php');?>