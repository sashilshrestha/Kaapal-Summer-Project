<?php include('head.php'); ?>
<!-- Navbar -->
<header>
    <div class="navbar mb-2 text-neutral-content ">
        <div class="container mx-auto justify-between">
            <div class="px-2 mx-2">
                <a class="">
                    <img src="./img/logo.png" alt="" class="logo-img">
                </a>
            </div>
            <div class="px-2 mx-2">
                <div class="items-stretch hidden lg:flex">
                    <a class="btn btn-ghost btn-sm rounded-btn" href="/Summer">
                        Home
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn" href="./about.php">
                        About
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn" href="./services.php">
                        Services
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn" href="./contact.php">
                        Contact
                    </a>
                    <a class="btn btn-primary btn-sm rounded-btn" href="#my-modal">
                        Appointment
                    </a>
                    <a class="btn btn-primary btn-sm rounded-btn" href="./admin">
                        Admin
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>

<body>

    <!-- Book Appoinment Modal Box -->
    <?php
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $services = $_POST['services'];
        $adate = $_POST['adate'];
        $atime = $_POST['atime'];
        $phone = $_POST['phone'];
        $aptnumber = mt_rand(100000000, 999999999);

        $query = mysqli_query($con, "insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");

        if ($query) {
            $ret = mysqli_query($con, "select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
            $result = mysqli_fetch_array($ret);
            $_SESSION['aptno'] = $result['AptNumber'];
            echo "<script>window.location.href='thank-you.php'</script>";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
    }
    ?>
    <div id="my-modal" class="modal">
        <div class="modal-box">
            <form action="#" method="post" class="appointment-form">
                <div class="form-control">
                    <h1 class="text-center font-bold mb-5 text-4xl">Book an Appointment</h1>
                    <input type="text" placeholder="Full Name" class="input input-bordered mb-3" name="name">
                    <input type="text" placeholder="Email" class="input input-bordered mb-3" name="email">
                    <select class="select select-bordered w-full mb-3" name="services">
                        <option disabled="disabled" selected="selected">Select any services</option>
                        <?php $query = mysqli_query($con, "select * from tblservices");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $row['ServiceName']; ?>">
                                <?php echo $row['ServiceName']; ?></option>
                        <?php } ?>
                    </select>
                    <?php
                    $year =  date('Y');
                    $month =  date('m');
                    $date = date('d');
                    ?>
                    <input type="date" placeholder="Date" class="input input-bordered mb-3" value="<?php echo $year ?>-<?php echo $month ?>-<?php echo $date ?>" min="<?php echo $year ?>-<?php echo $month ?>-<?php echo $date ?>" max="" name="adate">
                    <input type="time" placeholder="Time" class="input input-bordered mb-3" value="10:00" min="10:00" max="18:00" name="atime">
                    <input type="number" class="input input-bordered mb-3" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">

                </div>

                <div class="modal-action">
                    <input type="submit" name="submit" id="submit" value="Send" class="btn btn-primary px-8 text-base">
                    <a href="#" class="btn btn-ghost btn-outline px-8 text-base">Close</a>
                </div>
            </form>
        </div>
    </div>