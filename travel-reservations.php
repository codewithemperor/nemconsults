<!DOCTYPE html>
<html lang="en">
    
    <!-- Head -->
    <?php
    $pageTitle = "Nemconsults - Travel Reservation";
    require_once './include/header.php';
    ?>
    <!-- Head ends-->
    <body>
        
        <!-- Navbar -->
        <?php include_once './include/navbar.php' ?>
        <!-- Navbar ends -->

        <!-- Banner -->
        <div class="wrapper">
            <div class="banner-reservation d-flex align-items-center" data-aos="fade-up" data-aos-duration="500">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-7" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
                            <h1 class="banner-header text-white mb-2 animate__animated animate__fadeIn">Get Flight Reservation, Travel Insurance & Hotel Reservations</h1>
                            <p class="text-white col-md-10 col-lg animate__animated animate__fadeIn" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">Embassy reviews flight itinerary for visa, confirmed Hotel Reservations, Travel medical insurance for visa & other docs to approve visa. Get all documents from us to get your visa stamp on passport.</p>
                            <a href="#pricing" class="btn btn-accent px-5 py-2 animate__animated animate__pulse" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Our Service -->
        <div class="why py-5 bg-white">
            <div class="container px-3 px-md-0">
                <h1 class="title" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Our Service</h1>
                
                <div class="row mt-4 mt-md-5 row-cols row-cols-md-2 row-cols-lg-4 row-gap-4">
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                        <div class="card h-100">
                            <div class="card-body p-4 text-center">
                                <i class="fa fa-plane-arrival mb-4" style="font-size: 60px;"></i>
                                <p class="card-title mb-2">Flight itinerary</p>
                                <p class="">Whether you are in need of multi-city flight bookings, round trip tickets, or a flight itinerary for visa, we have the resources to get your visa travel plans in place without you having to purchase full price tickets.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                        <div class="card h-100">
                            <div class="card-body p-4 text-center">
                                <i class="fa-solid fa-person-walking-luggage mb-4" style="font-size: 60px;"></i>
                                <p class="card-title mb-3">Travel Insurance</p>
                                <p class="">Don’t leave without cover. Wherever your chosen destination, you can find the best priced travel insurance for the whole family right here. We also provide Schengen travel insurance, getting your Schengen visa application one step closer to approval.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                        <div class="card h-100">
                            <div class="card-body p-4 text-center">
                                <i class="fa fa-hotel mb-4" style="font-size: 60px;"></i>
                                <p class="card-title mb-3">Hotel Reservation</p>
                                <p class="">Providing Hotel Reservations for any country visa in the world we can get your travel plans in motion. For visa applications, we can arrange hotel confirmation that will move your visa application forward and give you the opportunity to amend your booking at a later date free of charge.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                        <div class="card h-100">
                            <div class="card-body p-4 text-center">
                                <i class="fa-solid fa-envelope mb-4" style="font-size: 60px;"></i>
                                <p class="card-title mb-3">Visa Invitation Letter</p>
                                <p class="">An Invitation Letter for a visa application is a letter that the applicant has to submit to the embassy or consulate where they are applying for a visitor visa.</p>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        <!-- Our Service ends -->

        <!-- Pricing  -->
        <div class="pricing p-3 p-md-5" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="50" id="pricing">
            <div class="d-flex justify-content-center">
                <h1 class="title display-5 my-3 mb-5" data-aos="flip-up" data-aos-duration="500" data-aos-delay="50">Product Pricing</h1>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-3 text-center gx-lg-5 gy-lg-4">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal" data-aos="flip-up" data-aos-duration="500" data-aos-delay="150">Flight itinerary</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="display-5 pricing-card-title my-lg-4 my-3 fw-bolder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">$15<small class="text-body-secondary fw-light">/person</small></h1>
                                <ul class="list-unstyled mt-3 mb-4 px-5">
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="250"><i class="fa-solid fa-circle-check"></i>Round Trip Flight; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"><i class="fa-solid fa-circle-check"></i>Upto 4 Correction</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="350"><i class="fa-solid fa-circle-check"></i>Free Cancellation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="400"><i class="fa-solid fa-circle-check"></i>No Obligation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="450"><i class="fa-solid fa-circle-check"></i>Free Cover & NOC Letter</li>
                                </ul>
                                <a href="flight-itinerary.php" class="w-100 btn btn-lg btn-outline-primary" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500">Order Now!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal" data-aos="flip-up" data-aos-duration="500" data-aos-delay="150">Hotel Reservation</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="display-5 pricing-card-title my-lg-4 my-3 fw-bolder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">$20<small class="text-body-secondary fw-light">/person</small></h1>
                                <ul class="list-unstyled mt-3 mb-4 px-5">
                                    <li data-aos="fade-right" data-aos-duration="500" data-aos-delay="250"><i class="fa-solid fa-circle-check"></i>Upto 2 hotels; Option to add more</li>
                                    <li data-aos="fade-right" data-aos-duration="500" data-aos-delay="300"><i class="fa-solid fa-circle-check"></i>Upto 4 Correction</li>
                                    <li data-aos="fade-right" data-aos-duration="500" data-aos-delay="350"><i class="fa-solid fa-circle-check"></i>Stay Upto 2 weeks/Hotel</li>
                                    <li data-aos="fade-right" data-aos-duration="500" data-aos-delay="400"><i class="fa-solid fa-circle-check"></i>Free Cancellation</li>
                                    <li data-aos="fade-right" data-aos-duration="500" data-aos-delay="450"><i class="fa-solid fa-circle-check"></i>No Obligation</li>
                                    <li data-aos="fade-right" data-aos-duration="500" data-aos-delay="500"><i class="fa-solid fa-circle-check"></i>Free Cover & NOC Letter</li>
                                </ul>
                                <a href="hotel-reservation.php" class="w-100 btn btn-lg btn-outline-primary" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="550">Order Now!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal" data-aos="flip-up" data-aos-duration="500" data-aos-delay="150">Travel Insurance</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="display-5 pricing-card-title my-lg-4 my-3 fw-bolder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">$20<small class="text-body-secondary fw-light">/person</small></h1>
                                <ul class="list-unstyled mt-3 mb-4 px-5">
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="250"><i class="fa-solid fa-circle-check"></i>Upto 2 Insurance; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"><i class="fa-solid fa-circle-check"></i>Upto 4 Correction</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="350"><i class="fa-solid fa-circle-check"></i>Free Cancellation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="400"><i class="fa-solid fa-circle-check"></i>No Obligation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="450"><i class="fa-solid fa-circle-check"></i>Free Cover & NOC Letter</li>
                                </ul>
                                <a href="travel-insurace.php" class="w-100 btn btn-lg btn-outline-primary" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500">Order Now!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal" data-aos="flip-up" data-aos-duration="500" data-aos-delay="150">Flight + Hotel</h4>
                            </div>
                            <div class="card-body">
                                <div class="my-lg-4 my-3">
                                    <h1 class="display-5 pricing-card-title m-0 fw-bolder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">$35<small class="text-body-secondary fw-light">/person</small></h1>
                                    <p class="text-danger m-0 fw-bold" data-aos="fade-right" data-aos-duration="500" data-aos-delay="250">30% Discount</p>
                                </div>
                                <ul class="list-unstyled mt-3 mb-4 px-5">
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"><i class="fa-solid fa-circle-check"></i>Round Trip Flight; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="350"><i class="fa-solid fa-circle-check"></i>Up to 2 Hotel; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="400"><i class="fa-solid fa-circle-check"></i>Unlimited Correction</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="450"><i class="fa-solid fa-circle-check"></i>Stay Upto 2 weeks/Hotel</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="500"><i class="fa-solid fa-circle-check"></i>Free Cancellation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="550"><i class="fa-solid fa-circle-check"></i>Free Cover & NOC Letter</li>
                                </ul>
                                <a href="flight-itinerary-and-hotel-reservation.php" class="w-100 btn btn-lg btn-outline-primary" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="600">Order Now!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal" data-aos="flip-up" data-aos-duration="500" data-aos-delay="150">Flight + Hotel + Insurance</h4>
                            </div>
                            <div class="card-body">
                                <div class="my-lg-4 my-3">
                                    <h1 class="display-5 pricing-card-title m-0 fw-bolder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">$60<small class="text-body-secondary fw-light">/person</small></h1>
                                    <p class="text-danger m-0 fw-bold" data-aos="fade-right" data-aos-duration="500" data-aos-delay="250">40% Discount</p>
                                </div>
                                <ul class="list-unstyled mt-3 mb-4 px-5">
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"><i class="fa-solid fa-circle-check"></i>Round Trip Flight; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="350"><i class="fa-solid fa-circle-check"></i>Up to 2 hotels; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="400"><i class="fa-solid fa-circle-check"></i>Unlimited Correction</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="450"><i class="fa-solid fa-circle-check"></i>Valid Travel Insurance</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="500"><i class="fa-solid fa-circle-check"></i>Stay Upto 2 Weeks/Hotel</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="550"><i class="fa-solid fa-circle-check"></i>Free Cancellation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="600"><i class="fa-solid fa-circle-check"></i>$0 deductible, $50,000 coverage</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="650"><i class="fa-solid fa-circle-check"></i>Free Cover & NOC Letter</li>
                                </ul>
                                <a href="flight+hotel+insurance.php" class="w-100 btn btn-lg btn-outline-primary" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="550">Order Now!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal" data-aos="flip-up" data-aos-duration="500" data-aos-delay="150">Visa Invitation Letter</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="display-5 pricing-card-title my-lg-4 my-3 fw-bolder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">$50<small class="text-body-secondary fw-light">/person</small></h1>
                                <ul class="list-unstyled mt-3 mb-4 px-5">
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="250"><i class="fa-solid fa-circle-check"></i>Round Trip Flight; Option to add more</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="300"><i class="fa-solid fa-circle-check"></i>Upto 4 Correction</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="350"><i class="fa-solid fa-circle-check"></i>Free Cancellation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="400"><i class="fa-solid fa-circle-check"></i>No Obligation</li>
                                    <li data-aos="fade-left" data-aos-duration="500" data-aos-delay="450"><i class="fa-solid fa-circle-check"></i>Free Cover & NOC Letter</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-outline-primary" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500">Order Now!</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Pricing ends -->

        <!-- Know more -->
        <div class="p-3 py-4 p-md-5 bg-white">
            <h1 class="title mt-4 " data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Why you should have Travel Reservation</h1>
            <div class="row justify-content-between mt-4">
                <div class="col p-md-0">
                    <div class="accordion" id="faqAccordion">

                        <!-- FAQ 1 -->
                        <div class="accordion-item mb-3 aos-init aos-animate" data-aos="fade-right" data-aos-duration="500" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button p-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-one" aria-expanded="false" aria-controls="faq-one">
                                    Flight Reservation for Visa Application
                                </button>
                            </h2>
                            <div id="faq-one" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Flight Reservation for visa is a required document at Embassy which can satisfy consulate officer and increase your visa approval chances. Part of the visa application process requests that you obtain a round trip flight reservation. This does not mean that you need to purchase a real flight ticket or dummy ticket as the embassies advise not to buy a flight ticket before applying your travel visa and they recommend to buy flight reservation until your visa is approved. A flight reservation is more like a dummy flight ticket that will significantly improve the chance of your visa being approved. Unfortunately,there are scams around that will deliver a fake flight itinerary and if you submit this with your visa application you will be rejected.This will not only shatter your travel plans but will also affect any future visa applications. Trying to acquire a legitimate flight reservation can be rather complicated and confusing which is why it's better to seek VisaBookings help who provides verifiable flight reservation to support all Schengen and Non-Schengen countries visa applications. Our flight resrvation has PNR code or booking number (Provided in flight reservation document with airlines name)  which can be directly verified on airlines website 
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item mb-3 aos-init aos-animate" data-aos="fade-right" data-aos-duration="500" data-aos-delay="300">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq-two" aria-expanded="false" aria-controls="faq-two">
                                    Hotel Reservations for Visa Application
                                </button>
                            </h2>
                            <div id="faq-two" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Proof of accommodation or Hotel Reservations for visa is a mandatory document you need for visa Visa processing. Paying upfront for a Hotel Reservation before having a visa application approved is a huge risk isn’t it? Yet having a confirmed Hotel Reservations for visa is essential to the visa application process. Again, this can be a very complex affair but one where we are able to help. Much like the verifiable flight reservation, VisaBookings can provide you with a genuine hotel confirmation at a great price where you won’t risk losing your money. The Schengen area consulates check proof of accommodation  so that they can see that you have solid travel plans in place. Upon visa application approval you can revisit the hotel confirmation and set the exact arrival and departure dates for your stay. Visa procedures refer hotel itinerary for visa as hotel reservation for visa or Hotel Reservations for visa and visa applicants need to submit them along with flight reservation for visa.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item mb-3 aos-init aos-animate" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq-three" aria-expanded="false" aria-controls="faq-three">
                                    Travel Medical Insurance for Visa
                                </button>
                            </h2>
                            <div id="faq-three" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Travel medical insurance for visa is a required document for applying a shcengen visa or any country travel visa. Purchasing a high coverage travel insurance policy prior to travelling is always a good idea however, when applying for a visa, in particular a Schengen visa, arranging schengen medical travel insurance is compulsory. You cannot submit dummy insurance like flight reservation for visa without buying actual ticket. Again, finding a good deal for legitimate and secure travel medical insurance can be difficult. How do you know if you are getting a good deal? Are there any hidden costs? There are several different areas that you need to examine to ensure that the travel insurance policy fully covers you and that can take up a lot of time and energy. Here on VisaBookings, we have narrowed down the ultimate travel insurance policies with the best prices around to make this step easier, getting your visa application fully equipped with the correct documentation.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--  Know more end-->
        
        <div class="enquiry p-3 p-md-5" id="enquiry">
            <div class="row my-4">
                <div class="col-md 8">

                    <div class="">
                        <h1 class="title mt-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Nemconsults can help you</h1>
                        <p class="col-md-9 mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">Enter your details and get a free counselling session with our experts so they can connect you to the right course, country, university – and even scholarships!</p>
                    </div>

                    <?php include './include/free-counseling.php' ?>

                </div>
                <div class="col-md-4 col-lg-4 d-flex justify-content-center object-fit-cover overflow-hidden p-0 mt-2 mt-md-0" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                    <img src="images/img-2.png" class="h-100" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->



    </body>
</html>
s