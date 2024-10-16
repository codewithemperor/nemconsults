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
            <body>
                <h2>New message from {$fullname}</h2>
                <p><strong>First Name:</strong> {$firstName}</p>
                <p><strong>Surname:</strong> {$surname}</p>
                <p><strong>Phone Number:</strong> {$phoneNumber}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Message:</strong> {$message}</p>
            </body>
            </html>";

            $mail->AltBody = 'New message from ' . $fullname . ' - Message: ' . $message;
            $mail->send();

            // Send confirmation email to the user
            $mail->clearAddresses();
            $mail->addAddress($email, $fullname);
            $mail->Subject = 'Thank you for your enquiry - Nemconsults';
            $mail->Body = 'Thank you for your enquiry, ' . $firstName . '!';

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
