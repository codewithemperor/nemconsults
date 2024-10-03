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
            <form action="">
                <div class="container my-3 px-4 px-lg-0">

                    <!-- Traveller Details -->
                    <div class="p-4 align-items-center rounded-3 border shadow-lg" id="travellerDetails">
                    <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                        <h1 class="title display-5">Traveller Details</h1>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">

                            <div class="col-lg-6">
                                <label for="tFirstName" class="form-label fw-bold fs-6">Traveler 1 First Name (Should match passport)*</label>
                                <input type="text" class="form-control py-3" name="tFirstName" placeholder="First Name" required>
                            </div>

                            <div class="col-lg-6">
                                <label for="tLastName" class="form-label fw-bold fs-6">Tourist 1 Last Name (Match with passport)*</label>
                                <input type="text" class="form-control py-3" name="tLastName" placeholder="Last Name" required>
                            </div>
                            
                            <div class="col">
                                <label for="deliveryEmail" class="form-label fw-bold fs-6">Delivery Email*</label>
                                <input type="email" class="form-control py-3" name="deliveryEmail" placeholder="example@mail.com" required>
                            </div>

                            <div class="col">
                                <label for="phoneNumber" class="form-label fw-bold fs-6">Phone Number*</label>
                                <input type="number" class="form-control py-3" name="phoneNumber" placeholder="country code + Phone Number" required>
                            </div>                      

                            <div class="col">
                                <label for="interviewDate" class="form-label fw-bold fs-6">Visa Interview Date*</label>
                                <input type="date" class="form-control py-3" name="interviewDate" required>
                            </div>

                            <div class="col">
                                <label for="destination" class="form-label fw-bold fs-6">Applying At which Embassy?*</label>
                                <select name="country-applying-to" class="form-select py-3 destination" required>
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
                    <div class="p-4 align-items-center rounded-3 border shadow-lg my-5" id="travellerHotel">
                        <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                            <h1 class="title display-5">Tourist's Hotel Details</h1>
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">
                            
    
                                <div class="col">
                                    <label for="hotelNumber" class="form-label fw-bold fs-6">No. Of Hotels*</label>
                                    <select name="hotelNumber" id="" class="form-select py-3" required>
                                        <option value="" class="placeholder" disabled selected>select option...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                    <span class="text-danger ps-1 text-center" style="font-size: .7rem; line-height: 9px;">(Upto 3 hotels only. Additional hotels @ $10/hotel. Max stay upto 3 weeks/hotel)</span>
                                </div>

                                <div class="col">
                                    <label for="hotelCityLocation" class="form-label fw-bold fs-6">City/Location*</label>
                                    <select name="hotelCityLocation" class="form-select all-cities py-3" required>
                                        <optgroup label="City/Country">
                                            <option value="" disabled selected>Please wait, loading...</option> 
                                            <!-- Options will be populated by JavaScript -->
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="hotel-check-in-date" class="form-label fw-bold fs-6">Check-in Date*</label>
                                    <input type="date" class="form-control py-3" name="hotel-check-in-date" required>
                                </div>

                                <div class="col">
                                    <label for="hotel-check-out-date" class="form-label fw-bold fs-6">Check-out Date*</label>
                                    <input type="date" class="form-control py-3" name="hotel-check-out-date" required>
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

                    <div class="p-4 align-items-center rounded-3 border shadow-lg mt-5" id="travellerFlight">
                        <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                        <h1 class="title display-5">Tourist's Flight Details</h1>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">
                            
    
                            <div class="col">
                                <label for="departureDate" class="form-label fw-bold fs-6">Departure Date*</label>
                                <input type="date" class="form-control py-3" name="departureDate" required>
                            </div>
    
                            <div class="col">
                                <label for="departingCity" class="form-label fw-bold fs-6">Departing City/Airport*</label>
                                <select name="departingCity" class="form-select all-airports py-3" required>
                                    <optgroup label="Airport/City">
                                        <option value="" disabled selected></option>
                                        <!-- Options will be populated by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col">
                                <label for="returningDate" class="form-label fw-bold fs-6">Returning Date*</label>
                                <input type="date" class="form-control py-3" name="returningDate" required>
                            </div>

                            <div class="col">
                                <label for="returningCity" class="form-label fw-bold fs-6">Returning City/Airport*</label>
                                <select name="returningCity" class="form-select all-airports py-3" required>
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
                    
                    <div class="p-4 align-items-center rounded-3 border shadow-lg my-5" id="travellerInsurance">
                        <div class="col p-1 pb-4 p-lg-5 py-lg-4">
                        <h1 class="title display-5">Tourist's Insurance Details</h1>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4 mt-3">

                            <div class="col">
                                <label for="country-travelling-from" class="form-label fw-bold fs-6">Country Traveling From *</label>
                                <select name="country-travelling-from" id="" class="form-select py-3 destination" required>
                                    <optgroup label="All Countries" class="all-countries">
                                        <!-- Countries will be populated here by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col">
                                <label for="trip-date-start" class="form-label fw-bold fs-6">Date Your Trip Begins*</label>
                                <input type="date" class="form-control py-3" name="trip-date-start" required>
                            </div>

                            <div class="col">
                                <label for="trip-date-end" class="form-label fw-bold fs-6">Date Your Trip Ends*</label>
                                <input type="date" class="form-control py-3" name="trip-date-end" required>
                            </div>

                            <div class="col">
                                <label for="passportNumber" class="form-label fw-bold fs-6">Passport Number*</label>
                                <input type="number" class="form-control py-3" name="passportNumber" placeholder="International Passport Number" required>
                            </div>

                            <div class="col">
                                <label for="travelAge" class="form-label fw-bold fs-6">Traveler Age*</label>
                                <input type="number" class="form-control py-3" name="travelAge" placeholder="Traveler Age" required>
                            </div>

                            <div class="col">
                                <label for="gender" class="form-label fw-bold fs-6">Gender*</label>
                                <select name="gender" id="" class="form-select py-3" required>
                                    <option value="" class="placeholder" disabled selected>select option...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="dob" class="form-label fw-bold fs-6">Date Of Birth (Should match passport)*</label>
                                <input type="date" class="form-control py-3" name="dob" required>
                            </div>

                            <div class="col">
                                <label for="citizenshipCountry" class="form-label fw-bold fs-6">Country of Citizenship*</label>
                                <select name="citizenshipCountry" id="" class="form-select py-3 destination" required>
                                    <optgroup label="All Countries" class="all-countries">
                                        <!-- Countries will be populated here by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col">
                                <label for="cityResidence" class="form-label fw-bold fs-6">City Of Residence*</label>
                                <select name="cityResidence" class="form-select all-cities py-3" required>
                                    <optgroup label="City/Country">
                                        <option value="" disabled selected>Please wait, loading...</option> 
                                        <!-- Options will be populated by JavaScript -->
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col-lg-8">
                                <label for="residenceAddress" class="form-label fw-bold fs-6">Residence Address*</label>
                                <input type="text" class="form-control py-3" name="residenceAddress" placeholder="Residence Address" required>
                            </div>

                            <div class="col">
                                <label for="postalCode" class="form-label fw-bold fs-6">Postal Code*</label>
                                <input type="number" class="form-control py-3" name="postalCode" placeholder="327921" required>
                            </div>

                            <div class="col">
                                <label for="BeneficiaryName" class="form-label fw-bold fs-6">Beneficiary Name (Cannot be self)*</label>
                                <input type="text" class="form-control py-3" name="BeneficiaryName" placeholder="Beneficiary Name (Cannot be self)" required>
                            </div>

                            <div class="col">
                                <label for="beneficiaryRelationship" class="form-label fw-bold fs-6">Beneficiary Relationship*</label>
                                <select name="beneficiaryRelationship" id="" class="form-select py-3" required>
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
                    <!-- Flight Price -->
                    <div class="price d-flex align-items-center justify-content-between col-12 col-md-11 p-2 py-3" data-label="Hotel Reservation">
                        <p class="fs-5">Hotel Reservation</p>
                        <p class="s-color fs-4">$20.00</p>
                    </div>
                    <!-- Total Payment -->
                    <div class="price total-price d-flex align-items-center justify-content-between col-12 col-md-11 p-2 py-3 mt-3">
                        <p class="fs-4">Total Payment</p>
                        <p class="s-color fs-3 fw-semibold">$20.00</p>
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

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Elements
                const flightItineraryRadios = document.querySelectorAll("input[name='flightItinerary']");
                const flightDetailsSection = document.getElementById("travellerFlight");
                const insuranceBookingRadios = document.querySelectorAll("input[name='insuranceRadio']");
                const insuranceDetailsSection = document.getElementById("travellerInsurance");
                const orderSummary = document.querySelector(".order-summary");
        
                // Prices
                const flightPrice = 15;
                const hotelPrice = 20;
                const insurancePrice = 20;
        
                // Initial setup - Hide hotel and insurance details if "No" is selected
                flightItineraryRadios.forEach(radio => {
                    if (radio.checked && radio.value === "no") {
                        toggleVisibility(flightDetailsSection, false);
                    }
                    radio.addEventListener("change", handleflightItineraryChange);
                });
        
                insuranceBookingRadios.forEach(radio => {
                    if (radio.checked && radio.value === "no") {
                        toggleVisibility(insuranceDetailsSection, false);
                    }
                    radio.addEventListener("change", handleInsuranceBookingChange);
                });
        
                function handleflightItineraryChange(event) {
                    if (event.target.value === "yes") {
                        toggleVisibility(flightDetailsSection, true);
                        addPriceToSummary("Flight Intinerary", flightPrice);
                    } else {
                        toggleVisibility(flightDetailsSection, false);
                        removePriceFromSummary("Flight Intinerary");
                    }
                    updateTotalPrice();
                }
        
                function handleInsuranceBookingChange(event) {
                    if (event.target.value === "yes") {
                        toggleVisibility(insuranceDetailsSection, true);
                        addPriceToSummary("Insurance", insurancePrice);
                    } else {
                        toggleVisibility(insuranceDetailsSection, false);
                        removePriceFromSummary("Insurance");
                    }
                    updateTotalPrice();
                }
        
                function toggleVisibility(element, isVisible) {
                    if (isVisible) {
                        element.style.display = "block";
                        element.querySelectorAll("input, select").forEach(input => input.required = true);
                    } else {
                        element.style.display = "none";
                        element.querySelectorAll("input, select").forEach(input => input.required = false);
                    }
                }
        
                function addPriceToSummary(label, price) {
                    let priceDiv = document.querySelector(`.price[data-label="${label}"]`);
                    if (!priceDiv) {
                        priceDiv = document.createElement("div");
                        priceDiv.classList.add("price", "d-flex", "align-items-center", "justify-content-between", "col-12", "col-md-11", "p-2", "py-3");
                        priceDiv.dataset.label = label;
                        priceDiv.innerHTML = `<p class="fs-5">${label}</p><p class="s-color fs-4">$${price.toFixed(2)}</p>`;
                        orderSummary.insertBefore(priceDiv, orderSummary.querySelector(".total-price"));
                    }
                }
        
                function removePriceFromSummary(label) {
                    const priceDiv = document.querySelector(`.price[data-label="${label}"]`);
                    if (priceDiv) {
                        priceDiv.remove();
                    }
                }
        
                function updateTotalPrice() {
                    let totalPrice = 0;
                    const priceDivs = document.querySelectorAll(".order-summary .price:not(.total-price)");
                
                    // Sum up all visible prices shown in the order summary
                    priceDivs.forEach(priceDiv => {
                        const price = parseFloat(priceDiv.querySelector(".s-color").textContent.replace("$", ""));
                        totalPrice += price;
                    });
        
                    let totalPriceDiv = document.querySelector(".order-summary .total-price");
                    totalPriceDiv.querySelector(".s-color").textContent = `$${totalPrice.toFixed(2)}`;
                }
        
                // Initial total price calculation
                addPriceToSummary("Hotel Reservation", hotelPrice); // Always add flight price at the beginning
                updateTotalPrice();
            });
        </script>
        
        
        
        


    </body>
</html>
