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
    $dob = $_POST['dob'];
    $fullAddress = $_POST['address'];
    $city = $_POST['city'];
    $destination = $_POST['destination'];
    $studyLevel = $_POST['studyLevel'];
    $planToStudy = $_POST['select-destination'];
    $funding = $_POST['funding'];
    $budget = $_POST['budget'];
    $sponsorName = $_POST['sponsorName'];
    $sponsorNumber = $_POST['sponsorNumber'];
    $message = $_POST['textarea'];
    $fullname = $firstName . ' ' . $surname;

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $smtp_user = getenv('SMTP_USER');
        $smtp_pass = getenv('SMTP_PASS');
        $smtp_host = getenv('SMTP_HOST');

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
        $mail->setFrom('study@nemconsults.com', 'Nemconsults');
        $mail->addAddress('study@nemconsults.com', 'Nemconsults');          // Add a recipient

        // Attachments
        if (isset($_FILES['datapage']) && $_FILES['datapage']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['datapage']['tmp_name'], $fullname . ' Passport Datapage.pdf');
        }

        if (isset($_FILES['o-level']) && $_FILES['o-level']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['o-level']['tmp_name'], $fullname . ' O-Level Result.pdf');
        }

        if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['resume']['tmp_name'], $fullname . ' Resume.pdf');
        }

        if (isset($_FILES['transcript']) && $_FILES['transcript']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['transcript']['tmp_name'], $fullname . ' Transcript.pdf');
        }

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Apply Now Enquiry from ' . $email;

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
                    <h2 class="s-color">New Apply Now Enquiry Received</h2>
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
                            <th>Date of Birth</th>
                            <td>'. $dob. '</td>
                        </tr>
                        <tr>
                            <th>Full Address</th>
                            <td>'. $fullAddress. '</td>
                        </tr>
                        <tr>
                            <th>City/Country</th>
                            <td>'. $city. '</td>
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
                        <tr>
                            <th>Budget for School & Accommodation (USD)</th>
                            <td>'. $budget. '</td>
                        </tr>
                        <tr>
                            <th>Sponsor Full Name</th>
                            <td>'. $sponsorName. '</td>
                        </tr>
                        <tr>
                            <th>Sponsor Phone Number</th>
                            <td>'. $sponsorNumber. '</td>
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
        $mail->clearAttachments();
        $mail->addAddress($email, $fullname);          // User's email address
        $mail->addReplyTo('study@nemconsults.com', 'Nemconsults');

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

<!-- Include alert message if available -->
<!-- Include alert message if available -->
<?php if (!empty($alertMessage)) {
    echo '<div id="alert-section">' . $alertMessage . '</div>';
} ?>

<!-- HTML Form -->
<form action="" class="row g-3 mt-3" method="post" enctype="multipart/form-data">
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
        <label for="firstName" class="form-label fw-bold fs-6">First Name*</label>
        <input type="text" class="form-control py-3" name="firstName" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100">
        <label for="surname" class="form-label fw-bold fs-6">Surname*</label>
        <input type="text" class="form-control py-3" name="surname" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
        <label for="otherName" class="form-label fw-bold fs-6">Other Name*</label>
        <input type="text" class="form-control py-3" name="otherName" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="150">
        <label for="number" class="form-label fw-bold fs-6">Phone Number*</label>
        <input type="number" class="form-control py-3" name="number" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="200">
        <label for="email" class="form-label fw-bold fs-6">Email*</label>
        <input type="email" class="form-control py-3" name="email" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="200">
        <label for="dob" class="form-label fw-bold fs-6">Date of Birth*</label>
        <input type="date" class="form-control py-3" name="dob" required>
    </div>

    <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="250">
        <label for="address" class="form-label fw-bold fs-6">Full Address*</label>
        <input type="text" class="form-control py-3" name="address" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="300">
        <label for="hotelCityLocation" class="form-label fw-bold fs-6">City/Country*</label>
        <select name="city" class="form-select all-cities py-3" required>
            <optgroup label="City/Country">
                <option value="" disabled selected>Please wait, loading...</option> 
                <!-- Options will be populated by JavaScript -->
            </optgroup>
        </select>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="300">
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

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="350">
        <label for="studyLevel" class="form-label fw-bold fs-6">Preferred Study Level*</label>
        <select name="studyLevel" id="" class="form-select py-3" required>
            <option value="" disabled selected>select option...</option>
            <option value="Undergraduate">Undergraduate</option>
            <option value="Postgraduate">Postgraduate</option>
            <option value="Master Degree">Master Degree</option>
            <option value="Diploma">Diploma</option>
            <option value="Doctorate">Doctorate</option>
            <option value="Vocational">Vocational</option>
        </select>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="350">
        <label for="select-destination" class="form-label fw-bold fs-6">When do you plan to study?*</label>
        <select name="select-destination" id="select-destination" class="form-select py-3" required>
            <option value="" disabled selected>select option...</option>
        </select>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="400">
        <label for="funding" class="form-label fw-bold fs-6">How would you fund your education?*</label>
        <select name="funding" id="" class="form-select py-3" required>
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

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="400">
        <label for="budget" class="form-label fw-bold fs-6">Budget for School & Accommodation(USD)*</label>
        <input type="number" class="form-control py-3" name="budget" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="4500">
        <label for="sponsorName" class="form-label fw-bold fs-6">Sponsor Full Name*</label>
        <input type="text" class="form-control py-3" name="sponsorName" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="450">
        <label for="sponsorNumber" class="form-label fw-bold fs-6">Sponsor Phone Number*</label>
        <input type="number" class="form-control py-3" name="sponsorNumber" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="500">
        <label for="dataPage" class="form-label fw-bold fs-6">Upload Passport Datapage*</label>
        <input type="file" class="form-control form-control-lg" name="dataPage" accept=".jpg, .jpeg, .png, .pdf" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="500">
        <label for="o-level" class="form-label fw-bold fs-6">Upload O'Level Result*</label>
        <input type="file" class="form-control form-control-lg" name="o-level" accept=".jpg, .jpeg, .png, .pdf" required>
    </div>

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="550">
        <label for="resume" class="form-label fw-bold fs-6">Upload CV/Resume*</label>
        <input type="file" class="form-control form-control-lg" name="resume" accept=".jpg, .jpeg, .png, .pdf" required>
    </div> 

    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="550">
        <label for="transcript" class="form-label fw-bold fs-6">Upload Transcript*</label>
        <input type="file" class="form-control form-control-lg" name="transcript" accept=".jpg, .jpeg, .png, .pdf" required>
    </div>

                        

    <div class="col-12" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="600">
        <label for="textarea" class="form-label fw-bold fs-6">Your Message*</label>
        <textarea name="textarea" class="form-control" rows="6"></textarea>
    </div>
                        
    <div class="col" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="600">
        <input type="submit" value="Send Message" class="btn btn-accent px-5 py-3 mt-2">
    </div>
</form>

<script>
// Scroll to the alert section after form submission to show the user the success or error message
if (document.getElementById('alert-section')) {
    document.getElementById('enquiry').scrollIntoView({ behavior: 'smooth' });
}
</script>