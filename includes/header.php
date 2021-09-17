<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

session_start();
include('dbconnection.php');
error_reporting(0);

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $services = $_POST['services'];
    $adate = $_POST['adate'];
    $atime = $_POST['atime'];
    $phone = $_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
    $datetime = new DateTime();
    $Nepal_time = new DateTimeZone('Asia/Kathmandu');
    $datetime->setTimezone($Nepal_time);
    $currenttime = $datetime->format('Y-m-d h:i:sa');

    $query = mysqli_query($con, "insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");

    if ($query) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shresthasashil@gmail.com'; // Gmail address which you want to use as SMTP server
            $mail->Password = '9813863950'; // Gmail address Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';

            $mail->setFrom('shresthasashil@gmail.com', 'Kaapal Unisex Salon'); // Gmail address which you used as SMTP server
            $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

            $mail->isHTML(true);
            $mail->Subject = 'Appointment Submission Notification';
            $mail->Body = "Dear $name,<br><br>
    
                This is the automated message from Glamup Unisex Salon. You will be receiving another email following your appointment status.<br><br>
    
                Thank you !<br><br>
                
                Appointment Information: <br><br>
                Appointment Number: $aptnumber<br>
                Created Date: <br>
                Name: $name<br>
                Email: $email<br>
                Mobile Number: $phone<br>
                Appointment Date: $adate<br>
                Appointment Time: $atime<br>
                Services:<br>
    
                Glamup Unisex Salon<br>
                Anamnagar, Kathmandu<br>
                9840594474";

            $mail->send();

            echo '<script>alert("Done")</script>';
        } catch (Exception $e) {
            echo '<script>alert("NotDone")</script>';
        }
    } else {
        $msg = "Something Went Wrong. Please try again";
    }
}
?>
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
                        Sign In
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>

<body>
    <!-- Book Appoinment Modal Box -->
    <div id="my-modal" class="modal">
        <div class="modal-box">
            <form method="POST" action="#">
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
                    <a href="#" class="btn btn-ghost btn-outline px-8 text-base">Closed </a>
                </div>
            </form>
        </div>
    </div>