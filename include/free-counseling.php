<?php
include_once 'db.php'; 
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Handle the form submission logic
$alertMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form inputs
    $firstName = htmlspecialchars(trim($_POST['firstName']), ENT_QUOTES, 'UTF-8');
    $surname = htmlspecialchars(trim($_POST['surname']), ENT_QUOTES, 'UTF-8');
    $phoneNumber = filter_var(trim($_POST['number']), FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $destination = htmlspecialchars(trim($_POST['destination'] ?? ''), ENT_QUOTES, 'UTF-8');
    $studyLevel = htmlspecialchars(trim($_POST['studyLevel'] ?? ''), ENT_QUOTES, 'UTF-8');
    $planToStudy = htmlspecialchars(trim($_POST['select-destination'] ?? ''), ENT_QUOTES, 'UTF-8');
    $funding = htmlspecialchars(trim($_POST['funding'] ?? ''), ENT_QUOTES, 'UTF-8');
    $sentDate = date('Y-m-d H:i:s'); // Current date and time
    $fullname = $firstName . $surname;

    $errors = array();

    if (
        empty($firstName) || empty($surname) || empty($phoneNumber) || empty($email) || empty($destination) || empty($studyLevel) || empty($planToStudy) || empty($funding)
    ) {
        $errors[] = "Some fields are not filled.";
    }

    // User-Agent check
    if (empty($_SERVER['HTTP_USER_AGENT']) || strlen($_SERVER['HTTP_USER_AGENT']) < 10) {
        $errors[] = "Suspicious submission detected (invalid User-Agent).";
    }

    // Validate reCAPTCHA
    $recaptchaSecret = getenv('SMTP_SECRET_KEY');  // Your secret key
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

    if (empty($errors)) {
        $sql = "INSERT INTO free_counselling (first_name, surname, phone_number, email, destination, study_level, plan_to_study, funding, sent_date) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $firstName, $surname, $phoneNumber, $email, $destination, $studyLevel, $planToStudy, $funding, $sentDate);

        if ($stmt->execute()) {
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
                $mail->Subject = 'New Free Counseling Enquiry from ' . $email;

                // HTML email content
                $mail->Body = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="container p-3">
                        <div class="email-header">
                            <img src="https://nemconsults.com/images//logo-transparent.png" alt="Company Logo"> <!-- Replace with your logo URL -->
                        </div>
                        <div class="email-content text-center">
                            <h2 class="s-color">New Counseling Enquiry Received</h2>
                            <p>You have received a new enquiry with the following details:</p>
                            <table class="custom-table">
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
                                    <th>Preferred Destination</th>
                                    <td>'. $destination. '</td>
                                </tr>
                                <tr>
                                    <th>Study Level</th>
                                    <td>'. $studyLevel. '</td>
                                </tr>
                                <tr>
                                    <th>Plan to Study</th>
                                    <td>'. $planToStudy. '</td>
                                </tr>
                                <tr>
                                    <th>Funding Source</th>
                                    <td>'. $funding. '</td>
                                </tr>
                            </table>
                        </div>
                        <div class="email-footer">
                            &copy; ' . date('Y') . ' Nemconsults. All rights reserved.
                        </div>
                    </div>
                </body>
                </html>
                ';

                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                // Now configure the PHPMailer instance to send the email to the user
                $mail->clearAddresses();
                $mail->addAddress($email, $fullname);          // User's email address
                $mail->addReplyTo('info@nemconsults.com', 'Nemconsults');

                // Content
                $mail->isHTML(true); // Set email format to HTML
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
        
                // Custom email content for the user

                $alertMessage = '<div class="alert alert-success" role="alert">Thank you for your application. We will get back to you shortly.</div>';
            } catch (Exception $e) {
                $alertMessage = "<div class='alert alert-danger' role='alert'>Message could not be sent. </div>";
            }
            
        } else {
            $alertMessage = '<div class="alert alert-danger" role="alert">An error occurred while submitting your application. Please try again later.</div>';
        }

        $stmt->close();
        $conn->close();
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

<!-- Include alert message if available -->
<!-- Include alert message if available -->
<?php if (!empty($alertMessage)) {
    echo '<div id="alert-section">' . $alertMessage . '</div>';
} ?>

<!-- HTML Form -->
<form action="" method="POST" class="row g-3 mt-3" id="d-form" data-aos="zoom-out-down" data-aos-duration="500"  >
    <div class="col-md-6"   >
        <label for="firstName" class="form-label fw-bold fs-6">First Name*</label>
        <input type="text" class="form-control py-3" name="firstName" required>
    </div>
    <div class="col-md-6"   >
        <label for="surname" class="form-label fw-bold fs-6">Surname*</label>
        <input type="text" class="form-control py-3" name="surname" required>
    </div>
    <div class="col-md-6"   >
        <label for="number" class="form-label fw-bold fs-6">Phone Number*</label>
        <input type="number" class="form-control py-3" name="number" required>
    </div>
    <div class="col-md-6"   >
        <label for="email" class="form-label fw-bold fs-6">Email*</label>
        <input type="email" class="form-control py-3" name="email" required>
    </div>
    <div class="col-md-6"   >
        <label for="destination" class="form-label fw-bold fs-6">Preferred Destination*</label>
        <select name="destination" id="destination" class="form-select py-3" required>
            <optgroup label="Preferred">
                <option value="" selected disabled></option>
                <option value="Canada">Canada</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Australia">Australia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Ireland">Ireland</option>
            </optgroup>
            <optgroup label="All Countries" class="all-countries">
                <!-- Countries will be populated here by JavaScript -->
            </optgroup>
        </select>
    </div>
    <div class="col-md-6"   >
        <label for="studyLevel" class="form-label fw-bold fs-6">Preferred Study Level*</label>
        <select name="studyLevel" class="form-select py-3" required>
            <option value="" disabled selected>select option...</option>
            <option value="Undergraduate">Undergraduate</option>
            <option value="Postgraduate">Postgraduate</option>
            <option value="Master Degree">Master Degree</option>
            <option value="Diploma">Diploma</option>
            <option value="Doctorate">Doctorate</option>
            <option value="Vocational">Vocational</option>
        </select>
    </div>
    <div class="col-md-6"   >
        <label for="select-destination" class="form-label fw-bold fs-6">When do you plan to study?*</label>
        <select name="select-destination" id="select-destination" class="form-select py-3" required>
            <option value="" disabled selected>select option...</option>
            <!-- Populate options here -->
        </select>
    </div>
    <div class="col-md-6"   >
        <label for="funding" class="form-label fw-bold fs-6">How would you fund your education?*</label>
        <select name="funding" class="form-select py-3" required>
            <option value="" disabled selected>select option...</option>
            <option value="Self-Funded">Self-Funded</option>
            <option value="Parents">Parents</option>
            <option value="Bank loan">Bank Loan</option>
            <option value="Seeking scholarship">Seeking Scholarship</option>
            <option value="Employer scholarship">Employer Scholarship</option>
            <option value="Seeking Government scholarship">Seeking Government Scholarship</option>
            <option value="Have Government scholarship">Have Government Scholarship</option>
            <option value="other">Other</option>
        </select>
    </div>
    <!-- Google reCAPTCHA widget -->
    <div class="col-12" >
        <input type="hidden" id="recaptchaToken" name="g-recaptcha-response">
    </div>

    <div class="col">
        <button onclick="onClick(event)" class="btn btn-accent px-5 py-3 mt-2">Make Enquiry Now</button>
    </div>
</form>

<script>
// Scroll to the alert section after form submission to show the user the success or error message
if (document.getElementById('alert-section')) {
    document.getElementById('enquiry').scrollIntoView({ behavior: 'smooth' });
}
</script>