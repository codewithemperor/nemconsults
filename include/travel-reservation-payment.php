<?php 
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) { // Skip comments
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        putenv(trim($name) . '=' . trim($value));
    }
} else {
    die('.env file not found.');
}

$curl = curl_init();
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $totalAmount = htmlspecialchars($_POST['totalAmount']);
    $travelerFirstName = isset($_POST['traveler-first-name']) ? htmlspecialchars($_POST['traveler-first-name']) : 'null';
    $travelerLastName = isset($_POST['traveler-last-name']) ? htmlspecialchars($_POST['traveler-last-name']) : 'null';
    $travelerDeliveryEmail = isset($_POST['traveler-delivery-email']) ? htmlspecialchars($_POST['traveler-delivery-email']) : 'null';
    $travelerPhoneNumber = isset($_POST['traveler-phone-number']) ? htmlspecialchars($_POST['traveler-phone-number']) : 'null';
    $travelerPassportNumber = isset($_POST['traveler-passport-number']) ? htmlspecialchars($_POST['traveler-passport-number']) : 'null';
    $travelerDob = isset($_POST['traveler-dob']) ? htmlspecialchars($_POST['traveler-dob']) : 'null';
    $travelerCitizenshipCountry = isset($_POST['traveler-citizenship-country']) ? htmlspecialchars($_POST['traveler-citizenship-country']) : 'null';
    $travelerGender = isset($_POST['traveler-gender']) ? htmlspecialchars($_POST['traveler-gender']) : 'null';
    $travelerCityResidence = isset($_POST['traveler-city-residence']) ? htmlspecialchars($_POST['traveler-city-residence']) : 'null';
    $travelerResidenceAddress = isset($_POST['traveler-residence-address']) ? htmlspecialchars($_POST['traveler-residence-address']) : 'null';
    $travelerPostalCode = isset($_POST['traveler-postal-code']) ? htmlspecialchars($_POST['traveler-postal-code']) : 'null';
    $travelerInterviewDate = isset($_POST['traveler-interview-date']) ? htmlspecialchars($_POST['traveler-interview-date']) : 'null';
    $travelerCountryApplyingTo = isset($_POST['traveller-country-applying-to']) ? htmlspecialchars($_POST['traveller-country-applying-to']) : 'null';
    $referral = isset($_POST['referral']) ? htmlspecialchars($_POST['referral']) : 'null';
    $flightItinerary = isset($_POST['flightItinerary']) ? htmlspecialchars($_POST['flightItinerary']) : 'null';
    $flightDepartureDate = isset($_POST['flight-departure-date']) ? htmlspecialchars($_POST['flight-departure-date']) : 'null';
    $flightDepartingCity = isset($_POST['flight-departing-city']) ? htmlspecialchars($_POST['flight-departing-city']) : 'null';
    $flightReturningDate = isset($_POST['flight-returning-date']) ? htmlspecialchars($_POST['flight-returning-date']) : 'null';
    $flightReturningCity = isset($_POST['flight-returning-city']) ? htmlspecialchars($_POST['flight-returning-city']) : 'null';
    $hotelBooking = isset($_POST['hotelBooking']) ? htmlspecialchars($_POST['hotelBooking']) : 'null';
    $hotelCityLocation = isset($_POST['hotel-city-location']) ? htmlspecialchars($_POST['hotel-city-location']) : 'null';
    $hotelCheckInDate = isset($_POST['hotel-check-in-date']) ? htmlspecialchars($_POST['hotel-check-in-date']) : 'null';
    $hotelCheckOutDate = isset($_POST['hotel-check-out-date']) ? htmlspecialchars($_POST['hotel-check-out-date']) : 'null';
    $insuranceRadio = isset($_POST['insuranceRadio']) ? htmlspecialchars($_POST['insuranceRadio']) : 'null';
    $insuranceCountryTravelingFrom = isset($_POST['insurance-country-travelling-from']) ? htmlspecialchars($_POST['insurance-country-travelling-from']) : 'null';
    $insuranceTripDateStart = isset($_POST['insurance-trip-date-start']) ? htmlspecialchars($_POST['insurance-trip-date-start']) : 'null';
    $insuranceTripDateEnd = isset($_POST['insurance-trip-date-end']) ? htmlspecialchars($_POST['insurance-trip-date-end']) : 'null';
    $insuranceBeneficiaryName = isset($_POST['insurance-beneficiary-name']) ? htmlspecialchars($_POST['insurance-beneficiary-name']) : 'null';
    $insuranceBeneficiaryRelationship = isset($_POST['insurance-beneficiary-relationship']) ? htmlspecialchars($_POST['insurance-beneficiary-relationship']) : 'null';


    //Common metadata
    $metaData = [
        'totalAmount' => $totalAmount,
        'travelerFirstName' => $travelerFirstName,
        'travelerLastName' => $travelerLastName,
        'travelerDeliveryEmail' => $travelerDeliveryEmail,
        'travelerPhoneNumber' => $travelerPhoneNumber,
        'travelerPassportNumber' => $travelerPassportNumber,
        'travelerDob' => $travelerDob,
        'travelerCitizenshipCountry' => $travelerCitizenshipCountry,
        'travelerGender' => $travelerGender,
        'travelerCityResidence' => $travelerCityResidence,
        'travelerResidenceAddress' => $travelerResidenceAddress,
        'travelerPostalCode' => $travelerPostalCode,
        'travelerInterviewDate' => $travelerInterviewDate,
        'travelerCountryApplyingTo' => $travelerCountryApplyingTo,
        'referral' => $referral,
        'flightItinerary' => $flightItinerary,
        'flightDepartureDate' => $flightDepartureDate,
        'flightDepartingCity' => $flightDepartingCity,
        'flightReturningDate' => $flightReturningDate,
        'flightReturningCity' => $flightReturningCity,
        'hotelBooking' => $hotelBooking,
        'hotelCityLocation' => $hotelCityLocation,
        'hotelCheckInDate' => $hotelCheckInDate,
        'hotelCheckOutDate' => $hotelCheckOutDate,
        'insuranceRadio' => $insuranceRadio,
        'insuranceCountryTravelingFrom' => $insuranceCountryTravelingFrom,
        'insuranceTripDateStart' => $insuranceTripDateStart,
        'insuranceTripDateEnd' => $insuranceTripDateEnd,
        'insuranceBeneficiaryName' => $insuranceBeneficiaryName,
        'insuranceBeneficiaryRelationship' => $insuranceBeneficiaryRelationship,
    ];

    if($gatewayType === 'paystack') {
        // Paystack Configuration
        $secret_key = trim(getenv('PAYSTACK_SECRET_KEY'));
        

        // Validate secret key
        if (empty($secret_key)) {
            die("Paystack secret key is missing. Please check your .env file.");
        }
        $data = [
            'email' => $email,
            'amount' => $packageAmountNaira * 100, 
            'currency' => 'NGN',
            'reference' => 'nemc_'.time(),
            'callback_url' => 'https://nemconsults.com/include/reservation-payment-process.php',
            'metadata' => $metaData,
            'custom_fields' => [
                [
                    'display_name' => 'Nemconsults',
                    'variable_name' => 'Payment for Travel Reservation',
                    'value' => $surname.' '.$otherName
                ]
            ]
        ];

        
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.paystack.co/transaction/initialize',
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer ".$secret_key,
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => json_encode($data)
        ]);
    } else {
        // Flutterwave Configuration (default)
        $request = [
            'tx_ref' => time(),
            'amount' => $packageAmount,
            'currency' => 'USD',
            'payment_options' => 'card',
            'redirect_url' => 'https://nemconsults.com/include/reservation-payment-process.php',
            'customer' => [
                'email' => $email,
                'name' => $surname . ' ' . $otherName,
                'phonenumber' => $phoneNumber,
            ],
            'meta' => $metaData,
            'customizations' => [
                'title' => 'Nemconsults Consultation Service',
                'description' => 'Payment for ' . $package,
            ]
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.getenv('FLUTTERWAVE_SECRET_KEY'),
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => json_encode($request)
        ]);
    }

    // Common cURL options
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ]);

    $response = curl_exec($curl);
    $res = json_decode($response);
    
    // Handle response
    if($gatewayType === 'paystack') {
        if($res->status === true) {
            header('Location: ' . $res->data->authorization_url);
            exit;
        }
    } else {
        if($res->status === 'success') {
            header('Location: ' . $res->data->link);
            exit;
        }
    }

    // Error handling
    echo 'Payment processing failed: ';
    echo '<pre>' . htmlspecialchars(print_r($res, true)) . '</pre>';
    curl_close($curl);

    
    
}
