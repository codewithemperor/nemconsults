<?php 
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



    //* Prepare our rave request
    $request = [
        'tx_ref' => time(),
        'amount' => $totalAmount,
        'currency' => 'USD',
        'payment_options' => 'card',
        'redirect_url' => 'https://nemconsults.com/include/reservation-payment-process.php',
        'customer' => [
            'email' => $travelerDeliveryEmail,
            'name' => $travelerFirstName . ' ' . $travelerLastName,
            'phonenumber' => $travelerPhoneNumber,
        ],
        'meta' => [
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
        ],
        'customizations' => [
            'title' => 'Nemconsults',
            'description' => 'Payment for Travel Reservation',
        ]
    ];

    $secret_key = getenv('SECRET_KEY');

    //* Ca;; f;iterwave emdpoint
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' .$secret_key,
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    
    $res = json_decode($response);
    // echo '<pre>';
    // echo json_encode($res, JSON_PRETTY_PRINT); // Convert the object back to JSON
    // echo '</pre>';

    if($res->status == 'success')
    {
        $link = $res->data->link;
        header('Location: '.$link);
    }
    else
    {
        echo 'We can not process your payment';
    }
}

?>