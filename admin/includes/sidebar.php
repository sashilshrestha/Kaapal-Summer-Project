<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-kp sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./dashboard.php">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kaapal Salon</div> -->
        <img src="./img/Logo.png" alt="" class="ss-logo-img">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <!-- <div class="sidebar-heading">Heading - 1</div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Services</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="./add-services.php">Add Services</a>
                <a class="collapse-item" href="./manage-services.php">Manage Services</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pages</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <a class="collapse-item" href="./about-us.php">About Us</a>
                <!-- <a class="collapse-item" href="utilities-border.html">Contact Us</a> -->
            </div>
        </div>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider" /> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">Heading - 2</div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-calendar-check"></i>
            <span>Appointments</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                <a class="collapse-item" href="./all-appoinments.php">All Appointments</a>
                <a class="collapse-item" href="./new-appoinments.php">New Appointments</a>
                <a class="collapse-item" href="./accepted-appoinments.php">Accepted Appointments</a>
                <a class="collapse-item" href="./rejected-appoinments.php">Rejected Appointments</a>
                <!-- <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Customers Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-users"></i>
            <span>Customers</span>
        </a>
        <div id="collapseCustomer" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                <a class="collapse-item" href="./customer-list.php">Customers List</a>
                <a class="collapse-item" href="./add-customer.php">Add Customers</a>
                <!-- <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a> -->
            </div>
        </div>
    </li>




    <!-- Nav Item - Reports -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $url; ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Reports</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $url; ?>">
            <i class="fas fa-file-invoice"></i>
            <span>Invoices</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $url; ?>">
            <i class="fas fa-calendar-check"></i>
            <span>Search Appointment</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $url; ?>">
            <i class="far fa-flag"></i>
            <span>Search Invoice</span></a>
    </li>

    <!-- <i class=""></i> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->