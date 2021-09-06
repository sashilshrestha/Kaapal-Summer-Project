<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $bpmsaid = $_SESSION['bpmsaid'];
        $pagetitle = $_POST['pagetitle'];
        $pagedes = $_POST['pagedes'];

        $query = mysqli_query($con, "update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
        if ($query) {
            $msg = "About Us has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
    }
}
?>
<?php include('includes/head.php'); ?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include('includes/sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php include('includes/navigation.php'); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Update About Us</h1>

                <?php
                if ($query) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        About Us has been updated
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 pl-2 font-weight-bold text-primary">Update About Us:</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" class="user">
                            <?php if ($msg) {
                                echo $msg;
                            } ?> </p>

                            <?php
                            $ret = mysqli_query($con, "select * from  tblpage where PageType='aboutus'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>
                                <div class="form-group mb-4">
                                    <p class="m-0 pl-2">Page Title<i class="ml-1 fas fa-caret-down"></i></p>
                                    <input type="text" class="form-control form-control-user" name="pagetitle" id="pagetitle" value="<?php echo $row['PageTitle']; ?>" required>
                                </div>
                                <div class=" form-group mb-4">
                                    <p class="m-0 pl-2">Page Description <i class="ml-1 fas fa-caret-down"></i></p>
                                    <textarea type="text" class="form-control " name="pagedes" id="pagedes" required rows="8">
                                    <?php echo $row['PageDescription']; ?>
                                </textarea>
                                </div>
                            <?php } ?>
                            <input type="submit" name="submit" value="Update" class="btn bg-primary text-white btn-user btn-block mt-5">

                        </form>
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

<?php include('includes/footer.php'); ?>