<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2" />
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <?php
            $ret1=mysqli_query($con,"select ID,Name,ApplyDate from  tblappointment where Status=''");
            $num=mysqli_num_rows($ret1);
        ?>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo $num;?>+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">You have <?php echo $num;?> new notifications</h6>
                <?php if($num>0) {
                    while($result=mysqli_fetch_array($ret1)) {
                ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div>
                        <div class="small text-gray-500"><?php echo $result['ApplyDate'];?></div>
                        <span class="font-weight-bold">New appointment received from <span
                                class="text-warning"><?php echo $result['Name'];?>
                            </span> </span>
                    </div>
                </a>
                <?php }} else {?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div>
                        <span class="font-weight-bold">No New Appointment Received</span>
                    </div>
                </a>
                <?php }?>
            </div>
        </li>



        <div class="topbar-divider d-none d-sm-block"></div>

        <?php
            $adid=$_SESSION['bpmsaid'];
            $ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
            $row=mysqli_fetch_array($ret);
            $name=$row['AdminName'];
        ?>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                <img class="img-profile rounded-circle"
                    src="https://scontent.fktm7-1.fna.fbcdn.net/v/t1.0-9/92953073_144917210373089_2936511952509206528_o.jpg?_nc_cat=102&ccb=3&_nc_sid=174925&_nc_ohc=hJklEg00ANcAX-O00ok&_nc_ht=scontent.fktm7-1.fna&oh=983a7f1016d4d54aa0013eb0e4e70736&oe=604C41A5" />
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./admin-profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="./change-password.php">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->