<?php
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
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $phoneNumber = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];
    $fullname = $firstName . $surname;

    $mail = new PHPMailer(true);

    try {
        // Server settings

        $smtp_user = getenv('SMTP_USER');
        $smtp_pass = getenv('SMTP_PASS');
        $smtp_host = getenv('SMTP_HOST');

        if (!$smtp_user || !$smtp_pass) {
            die('SMTP credentials not set.');
        }

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $smtp_host;          // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $smtp_user;                // SMTP username
        $mail->Password   = $smtp_pass;                        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to
        $mail->SMTPDebug = 0; // Disable debugging output


        // Recipients
        $mail->setFrom('info@nemconsults.com', 'Nemconsults');
        $mail->addAddress('info@nemconsults.com', 'Nemconsults');          // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Contact us Message from ' . $fullname;

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
                    <h2 class="s-color">New Message Received from '. $fullname. '</h2>
                    <p>You have received a new message with the following details:</p>
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
                            <th>Message</th>
                            <td>'. $message. '</td>
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

        $alertMessage = '<div class="alert alert-success" role="alert">Message has been sent!</div>';
    } catch (Exception $e) {
        $alertMessage = "<div class='alert alert-danger' role='alert'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
}
?>

<?php if (!empty($alertMessage)) {
    echo '<div id="alert-section">' . $alertMessage . '</div>';
} ?>


<form action="" method="post" class="row g-3 mt-3">
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
        <label for="firstName" class="form-label fw-bold fs-6">First Name*</label>
        <input type="text" class="form-control py-3" name="firstName" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
        <label for="surname" class="form-label fw-bold fs-6">Surname*</label>
        <input type="text" class="form-control py-3" name="surname" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
        <label for="number" class="form-label fw-bold fs-6">Phone Number*</label>
        <input type="number" class="form-control py-3" name="number" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
        <label for="email" class="form-label fw-bold fs-6">Email*</label>
        <input type="email" class="form-control py-3" name="email" required>
    </div>
    <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
        <label for="textarea" class="form-label fw-bold fs-6">Your Message*</label>
        <textarea name="textarea" class="form-control" rows="6"></textarea>
    </div>
                        
    <div class="col" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="300">
        <input type="submit" value="Send Message" class="btn btn-accent px-5 py-3 mt-2">
    </div>
</form>