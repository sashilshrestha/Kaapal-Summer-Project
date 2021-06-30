<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    
    if (strlen($_SESSION['bpmsaid']==0)) {
    header('location:logout.php');
    } else {  
        if(isset($_POST['submit']))
            {
                $adminid=$_SESSION['bpmsaid'];
                $aname=$_POST['adminname'];
                $mobno=$_POST['contactnumber'];
                $email=$_POST['email'];
                $username=$_POST['username'];
            
                $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno', Email='$email', UserName='$username' where ID='$adminid'");
                if ($query) {
                $msg="Admin profile has been updated.";
            }
            else
                {
                $msg="Something Went Wrong. Please try again.";
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
            <div class="ss-admin-profile-container container-fluid col-lg-12">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-3 text-gray-800">Profile Information</h1>
                </div>
                <form method="post" class="user">
                    <!-- <p style="font-size:16px; color:red" align="center"> <?php if($msg){ echo $msg; } ?> </p> -->
                    <?php
                    if($msg) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Your Profile has been <strong>updated !</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php }?>
                    <?php
                        $adminid=$_SESSION['bpmsaid'];
                        $ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($ret)) {
                    ?>
                    <div class="form-group mb-5">
                        <?php                        
                            $image_data = $row['ImageFile'];
                            $encoded_image = base64_encode($image_data);
                            $Hinh = "<img class='ss-profile-img ' src='data:image/jpeg;base64,{$encoded_image}'";
                            echo $Hinh;
                        ?>
                        </img>
                        <!-- <input type="file" name="file" /> -->
                    </div>
                    <div class="form-group ">
                        <p class="pl-2">Admin name <i class="fas fa-caret-down"></i></p>
                        <input type="text" class="form-control form-control-user " id="exampleInputEmail"
                            aria-describedby="emailHelp" name="adminname" value="<?php  echo $row['AdminName'];?>"
                            required>
                    </div>
                    <div class="form-group ">
                        <p class="pl-2">Username <i class="fas fa-caret-down"></i></p>
                        <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                            name="username" value="<?php  echo $row['UserName'];?>" required>
                    </div>
                    <div class="form-group ">
                        <p class="pl-2">Contact number <i class="fas fa-caret-down"></i></p>
                        <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                            name="contactnumber" value="<?php  echo $row['MobileNumber'];?>" required>
                    </div>
                    <div class="form-group ">
                        <p class="pl-2">Email address <i class="fas fa-caret-down"></i></p>
                        <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="email"
                            value="<?php  echo $row['Email'];?>" required>
                    </div>
                    <input type="submit" name="submit" value="Update Your Information"
                        class="btn bg-primary text-white btn-user btn-block mt-5">

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