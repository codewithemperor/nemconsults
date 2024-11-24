

<!DOCTYPE html>
<html lang="en">
    
    <!-- Head -->
    <?php
        $pageTitle = "Nemconsults - Contact Us";
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
                <p class="h1 text-light fw-bolder">Contact us</p>
                <p class="text-light col-md-7 mb-4"> We're here to assist you with information on courses, universities, scholarships, and other issues!</p>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Enquiry Form -->
        <div class="enquiry p-3 p-md-5">
            <div class="my-4">
                <div class="d-flex justify-content-center align-items-center flex-column d-lg-block">
                    <h1 class="title mt-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0">Get in touch with Nemconsults</h1>
                    <p class="col-lg-7 col-md-10 mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="50">Enter your details below to reach out to our experts. We would love to hear from you! Please reach out with any questions, comments, or feedback, and we will get back to you as soon as possible</p>
                </div>
                
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-lg-8 col-md-10">    
                    
                         <?php include './include/contact-us-form.php' ?>
                    </div>
                    <div class="d-none col-md-4 col-lg-4 d-lg-flex justify-content-center object-fit-cover overflow-hidden p-0 mt-2 mt-md-0" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                        <img src="images/img-2.png" class="h-100" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-delay="350">
                    </div>
                </div>

            </div>

        </div>
        <!-- Enquiry Form ends-->

        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- AOS JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
        <!-- Include Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <!-- Custom JS -->
        <script src="js/script.js"></script>
        
    </body>
</html>
