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
                </div>
            </div>

        </div>
    </div>
</header>

<body>
    
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