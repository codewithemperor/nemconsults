<?php
// Handle the form submission logic
$alertMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminEmail = "2016.ayomide77yusuf@gmail.com";

    // Collect form inputs
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $phoneNumber = $_POST['number'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $studyLevel = $_POST['studyLevel'];
    $planToStudy = $_POST['select-destination'];
    $funding = $_POST['funding'];

    // Validate required fields
    if (empty($firstName) || empty($surname) || empty($phoneNumber) || empty($email) || empty($destination) || empty($studyLevel) || empty($planToStudy) || empty($funding)) {
        $alertMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Please fill in all required fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
    } else {
        // Prepare email to admin
        $adminSubject = "New Free Counseling Enquiry";
        $adminMessage = "You have received a new free counseling enquiry:
        \nFirst Name: $firstName
        \nSurname: $surname
        \nPhone Number: $phoneNumber
        \nEmail: $email
        \nPreferred Destination: $destination
        \nStudy Level: $studyLevel
        \nPlan to Study: $planToStudy
        \nFunding Source: $funding";

        $adminHeaders = "From: $email";

        // Send email to admin
        if (mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders)) {
            // Prepare confirmation email to user
            $userSubject = "Confirmation of Your Free Counseling Enquiry";
            $userMessage = "Dear $firstName $surname,\n\nThank you for your enquiry. We will get back to you shortly.";
            $userHeaders = "From: $adminEmail";

            // Send confirmation email to user
            mail($email, $userSubject, $userMessage, $userHeaders);

            // Success message
            $alertMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Your enquiry has been successfully submitted. Thank you!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>';
        } else {
            // Error message
            $alertMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                There was an error submitting your enquiry. Please try again later.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>';
        }
    }
}
?>

<!-- Include alert message if available -->
<?php if (!empty($alertMessage)) {
    echo $alertMessage;
} ?>

<!-- HTML Form -->
<form action="" method="POST" class="row g-3 mt-3">
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="300">
        <label for="firstName" class="form-label fw-bold fs-6">First Name*</label>
        <input type="text" class="form-control py-3" name="firstName" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="300">
        <label for="surname" class="form-label fw-bold fs-6">Surname*</label>
        <input type="text" class="form-control py-3" name="surname" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="400">
        <label for="number" class="form-label fw-bold fs-6">Phone Number*</label>
        <input type="number" class="form-control py-3" name="number" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="400">
        <label for="email" class="form-label fw-bold fs-6">Email*</label>
        <input type="email" class="form-control py-3" name="email" required>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="500">
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
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="500">
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
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="600">
        <label for="select-destination" class="form-label fw-bold fs-6">When do you plan to study?*</label>
        <select name="select-destination" id="select-destination" class="form-select py-3" required>
            <option value="" disabled selected>select option...</option>
        </select>
    </div>
    <div class="col-md-6" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="600">
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
    <div class="col" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="600">
        <input type="submit" value="Make Enquiry Now!" class="btn btn-accent px-5 py-3 mt-2">
    </div>
</form>
