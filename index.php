<?php
// include('includes/dbconnection.php');
// session_start();
// error_reporting(0);
// include('includes/dbconnection.php');


?>

<?php //include('includes/head.php'); 
?>
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
                    <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1229&q=80" alt="" class="rounded-full ring ring-primary ring-offset-base-100 ring-offset-8">
                </div>
                <h1 class="font-bold text-primary">BEAUTY <span class="font-light text-white">CENTER</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>

            <div class="card p-3 shadow-2xl">
                <div class="ss-img-holder flex justify-end">
                    <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1229&q=80" alt="" class="rounded-full ring ring-primary ring-offset-base-100 ring-offset-8">
                </div>
                <h1 class="font-bold text-primary">BEAUTY <span class="font-light text-white">CENTER</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>

            <div class="card p-3 shadow-2xl ">
                <div class="ss-img-holder flex justify-end">
                    <img src="https://images.unsplash.com/photo-1593643946890-b5b85ade6451?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1229&q=80" alt="" class="rounded-full ring ring-primary ring-offset-base-100 ring-offset-8">
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

<?php //include('includes/footer.php'); 
?>