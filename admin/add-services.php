<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['bpmsaid']==0)) {
        header('location:logout.php');
    } else {
        if(isset($_POST['submit'])) {
            $sername=$_POST['sername'];
            $cost=$_POST['cost'];
            
            $query=mysqli_query($con, "insert into  tblservices(ServiceName,Cost) value('$sername','$cost')");
            // if ($query) {
            //     echo "<script>alert('Service has been added.');</script>";  echo "<script>window.location.href = 'add-services.php'</script>";   
            //     $msg="";
            // } else {
            //     echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
            // }
        }
  ?>
<?php include('includes/head.php');?>
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include('includes/sidebar.php');?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php include('includes/navigation.php');?>

            <!-- -- Added By Me Contents -- -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Add Services</h1>

                <?php
                    if($query) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Service has been added.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php }?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 pl-2 font-weight-bold text-primary">Parlor Services</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" class="user">
                            <!-- <p style="font-size:16px; color:red" align="center"> <?php if($msg){ echo $msg; } ?> </p> -->

                            <div class="form-group mb-4">
                                <p class="m-0 pl-2">Service Name<i class="ml-1 fas fa-caret-down"></i></p>
                                <input type="text" class="form-control form-control-user" id="sername" name="sername"
                                    value="" required>
                            </div>
                            <div class="form-group mb-4">
                                <p class="m-0 pl-2">Cost <i class="ml-1 fas fa-caret-down"></i></p>
                                <input type="text" class="form-control form-control-user" id="cost" name="cost" value=""
                                    required>
                            </div>

                            <input type="submit" name="submit" value="Add Services"
                                class="btn bg-primary text-white btn-user btn-block mt-5">

                        </form>
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

<?php include('includes/footer.php');?>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<?php
}  
?>