<?php 
// Load .env file manually
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
if(isset($_POST['payButton']))
{
    // Common form data sanitization
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
    $gatewayType = $_POST['gatewayType'] ?? 'flutterwave'; // Default to Flutterwave
    $packageAmountNaira = 10;

    // Common metadata
    $metaData = [
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
            'amount' => $packageAmountNaira, 
            'currency' => 'NGN',
            'reference' => 'nemc_'.time(),
            'callback_url' => 'https://nemconsults.com/include/counsultation-payment-process.php',
            'metadata' => $metaData,
            'custom_fields' => [
                [
                    'display_name' => 'Customer Name',
                    'variable_name' => 'customer_name',
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
            'redirect_url' => 'https://nemconsults.com/include/counsultation-payment-process.php',
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
