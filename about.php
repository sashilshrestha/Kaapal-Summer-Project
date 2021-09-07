<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');

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
                    <h1 class="font-extrabold text-6xl">About Us</h1>
                </div>
                <div class="text-sm breadcrumbs text-gray-300 text-lg">
                    <ul class="">
                        <li class="">
                            <a class="">Home</a>
                        </li>
                        <li>
                            <a class="">About</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section id="about-info">
        <div class="container mx-auto">
            <div class="flex-col flex lg:flex-row">
                <img src="https://images.unsplash.com/photo-1457972729786-0411a3b2b626?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" class="shadow-4xl w-1/3 grayscale">
                <div class="py-5 pl-20">
                    <h1 class="mb-5 text-5xl font-bold">
                        <span class="text-primary">Kaapal</span> Unisex Salon

                    </h1>
                    <p class="mb-5 text-2xl leading-10 text-gray-300">
                        Our main focus is on quality and hygiene. Our Parlour is well equipped with advanced technology equipments and provides best quality services. Our staff is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials & fashion hair colourings..
                    </p>

                </div>
            </div>
        </div>
    </section>
</main>


<?php //include('includes/footer.php'); 
?>