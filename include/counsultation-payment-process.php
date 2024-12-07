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
            // echo 'YOu cancel the payment';
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Failed',
                    text: 'We could not process your payment. Please try again later.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'https://nemconsults.com/consultation.php';
                    }
                });
            </script>";
            // header('Location: ../consultation.php');
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
              if($res->status) {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->packageAmount;

                if($amountPaid >= $amountToPay) {
                    // Extract payment details
                    $package = $res->data->meta->package;
                    $surname = $res->data->meta->surname;
                    $otherName = $res->data->meta->otherName;
                    $phoneNumber = $res->data->meta->phoneNumber;
                    $email = $res->data->meta->email;
                    $appointmentDate = $res->data->meta->appointmentDate;
                    $address = $res->data->meta->address;
                    $visaValidity = $res->data->meta->visaValidity;
                    $visaRefusal = $res->data->meta->visaRefusal;
                    $visaType = $res->data->meta->visaType;
                    $details = $res->data->meta->details;
                    $aboutUs = $res->data->meta->aboutUs;
                    $paymentStatus = 'Successful';

                    $stmt = $conn->prepare("INSERT INTO consulationPayments (package, surname, otherName, phoneNumber, email, appointmentDate, address, visaValidity, visaRefusal, visaType, details, aboutUs, amountPaid, amountToPay, paymentStatus) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssssssssssss", $package, $surname, $otherName, $phoneNumber, $email, $appointmentDate, $address, $visaValidity, $visaRefusal, $visaType, $details, $aboutUs, $amountPaid, $amountToPay, $paymentStatus);

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
                            $mail->Subject = 'New Payment for Consultation Service from' . $email;

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
                                        <h2 class="s-color">New Payment for Consultation Service Received</h2>
                                        <p>You have received a new payment with the following details:</p>
                                        <table class="custom-table">
                                            <tr>
                                                <th>Package</th>
                                                <td>' . $package . '</td>
                                            </tr>
                                            <tr>
                                                <th>First Name</th>
                                                <td>' . $otherName . '</td>
                                            </tr>
                                            <tr>
                                                <th>Surname</th>
                                                <td>' . $surname . '</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td>' . $phoneNumber . '</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>' . $email . '</td>
                                            </tr>
                                            <tr>
                                                <th>Appointment Date</th>
                                                <td>' . $appointmentDate . '</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>' . $address . '</td>
                                            </tr>
                                            <tr>
                                                <th>Validity of Visa(Immigrant)</th>
                                                <td>' . $visaValidity . '</td>
                                            </tr>
                                            <tr>
                                                <th>Visa or Immigration Application Refusal</th>
                                                <td>' . $visaRefusal . '</td>
                                            </tr>
                                            <tr>
                                                <th>Advice on</th>
                                                <td>' . $visaType . '</td>
                                            </tr>
                                            <tr>
                                                <th>More Details about plan in Canada</th>
                                                <td>' . $details . '</td>
                                            </tr>
                                            <tr>
                                                <th>Amount Paid</th>
                                                <td>$' . $amountPaid . '</td>
                                            </tr>
                                            <tr>
                                                <th>Payment Status</th>
                                                <td>' . $paymentStatus . '</td>
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
                            $mail->addAddress($email, $surname . ' ' . $otherName);          // User's email address
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
                                        <h2>Thank you for your payment, ' . $surname . ' ' . $otherName . '!</h2>
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
