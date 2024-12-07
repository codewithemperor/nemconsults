<?php 
if(isset($_POST['payButton']))
{
    $packageAmount = htmlspecialchars($_POST['packageAmount']);
    $package = htmlspecialchars($_POST['packageInput']);
    $surname = htmlspecialchars($_POST['surname']);
    $otherName = htmlspecialchars($_POST['otherName']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $appointmentDate = htmlspecialchars($_POST['appointmentDate']);
    $address = htmlspecialchars($_POST['address']);
    $addressOutside = htmlspecialchars($_POST['address-outside']);
    $visaRefusal = htmlspecialchars($_POST['visa-refusal']);
    $visaType = htmlspecialchars($_POST['visaType']);
    $details = htmlspecialchars($_POST['textarea']);
    $aboutUs = htmlspecialchars($_POST['about-us']);

    //* Prepare our rave request
    $request = [
        'tx_ref' => time(),
        'amount' => $packageAmount,
        'currency' => 'USD',
        'payment_options' => 'card',
        'redirect_url' => 'http://localhost/nemconsults/include/counsultation-payment-process.php',
        'customer' => [
            'email' => $email,
            'name' => $surname . ' ' . $otherName,
            'phonenumber' => $phoneNumber,
        ],
        'meta' => [
            'packageAmount' => $packageAmount,
            'package' => $package,
            'surname' => $surname,
            'otherName' => $otherName,
            'phoneNumber' => $phoneNumber,
            'email' => $email,
            'appointmentDate' => $appointmentDate,
            'address' => $address,
            'visaValidity' => $addressOutside,
            'visaRefusal' => $visaRefusal,
            'visaType' => $visaType,
            'details' => $details,
            'aboutUs' => $aboutUs,
        ],
        'customizations' => [
            'title' => 'Nemconsults Consultation Service',
            'description' => 'Payment for ' . $package,
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