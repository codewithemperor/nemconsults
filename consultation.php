<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php
    $pageTitle = "Nemconsults - Consultation";
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
                <p class="h1 text-light fw-bolder mb-4">Book a consultation</p>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Enquiry Form -->
        <div class="enquiry p-3 p-md-5 bg-white">
            <div class="my-4">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-7">
                        <h1 class="title" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0">Initial Consultation</h1>
                        <p class="mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="50">Ben Sommers is a licenced immigration consultant who can help you immigrate to Canada. He is the CEO at Nemconsults, and as an immigrant himself, he understands the difficulties people face when planning their move to this beautiful country.</p>
                        <p class="mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="50">The initial consultation is the first step towards your dream of coming to Canada or making this country your forever home. This first meeting is 45 min or one hour long (depending on the package you choose below), and we can meet on Zoom. You will talk directly to Ben, who will ask about your plans, background and answer all of your questions.</p>
                        <p class="mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="50">You can book an initial consultation on the website using a credit card, or if you already live in Canada you can send us an e-transfer. The prices listed below are in Canadian dollars.</p>
                    </div>

                    <!-- Pricing  -->
                    <div class="col-lg-5">
                        <div class="row row-cols-1 row-cols-md-2 mb-3 text-center justify-content-center align-items-center">
                            <!-- Standard Consultation -->
                            <div class="col pricing" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200">
                                        <h4 class="my-0 fw-normal">Standard Consultation</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title" data-aos="fade-in" data-aos-duration="800" data-aos-delay="300">$170<small class="text-body-secondary fw-light">/ca</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li data-aos="fade-right" data-aos-duration="800" data-aos-delay="500">Perfect for those who want to study in Canada or want to learn more about immigration programs.</li>
                                            <li data-aos="fade-right" data-aos-duration="800" data-aos-delay="600">Also for those who want to learn more about immigration programs.</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-package="Standard Consultation" data-price="170" data-aos="fade-up" data-aos-duration="800" data-aos-delay="700">Book now</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Ultimate Consultation -->
                            <div class="col pricing-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3" data-aos="fade-in" data-aos-duration="800" data-aos-delay="300">
                                        <h4 class="my-0 fw-normal">Ultimate Consultation</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title" data-aos="fade-in" data-aos-duration="800" data-aos-delay="400">$270<small class="text-body-secondary fw-light">/ca</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li data-aos="fade-left" data-aos-duration="800" data-aos-delay="700">Perfect for those who want to immigrate to Canada and need a better understanding of the process and their options.</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-package="Ultimate Consultation" data-price="270" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">Book now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing  end-->

                    <!-- Modal -->
                    <form action="include/consultation-payment.php" method="post" class="">
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">

                            
                                
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{PACKAGE NAME}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body row g-3 mt-3">
                                    
                                        <input type="hidden" name="packageAmount" id="packageAmount">
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="packageInput" class="form-label fw-bold fs-6">Package*</label>
                                            <input type="text" class="form-control py-3" id="packageInput" name="packageInput" readonly required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="surname" class="form-label fw-bold fs-6">Surname*</label>
                                            <input type="text" class="form-control py-3" name="surname" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="otherName" class="form-label fw-bold fs-6">Other Name*</label>
                                            <input type="text" class="form-control py-3" name="otherName" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
                                            <label for="phoneNumber" class="form-label fw-bold fs-6">Phone Number*</label>
                                            <input type="number" class="form-control py-3" name="phoneNumber" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
                                            <label for="email" class="form-label fw-bold fs-6">Email*</label>
                                            <input type="email" class="form-control py-3" name="email" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
                                            <label for="appointmentDate" class="form-label fw-bold fs-6">Appointment Date & Time*</label>
                                            <input type="datetime-local" class="form-control py-3" name="appointmentDate" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="address" class="form-label fw-bold fs-6">Full Address*</label>
                                            <input type="text" class="form-control py-3" name="address" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="address-outside" class="form-label fw-bold fs-6">If you live outside your home country, confirm validity of your visa. If it doesn't apply, write NA*</label>
                                            <input type="text" class="form-control py-3" name="address-outside" required>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="visa-refusal" class="form-label fw-bold fs-6">Have you ever had a visa or immigration application refused by any country? If yes, please provide more information.*</label>
                                            <textarea name="visa-refusal" class="form-control" rows="4"></textarea>
                                        </div>

                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="500">
                                            <label for="visaType" class="form-label fw-bold fs-6">I would like to obtain professional advice from the RCIC with respect to one of the following options*</label>
                                            <select name="visaType" id="" class="form-select py-3" required>
                                                <option value="" disabled selected>select option...</option>
                                                <option value="Tourist Visa Application">Tourist Visa Application</option>
                                                <option value="Study Permit Application">Study Permit Application</option>
                                                <option value="Work Permit Application">Work Permit Application</option>
                                                <option value="Permanent Residence">Permanent Residence</option>
                                                <option value="Citizenship">Citizenship</option>
                                            </select>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
                                            <label for="textarea" class="form-label fw-bold fs-6">Please provide more details about your plans in Canada*</label>
                                            <textarea name="textarea" class="form-control" rows="8"></textarea>
                                        </div>
                
                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <label for="about-us" class="form-label fw-bold fs-6">How did you hear about us?*</label>
                                            <input type="text" class="form-control py-3" name="about-us" required>
                                        </div>

                                        <div class="col-12">
                                        <label for="visaType" class="form-label fw-bold fs-6">Choose your preferred Payment Gateway</label>
                                            <select name="gatewayType" class="form-select py-3" required>
                                                <option value="paystack">Paystack</option>
                                                <option value="flutterwave">Flutterwave</option>
                                            </select>
                                        </div>


                                        <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
                                            <input type="checkbox" class="form-check-input" name="terms" required>
                                            <label for="terms" class="form-label fw-bold fs-6">I have read and accept the<a href="terms.txt" target="_blank" rel="noopener noreferrer"> terms and conditions</a></label>
                                        </div>
                                </div>

                                <div class="modal-footer text-center justify-content-center">
                                    <button type="submit" id="payButton" name="payButton" class="btn btn-accent px-5 py-3">Pay {product price}</button>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                    </form>
                        <!-- Modal end-->
                </div>
    
                
                

            </div>

        </div>
        <!-- Enquiry Form ends-->

        
        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->



        <script>
            document.querySelector('form').addEventListener('submit', function (e) {
                const termsCheckbox = document.querySelector('input[name="terms"]');
                if (!termsCheckbox.checked) {
                    e.preventDefault();
                    alert("You must accept the terms and conditions before proceeding.");
                }
            });


            document.addEventListener('DOMContentLoaded', function () {
                var modalTitle = document.getElementById('staticBackdropLabel');
                var packageInput = document.getElementById('packageInput');
                var payButton = document.getElementById('payButton');
                var packageAmount =document.getElementById('packageAmount');
        
                // Get all buttons that trigger the modal
                var buttons = document.querySelectorAll('.btn-outline-primary');
        
                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var packageName = button.getAttribute('data-package');
                        var packagePrice = button.getAttribute('data-price');
        
                        // Update modal content
                        modalTitle.textContent = packageName;
                        packageInput.value = packageName;
                        packageAmount.value = packagePrice;
                        payButton.textContent = 'Pay $' + packagePrice;
                        console.log(packageInput.value);
                    });
                });
            });
            </script>
        
        
    </body>
</html>
