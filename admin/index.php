<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

    if(isset($_POST['login'])) {
        $adminuser=$_POST['username'];
        $password=md5($_POST['password']);
        $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
        $ret=mysqli_fetch_array($query);
        
        if($ret>0) {
            $_SESSION['bpmsaid']=$ret['ID'];
            header('location:dashboard.php');
        } else {
            $msg="The username or password is incorrect.";
        }
    }
?>
<?php include('includes/head.php');?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center ss-outerrow">

        <div class="col-xl-5 col-lg-12 col-md-12 ss-form-container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="ss-logo-bhado">
                                    <img src="./img/Logo-1.png" alt="">
                                </div>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <p style="font-size:12px; color:red" align="center">
                                        <?php if($msg) { echo $msg;}  ?>
                                    </p>

                                    <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </a> -->
                                    <input type="submit" name="login" value="Sign In"
                                        class="btn bg-kaapal btn-user btn-block">

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="../index.php">
                                        Redirect to <i class="fas fa-home"></i> Home Page </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php include('includes/footer.php');?>