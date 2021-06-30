<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');

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

<?php include('includes/head.php'); ?>
<?php include('includes/header.php'); ?>


<!-- Hero Section -->
<section id="hero">
    <div class="hero" style="background-image: url(&quot;https://images.unsplash.com/photo-1560066984-138dadb4c035?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80&quot;);">
        <div class="hero-overlay"></div>
        <div class="hero-overlay part-2"></div>
        <div class="hero-info container mx-auto">
            <div class="ss-information">
                <h5 class="font-light">
                    ENJOY THE SOOTHING EXPERIENCE!
                </h5>
                <h1 class="font-bold mb-6">ESSENCE OF NATURAL <span class="text-primary">BEAUTY</span></h1>

                <a class="btn btn-primary rounded-btn text-base px-6 mr-2">
                    Explore More
                </a>

                <a class="btn btn-gray rounded-btn text-base px-6 btn-outline" href="#my-modal">
                    Book an apooinment
                </a>
            </div>
        </div>
    </div>
</section>

<section id="whyus">
    <div class="container mx-auto">
        <div class="flex flex-row w-full">
            <div class="card p-3">
                <h5 class="font-bold text-lg mb-3">BEAUTY / MASSAGES / SPA</h5>
                <h2 class="text-4xl font-bold text-primary mb-6">WHAT DO YOU NEED?</h2>
                <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>

            </div>
            <div class="card p-3 shadow-2xl">
                <div class="ss-img-holder flex justify-end">
                    <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1229&q=80" alt="" class="rounded-full">
                </div>
                <h1 class="font-bold text-primary">BEAUTY <span class="font-light text-white">CENTER</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>

            <div class="card p-3 shadow-2xl">
                <div class="ss-img-holder flex justify-end">
                    <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1229&q=80" alt="" class="rounded-full">
                </div>
                <h1 class="font-bold text-primary">BEAUTY <span class="font-light text-white">CENTER</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>

            <div class="card p-3 shadow-2xl ">
                <div class="ss-img-holder flex justify-end">
                    <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1229&q=80" alt="" class="rounded-full">
                </div>
                <h1 class="font-bold text-primary">BEAUTY <span class="font-light text-white">CENTER</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>

        </div>

    </div>
</section>

<section id="services">
    <div class="mx-auto ss-table">
        <h5 class="text-center font-light text-lg tracking-widest uppercase">Beauty Services</h5>
        <h1 class="text-center font-bold text-6xl">Our Services</h1>
        <div class="overflow-x-auto mt-12 mt-20">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>
                            Sno.
                        </th>
                        <th>Service Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "select * from tblservices");
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <th>
                                #<?php echo $i; ?>
                            </th>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">
                                            <?php echo $row['ServiceName']; ?>
                                        </div>

                                    </div>
                                </div>
                            </td>

                            <th>
                                <p class="inline-block border-white border-b-2">Rs. <?php echo $row['Cost']; ?></p>
                            </th>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>SNO.</th>
                        <th>Service Name</th>
                        <th>Price</th>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
</section>
<?php include('includes/footer.php'); ?>

<!-- Book Appoinment Modal Box -->
<div id="my-modal" class="modal">
    <div class="modal-box">
        <div class="form-control">
            <h1 class="text-center font-bold mb-5 text-4xl">Book an Appointment</h1>
            <input type="text" placeholder="Full Name" class="input input-bordered mb-3">
            <input type="text" placeholder="Email" class="input input-bordered mb-3">
            <select class="select select-bordered w-full mb-3">
                <option disabled="disabled" selected="selected">Choose your superpower</option>
                <option>telekinesis</option>
                <option>time travel</option>
                <option>invisibility</option>
            </select>
            <?php
            $year =  date('Y');
            $month =  date('m');
            $date = date('d');
            ?>
            <input type="date" placeholder="Date" class="input input-bordered mb-3" value="<?php echo $year ?>-<?php echo $month ?>-<?php echo $date ?>" min="<?php echo $year ?>-<?php echo $month ?>-<?php echo $date ?>" max="">
            <input type="time" placeholder="Time" class="input input-bordered mb-3" value="10:00" min="10:00" max="18:00">
            <input type="number" placeholder="Phone Number" class="input input-bordered mb-3">

        </div>

        <div class="modal-action">
            <a href="#" class="btn btn-primary px-8 text-base">Book</a>
            <a href="#" class="btn btn-ghost btn-outline px-8 text-base">Close</a>
        </div>
    </div>
</div>