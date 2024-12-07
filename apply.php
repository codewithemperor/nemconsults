<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php
        $pageTitle = "Nemconsults - Apply Now";
        require_once './include/header.php';
    ?>
    <!-- Head ends-->

    <body>
        
        <!-- Navbar -->
        <?php include_once './include/navbar.php' ?>
        <!-- Navbar ends -->

        <!-- Banner -->
        <div class="banner usa d-flex align-items-end" data-aos="slide-down" data-aos-duration="800">
            <div class="container">
                <p class="h1 text-light fw-bolder">Apply Now</p>
                <p class="text-light col-md-7 mb-4"> Ready to take the next step? We're here to guide you through the application process for courses, universities, scholarships, and more!</p>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Enquiry Form -->
        <div class="enquiry p-3 p-md-5" id="enquiry">
            <div class="my-4">
                <div class="d-flex justify-content-center align-items-center flex-column d-lg-block">
                    <h1 class="title mt-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0">Register with us today!</h1>
                    <p class="col-lg-7 col-md-10 mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="50">Fill out the form below to connect with our experts. We’re excited to assist you with any questions or concerns regarding your application!</p>
                </div>
                
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 col-md-10">    
                        <?php include './include/apply-now-form.php' ?>
                    </div>
                    <div class="d-none col-md-4 col-lg-4 d-lg-flex justify-content-center object-fit-cover overflow-hidden ms-2 p-0 mt-2 mt-md-0" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                        <img src="images/uk-2.jpg" class="h-100" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-delay="350">
                    </div>
                </div>

            </div>

        </div>
        <!-- Enquiry Form ends-->

        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->




        
    </body>
</html>
