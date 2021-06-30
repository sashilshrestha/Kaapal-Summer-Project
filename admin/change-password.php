<?php
    session_start();
    include('includes/dbconnection.php');
    error_reporting(0);
    if (strlen($_SESSION['bpmsaid'] == 0)) {
        header('location:logout.php');
    } else {
        
        if(isset($_POST['submit'])) {
            $adminid=$_SESSION['bpmsaid'];
            $cpassword=md5($_POST['currentpassword']);
            $newpassword=md5($_POST['newpassword']);
            $query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
            $row=mysqli_fetch_array($query);
            
            if($row>0) {
                $ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
                $msg= "Your password successully changed"; 
            } else {
                $msg="Your current password is wrong";
            }
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

            <!-- -- Added By Me Contents -- -->
            <div class="ss-change-password-container container-fluid col-lg-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Change your password</h1>

                </div>
                <form method="post" name="changepassword" onsubmit="return checkpass();" action="" class="user">

                    <?php
                        $adminid = $_SESSION['bpmsaid'];
                        $ret = mysqli_query($con,"select * from tbladmin where ID='$adminid'");
                        $cnt = 1;
                        
                        while ($row=mysqli_fetch_array($ret)) {
                    ?>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" name="currentpassword" placeholder="Current Password" required>
                        <p style="font-size:12px; color:red" align="left" class="ml-2 mt-2"> <?php  echo $msg;  ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            name="newpassword" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            name="confirmpassword" placeholder="Confirm New Password" required>
                    </div>
                    <p style="font-size:12px; color:red" align="left" class="ml-2 mt-2" id="Confirmalert">
                    </p>

                    <input type="submit" name="submit" value="Change Password"
                        class="btn bg-primary text-white btn-user btn-block">

                </form>
            </div>
            <?php } ?>
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
<?php } ?>
<script type="text/javascript">
function checkpass() {
    if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        var p = document.getElementById("Confirmalert")
        p.innerText = "New Password and Confirm New Password fiekd does not match";
        // alert('New Password and Confirm Password field does not match');
        document.changepassword.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>