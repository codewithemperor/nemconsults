<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Handle the form submission logic
$alertMessage = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form inputs and sanitize them
    $firstName = htmlspecialchars(trim($_POST['firstName']), ENT_QUOTES, 'UTF-8');
    $surname = htmlspecialchars(trim($_POST['surname']), ENT_QUOTES, 'UTF-8');
    $phoneNumber = filter_var(trim($_POST['number']), FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['textarea']), ENT_QUOTES, 'UTF-8');
    $fullname = $firstName . ' ' . $surname;

    $errors = array();

    // User-Agent check
    if (empty($_SERVER['HTTP_USER_AGENT']) || strlen($_SERVER['HTTP_USER_AGENT']) < 10) {
        $errors[] = "Suspicious submission detected (invalid User-Agent).";
    }

    // Validate reCAPTCHA
    $recaptchaSecret = '6LfqcGMqAAAAACuy-V7fM59j_l2oA5AwoTu-_kTG';  // Your secret key
    $recaptchaResponse = $_POST['g-recaptcha-response']; // Get reCAPTCHA response from the form

    // Verify the reCAPTCHA response with Google's API
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha = file_get_contents($recaptchaUrl . '?secret=' . $recaptchaSecret . '&response=' . $recaptchaResponse);
    $recaptchaResult = json_decode($recaptcha);

    if (!$recaptchaResult->success) {
        $errors[] = "Please complete the reCAPTCHA.";
    }

    // Backend validation for form inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (!preg_match('/^\d{11}$/', $phoneNumber)) {
        $errors[] = "Invalid phone number. It should be 11 digits.";
    }

    if (empty($message) || strlen($message) < 10) {
        $errors[] = "Your message is too short.";
    }

    // Content filtering for spam keywords
    $spamKeywords = array("buy now", "click here", "http://", "https://");
    foreach ($spamKeywords as $keyword) {
        if (stripos($message, $keyword) !== false) {
            $errors[] = "Your message contains suspicious content.";
            break;
        }
    }

    // If there are no errors, proceed to send the mail
    if (empty($errors)) {
        try {
            $mail = new PHPMailer(true);

            // Server settings (ensure you have proper SMTP credentials)
            $smtp_user = getenv('SMTP_USER');
            $smtp_pass = getenv('SMTP_PASS');
            $smtp_host = getenv('SMTP_HOST');

            if (!$smtp_user || !$smtp_pass) {
                die('SMTP credentials not set.');
            }

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = $smtp_host;
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_user;
            $mail->Password = $smtp_pass;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Email setup
            $mail->setFrom('info@nemconsults.com', 'Nemconsults');
            $mail->addAddress('info@nemconsults.com', 'Nemconsults');

            // Email content for the company
            $mail->isHTML(true);
            $mail->Subject = 'New Contact us Message from ' . $fullname;
            $mail->Body = "
            <html>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>
                    *{
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
                    .email-content h2 {
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
                <div class='container p-3'>
                    <div class='email-header'>
                        <img src='https://nemconsults.com/images//logo-transparent.png' alt='Company Logo'>
                    </div>
                    <div class='email-content text-center'>
                        <h2 class='s-color'>New Counseling Enquiry Received</h2>
                        <p>You have received a new enquiry with the following details:</p>
                        <table class='custom-table'>
                            <tr>
                                <th>First Name</th>
                                <td>'. $firstName. '</td>
                            </tr>
                            <tr>
                                <th>Surname</th>
                                <td>'. $surname. '</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>'. $phoneNumber. '</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>'. $email. '</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>'. $message. '</td>
                            </tr>
                        </table>
                    </div>
                    <div class='email-footer'>
                        &copy; ' . date('Y') . ' Nemconsults. All rights reserved.
                    </div>
                </div>
            </body>
            </html>";

            $mail->AltBody = 'New message from ' . $fullname . ' - Message: ' . $message;
            $mail->send();

            // Send confirmation email to the user
            $mail->clearAddresses();
            $mail->addAddress($email, $fullname);

            $mail->isHTML(true);
            $mail->Subject = 'Thank you for your enquiry - Nemconsults';
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
                            <h2>Thank you for your enquiry, ' . $firstName . '!</h2>
                            <p>We have received your enquiry and will get back to you shortly.</p>
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

            // Success message
            $alertMessage = '<div class="alert alert-success" role="alert">Your message has been sent successfully!</div>';
        } catch (Exception $e) {
            // Error message
            $alertMessage = "<div class='alert alert-danger' role='alert'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
        }
    } else {
        // Display validation errors
        $alertMessage = '<div class="alert alert-danger" role="alert"><ul>';
        foreach ($errors as $error) {
            $alertMessage .= '<li>' . $error . '</li>';
        }
        $alertMessage .= '</ul></div>';
    }
}


?>

<!-- Display the alert message in the form -->
<?php if (!empty($alertMessage)) {
    echo '<div id="alert-section">' . $alertMessage . '</div>';
} ?>



<form action="" method="post" class="row g-3 mt-3" id="contact-form" data-aos="zoom-out-down" data-aos-duration="500">
    <div class="col-md-6" >
        <label for="firstName" class="form-label fw-bold fs-6">First Name*</label>
        <input type="text" class="form-control py-3" name="firstName" required>
    </div>
    <div class="col-md-6">
        <label for="surname" class="form-label fw-bold fs-6">Surname*</label>
        <input type="text" class="form-control py-3" name="surname" required>
    </div>
    <div class="col-md-6" >
        <label for="number" class="form-label fw-bold fs-6">Phone Number*</label>
        <input type="number" class="form-control py-3" name="number" required>
    </div>
    <div class="col-md-6"  >
        <label for="email" class="form-label fw-bold fs-6">Email*</label>
        <input type="email" class="form-control py-3" name="email" required>
    </div>
    <div class="col-12" >
        <label for="textarea" class="form-label fw-bold fs-6">Your Message*</label>
        <textarea name="textarea" class="form-control" rows="6"></textarea>
    </div>
    
    <!-- Google reCAPTCHA widget -->
    <div class="col-12" >
        <input type="hidden" id="recaptchaToken" name="g-recaptcha-response">
    </div>

    <div class="col">
        <button onclick="onClick(event)" class="btn btn-accent px-5 py-3 mt-2">Send Message</button>
    </div>
</form>
