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

<main id="about-page">
    <!-- About Header Section -->
    <section id="about-header">
        <div class="about-hero" style="">
            <div class="overlay"></div>
            <div class="overlay-2"></div>
            <div class="container mx-auto pb-12">
                <div class="ss-header">
                    <h1 class="font-extrabold text-6xl">Our Services</h1>
                </div>
                <div class="text-sm breadcrumbs text-gray-300 text-lg">
                    <ul class="">
                        <li class="">
                            <a class="">Home</a>
                        </li>
                        <li>
                            <a class="">Services</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section id="services">
        <div class="mx-auto ss-table">
            <h5 class="text-center font-light text-lg tracking-widest uppercase">Beauty Services</h5>
            <h1 class="text-center font-bold text-6xl"><span class="text-primary">Service</span> Prices</h1>
            <p class="mt-7 text-center text-2xl text-gray-500">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
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
</main>


<?php //include('includes/footer.php'); 
?>