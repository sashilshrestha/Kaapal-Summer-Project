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
<section class="text-gray-100 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">Before they sold out
                <br class="hidden lg:inline-block">readymade gluten
            </h1>
            <p class="mb-8 leading-relaxed text-gray-400">Copper mug try-hard pitchfork pour-over freegan heirloom
                neutra
                air
                plant cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken
                authentic tumeric truffaut hexagon try-hard chambray.</p>
            <div class="flex justify-center">
                <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Button</button>
                <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
            </div>
        </div>
        <div class="lg:w-full md:w-1/2 w-5/6 lg:max-w-xl">
            <img class="object-cover object-center rounded" alt="hero" src="./img/hero-img.jfif">
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="text-gray-100 body-font">
    <div class="container px-5 py-24 mx-auto flex">
        <div class="lg:w-2/5 md:w-1/2 rounded-lg p-10 flex flex-col  w-full mt-10 md:mt-0 mr-20" style="background:#232323">
            <h2 class="text-gray-200 font-medium title-font mb-5 text-center text-2xl">Make an Appointment</h2>
            <div class="relative mb-4">
                <label for="full-name" class="leading-7 text-sm text-gray-100">Full Name</label>
                <input type="text" id="full-name" name="full-name" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-100">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="services" class="leading-7 text-sm text-gray-100">Services</label>

                <select name="services" id="cars" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-2 px-2 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
            </div>

            <div class="relative mb-4">
                <?php $year =  date('Y');
                $month =  date('m');
                $date = date('d'); ?>
                <label for="date" class="leading-7 text-sm text-gray-100">Date</label>
                <input type="date" id="start" name="trip-start" value="<?php echo $year ?>-<?php echo $month ?>-<?php echo $date ?>" min="<?php echo $year ?>-<?php echo $month ?>-<?php echo $date ?>" max="" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="time" class="leading-7 text-sm text-gray-100">Time</label>
                <input type="time" min="3:00" max="6:00" name="time1" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2
                    focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors
                    duration-200 ease-in-out" required>
            </div>
            <div class="relative mb-5">
                <label for="phone" class="leading-7 text-sm text-gray-100">Phone</label>
                <input type="phone" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-red-500 focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Button</button>
            <p class="text-xs text-gray-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
        </div>
        <div class="md:pr-16 lg:pr-0 pr-0">
            <h1 class="title-font font-medium text-3xl text-gray-100">Slow-carb next level shoindcgoitch ethical
                authentic, poko scenester</h1>
            <p class="leading-relaxed mt-4">Poke slow-carb mixtape knausgaard, typewriter street art gentrify
                hammock starladder roathse. Craies vegan tousled etsy austin.</p>
        </div>

    </div>
</section>

<?php include('includes/footer.php'); ?>