<?php
    include_once 'db.php'; 
    require 'header.php'; 
    require_once 'vendor/phpmailer/src/PHPMailer.php';
    require_once 'vendor/phpmailer/src/SMTP.php';
    require_once 'vendor/phpmailer/src/Exception.php';

    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            header("Location: ../cancelled.php?type=reservation");
            exit(); 
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];
            $secret_key = getenv('SECRET_KEY');

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  'Authorization: Bearer ' .$secret_key 
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
              
              $res = json_decode($response);
            // echo '<pre>';
            // echo json_encode($res, JSON_PRETTY_PRINT); // Convert the object back to JSON
            // echo '</pre>';
            if($res->status) {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->totalAmount;

                if($amountPaid >= $amountToPay) {
                    // Extract payment details
                    $totalAmount = $res->data->meta->totalAmount ?? 'null';
                    $travelerFirstName = $res->data->meta->travelerFirstName ?? 'null';
                    $travelerLastName = $res->data->meta->travelerLastName ?? 'null';
                    $travelerDeliveryEmail = $res->data->meta->travelerDeliveryEmail ?? 'null';
                    $travelerPhoneNumber = $res->data->meta->travelerPhoneNumber ?? 'null';
                    $travelerPassportNumber = $res->data->meta->travelerPassportNumber ?? 'null';
                    $travelerDob = $res->data->meta->travelerDob ?? 'null';
                    $travelerCitizenshipCountry = $res->data->meta->travelerCitizenshipCountry ?? 'null';
                    $travelerGender = $res->data->meta->travelerGender ?? 'null';
                    $travelerCityResidence = $res->data->meta->travelerCityResidence ?? 'null';
                    $travelerResidenceAddress = $res->data->meta->travelerResidenceAddress ?? 'null';
                    $travelerPostalCode = $res->data->meta->travelerPostalCode ?? 'null';
                    $travelerInterviewDate = $res->data->meta->travelerInterviewDate ?? 'null';
                    $travelerCountryApplyingTo = $res->data->meta->travelerCountryApplyingTo ?? 'null';
                    $referral = $res->data->meta->referral ?? 'null';

                    $flightItinerary = $res->data->meta->flightItinerary ?? 'null';
                    $flightDepartureDate = $res->data->meta->flightDepartureDate ?? 'null';
                    $flightDepartingCity = $res->data->meta->flightDepartingCity ?? 'null';
                    $flightReturningDate = $res->data->meta->flightReturningDate ?? 'null';
                    $flightReturningCity = $res->data->meta->flightReturningCity ?? 'null';

                    $hotelBooking = $res->data->meta->hotelBooking ?? 'null';
                    $hotelCityLocation = $res->data->meta->hotelCityLocation ?? 'null';
                    $hotelCheckInDate = $res->data->meta->hotelCheckInDate ?? 'null';
                    $hotelCheckOutDate = $res->data->meta->hotelCheckOutDate ?? 'null';

                    $insuranceRadio = $res->data->meta->insuranceRadio ?? 'null';
                    $insuranceCountryTravelingFrom = $res->data->meta->insuranceCountryTravelingFrom ?? 'null';
                    $insuranceTripDateStart = $res->data->meta->insuranceTripDateStart ?? 'null';
                    $insuranceTripDateEnd = $res->data->meta->insuranceTripDateEnd ?? 'null';
                    $insuranceBeneficiaryName = $res->data->meta->insuranceBeneficiaryName ?? 'null';
                    $insuranceBeneficiaryRelationship = $res->data->meta->insuranceBeneficiaryRelationship ?? 'null';
                    $paymentStatus = 'Successful';
                    $paymentGateway = 'Flutterwave';

                    $sqlTraveler = "INSERT INTO traveler_details (first_name, last_name, email, phone_number, passport_number, dob, citizenship_country, gender, city_residence, address, postal_code, interview_date, applying_embassy, referral, amount_paid, payment_status, payment_gateway) 
                    VALUES ('$travelerFirstName', '$travelerLastName', '$travelerDeliveryEmail', '$travelerPhoneNumber', '$travelerPassportNumber', '$travelerDob', '$travelerCitizenshipCountry', '$travelerGender', '$travelerCityResidence', '$travelerResidenceAddress', '$travelerPostalCode', '$travelerInterviewDate', '$travelerCountryApplyingTo', '$referral', '$totalAmount', '$paymentStatus', '$paymentGateway')";

                    if ($conn->query($sqlTraveler) === TRUE) {
                    $travelerId = $conn->insert_id;

                        if ($flightItinerary == 'yes') {

                            $sqlFlight = "INSERT INTO flight_details (traveler_id, departure_date, departing_city, returning_date, returning_city) 
                                        VALUES ('$travelerId', '$flightDepartureDate', '$flightDepartingCity', '$flightReturningDate', '$flightReturningCity')";

                            if (!$conn->query($sqlFlight)) {
                                echo "Error inserting flight details: " . $conn->error;
                            }
                        }

                        if ($hotelBooking == 'yes') {

                            $sqlHotel = "INSERT INTO hotel_details (traveler_id, city_location, check_in_date, check_out_date) 
                                        VALUES ('$travelerId', '$hotelCityLocation', '$hotelCheckInDate', '$hotelCheckOutDate')";

                            if (!$conn->query($sqlHotel)) {
                                echo "Error inserting hotel details: " . $conn->error;
                            }
                        }

                        if ($insuranceRadio == 'yes') {

                            $sqlInsurance = "INSERT INTO insurance_details (traveler_id, country_traveling_from, trip_start_date, trip_end_date, beneficiary_name, beneficiary_relationship) 
                                            VALUES ('$travelerId', '$insuranceCountryTravelingFrom', '$insuranceTripDateStart', '$insuranceTripDateEnd', '$insuranceBeneficiaryName', '$insuranceBeneficiaryRelationship')";

                            if (!$conn->query($sqlInsurance)) {
                                echo "Error inserting insurance details: " . $conn->error;
                            }
                        }

                        try {
                            $mail = new PHPMailer(true);
                            // Server settings
                            $smtp_user = getenv('SMTP_USER');
                            $smtp_pass = getenv('SMTP_PASS');
                            $smtp_host = getenv('SMTP_HOST');

                            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                            $mail->isSMTP();                                            
                            $mail->Host       = $smtp_host;          
                            $mail->SMTPAuth   = true;                
                            $mail->Username   = $smtp_user;          
                            $mail->Password   = $smtp_pass;          
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mail->Port       = 465;                        
                            $mail->SMTPDebug = 0; 


                            // Recipients
                            $mail->setFrom('info@nemconsults.com', 'Nemconsults');
                            $mail->addAddress('info@nemconsults.com', 'Nemconsults');          // Add a recipient

                            // Content
                            $mail->isHTML(true); // Set email format to HTML
                            $mail->Subject = 'New Payment for Consultation Service from' . $travelerDeliveryEmail;

                            // HTML email content
                            $mail->Body = '
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <style>
                                    * {
                                        box-sizing: border-box;
                                    }
                                    body {
                                        font-family: Arial, sans-serif;
                                        background-color: #afeaae;
                                        margin: 0;
                                        padding: 30px 0;
                                    }
                                    .container {
                                        max-width: 600px;
                                        margin: 0 auto;
                                        background-color: #fff;
                                        padding: 20px;
                                        border-radius: 10px;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    }
                                    .email-header {
                                        text-align: center;
                                        padding-bottom: 20px;
                                        border-bottom: 1px solid #ddd;
                                    }
                                    .email-header img {
                                        max-width: 250px;
                                    }
                                    .email-content {
                                        padding: 20px 0;
                                    }
                                    .email-content h2, h4 {
                                        color: #32cd30;
                                    }
                                    .email-content p {
                                        line-height: 1.6;
                                        font-size: 16px;
                                        color: #555;
                                    }
                                    .email-content b {
                                        color: #333;
                                    }
                                    .email-footer {
                                        text-align: center;
                                        font-size: 12px;
                                        color: #aaa;
                                        border-top: 1px solid #ddd;
                                        padding-top: 10px;
                                        margin-top: 20px;
                                    }
                                    .custom-table {
                                        border-collapse: collapse;
                                        width: 100%;
                                        margin-bottom: 10px
                                    }
                                    .custom-table th, .custom-table td {
                                        border: 1px solid #000;
                                        padding: 8px;
                                        text-align: left;
                                    }
                                    .custom-table th {
                                        background-color: #d4edda;
                                        font-weight: bold;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class="container p-3">
                                    <div class="email-header">
                                        <img src="https://nemconsults.com/images//logo-transparent.png" alt="Company Logo">
                                    </div>
                                    <div class="email-content text-center">
                                        <h2 class="s-color">New Payment for Consultation Service Received</h2>
                                        <p>You have received a new payment with the following details:</p>
                                        <table class="custom-table">
                                            <tr>
                                                <th>First Name</th>
                                                <td>' . $travelerFirstName . '</td>
                                            </tr>
                                            <tr>
                                                <th>Last Name</th>
                                                <td>' . $travelerLastName . '</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>' . $travelerDeliveryEmail . '</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td>' . $travelerPhoneNumber . '</td>
                                            </tr>
                                            <tr>
                                                <th>Passport Number</th>
                                                <td>' . $travelerPassportNumber . '</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>' . $travelerDob . '</td>
                                            </tr>
                                            <tr>
                                                <th>Citizenship Country</th>
                                                <td>' . $travelerCitizenshipCountry . '</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>' . $travelerGender . '</td>
                                            </tr>
                                            <tr>
                                                <th>City of Residence</th>
                                                <td>' . $travelerCityResidence . '</td>
                                            </tr>
                                            <tr>
                                                <th>Residence Address</th>
                                                <td>' . $travelerResidenceAddress . '</td>
                                            </tr>
                                            <tr>
                                                <th>Postal Code</th>
                                                <td>' . $travelerPostalCode . '</td>
                                            </tr>
                                            <tr>
                                                <th>Visa Interview Date</th>
                                                <td>' . $travelerInterviewDate . '</td>
                                            </tr>
                                            <tr>
                                                <th>Embassy Applying To</th>
                                                <td>' . $travelerCountryApplyingTo . '</td>
                                            </tr>
                                            <tr>
                                                <th>Amount Paid</th>
                                                <td>$' . $totalAmount . '</td>
                                            </tr>
                                            <tr>
                                                <th>Payment Status</th>
                                                <td>' . $paymentStatus . '</td>
                                            </tr>
                                        </table>';

                                        // Add flight itinerary if applicable
                                        if ($flightItinerary == 'yes') {
                                            $mail->Body .= '
                                            <h4>Flight Itinerary Details</h4>
                                            <table class="custom-table">
                                                <tr>
                                                    <th>Departure Date</th>
                                                    <td>' . $flightDepartureDate . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Departing City</th>
                                                    <td>' . $flightDepartingCity . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Returning Date</th>
                                                    <td>' . $flightReturningDate . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Returning City</th>
                                                    <td>' . $flightReturningCity . '</td>
                                                </tr>
                                            </table>';
                                        }

                                        // Add hotel booking details if applicable
                                        if ($hotelBooking == 'yes') {
                                            $mail->Body .= '
                                            <h4>Hotel Booking Details</h4>
                                            <table class="custom-table">
                                                <tr>
                                                    <th>City Location</th>
                                                    <td>' . $hotelCityLocation . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Check-In Date</th>
                                                    <td>' . $hotelCheckInDate . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Check-Out Date</th>
                                                    <td>' . $hotelCheckOutDate . '</td>
                                                </tr>
                                            </table>';
                                        }

                                        // Add insurance details if applicable
                                        if ($insuranceRadio == 'yes') {
                                            $mail->Body .= '
                                            <h4>Insurance Details</h4>
                                            <table class="custom-table">
                                                <tr>
                                                    <th>Country Traveling From</th>
                                                    <td>' . $insuranceCountryTravelingFrom . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Trip Start Date</th>
                                                    <td>' . $insuranceTripDateStart . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Trip End Date</th>
                                                    <td>' . $insuranceTripDateEnd . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Beneficiary Name</th>
                                                    <td>' . $insuranceBeneficiaryName . '</td>
                                                </tr>
                                                <tr>
                                                    <th>Beneficiary Relationship</th>
                                                    <td>' . $insuranceBeneficiaryRelationship . '</td>
                                                </tr>
                                            </table>';
                                        }

                            $mail->Body .= '
                                    </div>
                                    <div class="email-footer">
                                        &copy; ' . date('Y') . ' Nemconsults. All rights reserved.
                                    </div>
                                </div>
                            </body>
                            </html>';


                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            $mail->send();

                            // Now configure the PHPMailer instance to send the email to the user
                            $mail->clearAddresses();
                            $mail->addAddress($travelerDeliveryEmail, $travelerFirstName . ' ' . $travelerLastName);          // User's email address
                            $mail->addReplyTo('info@nemconsults.com', 'Nemconsults');

                            // Content
                            $mail->isHTML(true); // Set email format to HTML
                            $mail->Subject = 'Thank you for your payment - Nemconsults';
                            $mail->Body = '
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <style>
                                    * {
                                        box-sizing: border-box;
                                    }
                                    body {
                                        font-family: Arial, sans-serif;
                                        background-color: #afeaae;
                                        margin: 0;
                                        padding: 30px 0;
                                    }
                                    .container {
                                        max-width: 600px;
                                        margin: 0 auto;
                                        background-color: #fff;
                                        padding: 20px;
                                        border-radius: 10px;
                                        border: 1px solid #ddd;
                                    }
                                    .email-header {
                                        text-align: center;
                                        padding-bottom: 20px;
                                        border-bottom: 1px solid #ddd;
                                    }
                                    .email-header img {
                                        max-width: 250px;
                                    }
                                    .email-content {
                                        padding: 20px 0;
                                        text-align: center;
                                    }
                                    .email-content h2 {
                                        color: #32cd30;
                                    }
                                    .email-content p {
                                        line-height: 1.6;
                                        font-size: 16px;
                                        color: #555;
                                    }
                                    .email-footer {
                                        text-align: center;
                                        font-size: 12px;
                                        color: #32cd30;
                                        border-top: 1px solid #ddd;
                                        padding-top: 10px;
                                        margin-top: 20px;
                                    }
                                    .btn {
                                        background-color: #32cd30;
                                        color: #fff;
                                        text-decoration: none;
                                        border-radius: 8px;
                                        padding: 10px 16px;
                                        display: inline-block;
                                        font-size: 18px;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class="container">
                                    <div class="email-header">
                                        <img src="https://nemconsults.com/images/logo-transparent.png" alt="Company Logo">
                                    </div>
                                    <div class="email-content">
                                        <h2>Thank you for your payment, ' . $travelerFirstName . ' ' . $travelerLastName . '!</h2>
                                        <p>We have received your payment and will get back to you shortly.</p>
                                        <p>In the meantime, feel free to explore our other services:</p>
                                        <a href="https://nemconsults.com/travel-reservations.php" class="btn">Learn More</a>
                                    </div>
                                    <div class="email-footer">
                                        <p>&copy; ' . date('Y') . ' Nemconsults. All rights reserved.</p>
                                    </div>
                                </div>
                            </body>
                            </html>
                        ';
        
                            $mail->send();
        
                            // Custom email content for the user
                            
                            header("Location: ../success.php");
                            exit(); 

                        } catch (Exception $e) {
                            echo "<div class='alert alert-danger' role='alert'>Message could not be sent. </div>";
                        }
                
                    
                    }


                   
                }
                else
                {
                    echo "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Fraudulent Transaction',
                        text: 'The amount paid does not match the expected amount.',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'conntact.php';
                        }
                    });
                    </script>
                    ";

                }
              }
              else
              {
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Failed',
                    text: 'We could not process your payment. Please try again later.',
                    confirmButtonText: 'OK'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'consultation.php';
                    }
                });
                </script>
                ";

              }
             
        }
    }
