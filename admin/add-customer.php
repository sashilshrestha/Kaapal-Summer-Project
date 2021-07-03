<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobilenum = $_POST['mobilenum'];
        $gender = $_POST['gender'];
        $details = $_POST['details'];


        $query = mysqli_query($con, "insert into  tblcustomers(Name,Email,MobileNumber,Gender,Details) value('$name','$email','$mobilenum','$gender','$details')");
        if ($query) {
            echo "<script>alert('Customer has been added.');</script>";
            echo "<script>window.location.href = 'customer-list.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
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
                    <h1 class="h3 mb-2 text-gray-800">Add Customer</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 pl-2 font-weight-bold text-primary">Parlor Customer</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" class="user">
                                <!-- <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                echo $msg;
                                                                                            } ?> </p> -->

                                <div class="form-group mb-4">
                                    <p class="m-0 pl-2">Name<i class="ml-1 fas fa-caret-down"></i></p>
                                    <input type="text" class="form-control form-control-user" id="name" name="name" value="" required>
                                </div>
                                <div class="form-group mb-4">
                                    <p class="m-0 pl-2">Email <i class="ml-1 fas fa-caret-down"></i></p>
                                    <input type="text" class="form-control form-control-user" id="email" name="email" value="" required>
                                </div>
                                <div class="form-group mb-4">
                                    <p class="m-0 pl-2">Mobile Number <i class="ml-1 fas fa-caret-down"></i></p>
                                    <input type="text" class="form-control form-control-user" id="mobilenum" name="mobilenum" value="" required>
                                </div>
                                <p>
                                <p class="pl-2 my-2">Gender <i class="ml-1 fas fa-caret-down"></i></p> <label class="mr-2 ml-2">
                                    <input type="radio" name="gender" id="gender" value="Female" checked="true">
                                    Female
                                </label>
                                <label class="mr-2">
                                    <input type="radio" name="gender" id="gender" value="Male">
                                    Male
                                </label>
                                <label class="mr-2">
                                    <input type="radio" name="gender" id="gender" value="Transgender">
                                    Transgender
                                </label>
                                </p>
                                <div class="form-group mb-4">
                                    <p class="m-0 pl-2">Details <i class="ml-1 fas fa-caret-down"></i></p>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" id="details" name="details"></textarea>
                                </div>
                                <input type="submit" name="submit" value="Add Services" class="btn bg-primary text-white btn-user btn-block mt-5">
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

    <?php include('includes/footer.php'); ?>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

<?php
}
?>