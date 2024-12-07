<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php


    $pageTitle = "Nemconsults - Hotel Reservation";
    require_once './include/header.php';
    ?>
    <!-- Head ends-->

    <body>
        
        <!-- Navbar -->
        <?php include_once './include/navbar.php' ?>
        <!-- Navbar ends -->

        <!-- Banner -->
        <div class="banner canada-visitor-visa d-flex align-items-center">
            <div class="container py-5">
                <p class="h1 text-light display-4 fw-bold">Fill details - Pay - Get Itinerary Via Email</p>
                <p class="text-white mb-0">Embassy recommends not to purchase tickets until visa is approved. So don't risk your
                    money, time and effort by buying actual tickets. We provide you confirmed flight
                    reservation for visa, Hotel Reservation and travel medical insurance that are perfect for visa
                    application. Once you get your visa, make your own travel plans!</p>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Consultation service  -->
        <section class="consultation-service bg-white py-3 py-md-5 bg-primary"> 
            <form action="include/travel-reservation-payment.php" method="post">
                <div class="container my-3 px-4 px-lg-0">

                    <!-- Traveller Details -->
                    <div class="p-4 align-items-center rounded-3 border shadow-lg" id="travellerDetails">
                    <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                        <h1 class="title display-5">Traveller Details</h1>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">

                            <div class="col-lg-6">
                                <label for="traveler-first-name" class="form-label fw-bold fs-6">Traveler 1 First Name (Should match passport)*</label>
                                <input type="text" class="form-control py-3" name="traveler-first-name" placeholder="First Name" required>
                            </div>

                            <div class="col-lg-6">
                                <label for="traveler-last-name" class="form-label fw-bold fs-6">Tourist 1 Last Name (Match with passport)*</label>
                                <input type="text" class="form-control py-3" name="traveler-last-name" placeholder="Last Name" required>
                            </div>
                            
                            <div class="col">
                                <label for="traveler-delivery-email" class="form-label fw-bold fs-6">Delivery Email*</label>
                                <input type="email" class="form-control py-3" name="traveler-delivery-email" placeholder="example@mail.com" required>
                            </div>

                            <div class="col">
                                <label for="traveler-phone-number" class="form-label fw-bold fs-6">Phone Number*</label>
                                <input type="number" class="form-control py-3" name="traveler-phone-number" placeholder="country code + Phone Number" required>
                            </div>    
                            
                            <div class="col">
                                <label for="traveler-passport-number" class="form-label fw-bold fs-6">Passport Number*</label>
                                <input type="text" class="form-control py-3" name="traveler-passport-number" placeholder="International Passport Number" required>
                            </div>

                            <div class="col">
                                <label for="traveler-dob" class="form-label fw-bold fs-6">Date Of Birth (Should match passport)*</label>
                                <input type="date" class="form-control py-3" name="traveler-dob" required>
                            </div>

                            <div class="col">
                                <label for="traveler-citizenship-country" class="form-label fw-bold fs-6">Country of Citizenship*</label>
                                <select name="traveler-citizenship-country" id="" class="form-select py-3 destination" required>
                                    <optgroup label="All Countries" class="all-countries">
                                        <!-- Countries will be populated here by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            
                            <div class="col">
                                <label for="traveler-gender" class="form-label fw-bold fs-6">Gender*</label>
                                <select name="traveler-gender" id="" class="form-select py-3" required>
                                    <option value="" class="placeholder" disabled selected>select option...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            
                            <div class="col">
                                <label for="traveler-city-residence" class="form-label fw-bold fs-6">City Of Residence*</label>
                                <input type="text" class="form-control py-3" name="traveler-city-residence" placeholder="Ontario" required>
                            </div>


                            <div class="col-lg-8">
                                <label for="traveler-residence-address" class="form-label fw-bold fs-6">Residence Address*</label>
                                <input type="text" class="form-control py-3" name="traveler-residence-address" placeholder="Residence Address" required>
                            </div>

                            <div class="col">
                                <label for="traveler-postal-code" class="form-label fw-bold fs-6">Postal Code*</label>
                                <input type="number" class="form-control py-3" name="traveler-postal-code" placeholder="327921" required>
                            </div>

                            <div class="col">
                                <label for="traveler-interview-date" class="form-label fw-bold fs-6">Visa Interview Date*</label>
                                <input type="date" class="form-control py-3" name="traveler-interview-date" required>
                            </div>

                            <div class="col">
                                <label for="traveller-country-applying-to" class="form-label fw-bold fs-6">Applying At which Embassy?*</label>
                                <select name="traveller-country-applying-to" class="form-select py-3 destination" required>
                                    <optgroup label="All Countries" class="all-countries">
                                        <!-- Countries will be populated here by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col">
                                <label for="referral" class="form-label fw-bold fs-6">How Did You Hear About Us?*</label>
                                <select name="referral" id="" class="form-select py-3" required>
                                    <option value="" disabled selected>select option...</option>
                                    <option value="Search Engine">Search Engine</option>
                                    <option value="Blog Article">Blog Article</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Ads">Ads</option>
                                    <option value="Friends">Friends</option>
                                    <option value="I'm not sure">I'm not sure</option>      
                                </select>
                            </div>
                        </div>
                    
                    </div>
                    </div>
                    <!-- Traveller Details ends-->

                    <div class="py-3"></div>

                    <!-- Traveller Hotel Details -->
                    <div class="my-5 bg-body-secondary">
                        <div class="p-3 py-5 p-md-5 d-flex flex-column justify-content-center align-items-center text-center">
                            <p class="display-6 text-center fw-semibold mb-1 a-color">Do You Need A Hotel Reservation For Each Traveler As Well?</p>
                            <p class="col-lg-8 text-center">Proof of accommodation is mandatory for Schengen visa. We take care of all bookings and cancellations for your visa application needs.</p>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hotelBooking" id="hotelBookingYes" value="yes" checked>
                                    <label class="form-check-label fw-semibold" for="hotelBookingYes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hotelBooking" id="hotelBookingNo" value="no">
                                    <label class="form-check-label fw-semibold" for="hotelBookingNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 align-items-center rounded-3 border shadow-lg my-5" id="travellerHotel">
                        <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                            <h1 class="title display-5">Tourist's Hotel Details</h1>
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">

                                <div class="col">
                                    <label for="hotel-city-location" class="form-label fw-bold fs-6">City/Location*</label>
                                    <input type="text" class="form-control py-3" name="hotel-city-location" placeholder="Ontario">
                                </div>

                                <div class="col">
                                    <label for="hotel-check-in-date" class="form-label fw-bold fs-6">Check-in Date*</label>
                                    <input type="date" class="form-control py-3" name="hotel-check-in-date" >
                                </div>

                                <div class="col">
                                    <label for="hotel-check-out-date" class="form-label fw-bold fs-6">Check-out Date*</label>
                                    <input type="date" class="form-control py-3" name="hotel-check-out-date" >
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Traveller Hotel Details ends-->


                    <!-- Traveller Flight Details -->
                    <div class="my-5 bg-body-secondary">
                        <div class="p-3 py-5 p-md-5 d-flex flex-column justify-content-center align-items-center text-center">
                            <p class="display-6 text-center fw-semibold mb-1 a-color">Do You Need A Flight Booking For Each Traveler As Well?</p>
                            <p class="col-lg-8 text-center">Proof of flight reservation is mandatory for Schengen visa. We take care of all bookings and cancellations for your visa application needs.</p>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flightItinerary" id="flightItineraryYes" value="yes">
                                    <label class="form-check-label fw-semibold" for="flightItineraryYes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flightItinerary" id="flightItineraryNo" value="no" checked>
                                    <label class="form-check-label fw-semibold" for="flightItineraryNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 align-items-center rounded-3 border shadow-lg mt-5 d-none" id="travellerFlight">
                        <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                        <h1 class="title display-5">Tourist's Flight Details</h1>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">
                            
    
                            <div class="col">
                                <label for="flight-departure-date" class="form-label fw-bold fs-6">Departure Date*</label>
                                <input type="date" class="form-control py-3" name="flight-departure-date" >
                            </div>
    
                            <div class="col">
                                <label for="flight-departing-city" class="form-label fw-bold fs-6">Departing City/Airport*</label>
                                <select name="flight-departing-city" class="form-select all-airports py-3" >
                                    <optgroup label="Airport/City">
                                        <option value="" disabled selected></option>
                                        <!-- Options will be populated by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col">
                                <label for="flight-returning-date" class="form-label fw-bold fs-6">Returning Date*</label>
                                <input type="date" class="form-control py-3" name="flight-returning-date" >
                            </div>

                            <div class="col">
                                <label for="flight-returning-city" class="form-label fw-bold fs-6">Returning City/Airport*</label>
                                <select name="flight-returning-city" class="form-select all-airports py-3" >
                                    <optgroup label="Airport/City">
                                        <option value="" disabled selected></option>
                                        <!-- Options will be populated by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                        </div>
                        
                        </div>
                    </div>
                    <!-- Traveller Flight Details ends-->

                    
                    <!-- Traveller Insurance Details -->
                    <div class="my-5 bg-body-secondary">
                        <div class="p-3 py-5 p-md-5 d-flex flex-column justify-content-center align-items-center text-center">
                            <p class="display-6 text-center fw-semibold mb-1 a-color">Do You Need A Travel Medical Insurance As Well?</p>
                            <p class="col-lg-8 text-center">Insurance is mandatory for Schengen visa. We will get you the best insurance($0 deductible, $50,000 coverage) out there for your visa application needs.</p>
                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insuranceRadio" id="insuranceRadio" value="yes">
                                    <label class="form-check-label fw-semibold" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insuranceRadio" id="insuranceRadio" value="no" checked>
                                    <label class="form-check-label fw-semibold" for="inlineRadio2">No</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="p-4 align-items-center rounded-3 border shadow-lg my-5 d-none" id="travellerInsurance">
                        <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                        <h1 class="title display-5">Tourist's Insurance Details</h1>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">

                            <div class="col">
                                <label for="insurance-country-travelling-from" class="form-label fw-bold fs-6">Country Traveling From *</label>
                                <select name="insurance-country-travelling-from" id="" class="form-select py-3 destination" >
                                    <optgroup label="All Countries" class="all-countries">
                                        <!-- Countries will be populated here by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col">
                                <label for="insurance-trip-date-start" class="form-label fw-bold fs-6">Date Your Trip Begins*</label>
                                <input type="date" class="form-control py-3" name="insurance-trip-date-start" >
                            </div>

                            <div class="col">
                                <label for="insurance-trip-date-end" class="form-label fw-bold fs-6">Date Your Trip Ends*</label>
                                <input type="date" class="form-control py-3" name="insurance-trip-date-end" >
                            </div>

                            <div class="col">
                                <label for="insurance-beneficiary-name" class="form-label fw-bold fs-6">Beneficiary Name (Cannot be self)*</label>
                                <input type="text" class="form-control py-3" name="insurance-beneficiary-name" placeholder="Beneficiary Name (Cannot be self)" >
                            </div>

                            <div class="col">
                                <label for="insurance-beneficiary-relationship" class="form-label fw-bold fs-6">Beneficiary Relationship*</label>
                                <select name="insurance-beneficiary-relationship" id="" class="form-select py-3" >
                                    <option value="" class="placeholder" disabled selected>select option...</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Child">Child</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                       
                        </div>
                    </div>
                    <!-- Traveller Insurance Details ends-->

                </div>
                <div class="py-3"></div>
                <div class="my-5 bg-black text-light p-4 py-5 p-md-5 d-flex flex-column justify-content-center align-items-center text-center order-summary">
                    <p class="display-3 title">Order Summary:</p>
                    
                    <div class="price total-price d-flex align-items-center justify-content-between col-12 col-md-11 p-2 py-3 mt-3">
                        <p class="fs-4">Total Payment</p>
                        <p class="s-color fs-3 fw-semibold"></p>
                    </div>
                    <input type="submit" value="Pay Now!" class="btn btn-accent mt-5 px-5 py-3 col-lg-5 col-7 col-md-6">
                </div>

            </form>
        </section>
        <!-- Consultation service end-->
        
        <!-- consultation-service book-now -->
        <section class="consultation-service book-now py-5 d-flex flex-column justify-content-center align-items-center text-center">
            <h2 data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">Struggling with how to apply for Canada visitor visa?</h2>
            <p class="col-md-8" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">Your journey begins when you book an initial consultation on our website. Our immigration consultant then helps complete your checklist for a visitor visa in Canada</p>
            <a href="consultation.php" class="btn btn-accent p-2 px-5" data-aos="zoom-in-up" data-aos-duration="500" data-aos-delay="200">Register Now!</a>
        </section>
        <!-- consultation-service book now ends -->

        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->        

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Get form elements
                const flightRadioButtons = document.querySelectorAll('input[name="flightItinerary"]');
                const hotelRadioButtons = document.querySelectorAll('input[name="hotelBooking"]');
                const insuranceRadioButtons = document.querySelectorAll('input[name="insuranceRadio"]');
                const flightSection = document.getElementById('travellerFlight');
                const hotelSection = document.getElementById('travellerHotel');
                const insuranceSection = document.getElementById('travellerInsurance');
                const totalInput = document.createElement('input');
                totalInput.type = 'hidden';
                totalInput.name = 'totalAmount';
                document.querySelector('form').appendChild(totalInput);

                // Prices and discount rates
                const servicePrices = {
                    flight: 15,
                    hotel: 20,
                    insurance: 20,
                };

                const discountRates = {
                    twoServices: 0.3,
                    allServices: 0.4,
                };

                const totalDisplay = document.querySelector('.total-price .s-color');
                const orderSummaryElement = document.querySelector('.order-summary');
                const form = document.querySelector('form');
                const submitButton = form.querySelector('input[type="submit"]');

                // Toggle section display and enable/disable inputs
                function toggleSection(radioButtons, section) {
                    radioButtons.forEach(radio => {
                        radio.addEventListener('change', function () {
                            if (radio.value === 'yes') {
                                section.classList.remove('d-none');
                                toggleRequired(section, true);
                            } else {
                                section.classList.add('d-none');
                                toggleRequired(section, false);
                            }
                            manageSectionInputs(section, radio.value === 'yes');
                            calculateTotal();
                        });
                    });
                }

                // Toggle required attributes for section inputs
                function toggleRequired(section, isRequired) {
                    const inputs = section.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => {
                        if (isRequired) {
                            input.setAttribute('required', 'required');
                        } else {
                            input.removeAttribute('required');
                        }
                    });
                }

                // Enable or disable section inputs
                function manageSectionInputs(section, isEnabled) {
                    const fields = section.querySelectorAll('input, select');
                    fields.forEach(field => {
                        field.disabled = !isEnabled;
                    });
                }

                // Calculate the total payment and update the order summary
                function calculateTotal() {
                    let selectedServices = [];
                    let summaryHTML = '';
                    let discount = 0;

                    if (flightRadioButtons[0].checked) selectedServices.push('flight');
                    if (hotelRadioButtons[0].checked) selectedServices.push('hotel');
                    if (insuranceRadioButtons[0].checked) selectedServices.push('insurance');

                    let total = selectedServices.reduce((sum, service) => sum + servicePrices[service], 0);

                    // Apply discount if applicable
                    if (selectedServices.length === 2) {
                        discount = total * discountRates.twoServices;
                        total *= 1 - discountRates.twoServices;
                    } else if (selectedServices.length === 3) {
                        discount = total * discountRates.allServices;
                        total *= 1 - discountRates.allServices;
                    }

                    totalInput.value = total.toFixed(2);

                    // Build the summary
                    selectedServices.forEach(service => {
                        summaryHTML += `
                            <div class="price d-flex align-items-center justify-content-between col-12 col-md-11 p-2 py-3">
                                <p class="fs-5">${service.charAt(0).toUpperCase() + service.slice(1)}</p>
                                <p class="s-color fs-4">$${servicePrices[service].toFixed(2)}</p>
                            </div>
                        `;
                    });

                    // Add the discount (if applicable)
                    if (discount > 0) {
                        summaryHTML += `
                            <div class="price d-flex align-items-center justify-content-between col-12 col-md-11 p-2 py-3">
                                <p class="fs-5">Discount (${selectedServices.length === 2 ? '30%' : '40%'})</p>
                                <p class="s-color fs-4 text-danger">-$${discount.toFixed(2)}</p>
                            </div>
                        `;
                    }

                    // Add the total
                    summaryHTML += `
                        <div class="price total-price d-flex align-items-center justify-content-between col-12 col-md-11 p-2 py-3 mt-3">
                            <p class="fs-4">Total Payment</p>
                            <p class="s-color fs-3 fw-semibold">$${total.toFixed(2)}</p>
                        </div>
                    `;

                    // Update the order summary
                    orderSummaryElement.innerHTML = `
                        <p class="display-3 title">Order Summary:</p>
                        ${summaryHTML}
                        <input type="submit" value="Pay Now!" class="btn btn-accent mt-5 px-5 py-3 col-lg-5 col-7 col-md-6">
                    `;
                }

                // Check total on form submission
                form.addEventListener('submit', function (event) {
                    if (parseFloat(totalInput.value) === 0) {
                        event.preventDefault(); // Prevent form submission
                        Swal.fire({
                            icon: 'warning',
                            title: 'Choose a Package',
                            text: 'Please select at least one service to proceed with the payment.',
                            confirmButtonText: 'OK'
                        });
                    }
                });

                // Initialize toggles and calculations
                toggleSection(flightRadioButtons, flightSection);
                toggleSection(hotelRadioButtons, hotelSection);
                toggleSection(insuranceRadioButtons, insuranceSection);
                calculateTotal();
            });
        </script>



    </body>
</html>
