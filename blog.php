<?php

require_once 'include/db.php';

// Check for blog ID in different URL formats
$blogId = null;

// Format 1: blog.php?id=123
if (isset($_GET['id'])) {
    $blogId = intval($_GET['id']);
}
// Format 2: blog.php?blogURL=123 (used in blogs.php)
elseif (isset($_GET)) {
    // Loop through GET parameters to find the blog ID
    foreach ($_GET as $key => $value) {
        // Skip known parameters that aren't blog IDs
        if ($key !== 'id' && is_numeric($value)) {
            $blogId = intval($value);
            break;
        }
    }
}

// If no valid blog ID is found, redirect to blogs.php
if (!$blogId) {
    header("Location: blogs.php");
    exit;
}

// Fetch the blog from the database using the blogId
$query = "SELECT id, blogHeading, blogParagraph, blogMessage, blogImage, created_at FROM blog WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $blogId);
$stmt->execute();
$result = $stmt->get_result();

// Check if the blog exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $blogHeading = htmlspecialchars($row['blogHeading']);
    $blogParagraph = htmlspecialchars($row['blogParagraph']);
    $blogMessage = $row['blogMessage'];
    $blogImage = $row['blogImage'] ? "./images/blog/" . htmlspecialchars($row['blogImage']) : "./images/default.jpg";
    $dateCreated = date("F d, Y h:i A", strtotime($row['created_at']));
} else {
    // Blog not found, redirect to blogs.php
    header("Location: blogs.php");
    exit;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php
    $pageTitle = "Nemconsults - Blog";
    require_once './include/header.php';
    ?>
    <!-- Head ends-->

    <body>
           
        <!-- Navbar -->
        <?php include_once './include/navbar.php' ?>
        <!-- Navbar ends --> 

         <!-- Banner -->
         <div class="banner usa d-flex align-items-end" data-aos="slide-down" data-aos-duration="800">
            <div class="container">
                <p class="h1 text-light fw-bolder">Articles & News</p>
                <p class="text-light col-md-7 mb-4"> Ready to take the next step? We're here to guide you through the application process for courses, universities, scholarships, and more!</p>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Consultation service  -->
        <section class="consultation-service bg-white py-3 pt-md-5 pb-md-5">
            <div class="container my-3 px-4 px-lg-0">
                <div class="row p-4 pb-4 pb-lg-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="col-lg-6 p-3 p-lg-5 pt-lg-3">
                    <h2 class="display-4 fw-bold lh-1 a-color" data-aos="zoom-out-down" data-aos-duration="500" data-aos-delay="100"><?= $blogHeading ?></h2>
                    <p class="text-muted"><small>Published on <?= $dateCreated ?></small></p>
                    <p class="lead" data-aos="fade-right" data-aos-duration="500" data-aos-delay="200"><?= $blogParagraph ?></p>
                </div>
                <div class="col-lg-5 offset-lg-1 p-0 overflow-hidden object-fit-cover global-img shadow-lg" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400">
                    <img class="rounded-lg-3" src="<?= $blogImage ?>" alt="<?= $blogHeading ?>" width="720">
                </div>
                </div>
            </div>
        </section>
        <!-- Consultation service end-->

        <!-- Blog -->
        <section class="row blog pt-2 bg-white justify-content-center">

            <div class="col-md-10 paragraph" id="blogParagraph">
                <?= $blogMessage ?>
            </div>
            

        </section>
        <!-- Blog Ends -->

        <!-- Enquiry Form -->
        <div class="enquiry p-3 p-md-5">
            <div class="my-4">
                <div class="d-flex justify-content-center align-items-center flex-column d-lg-block">
                    <h1 class="title mt-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0">Get in touch with Nemconsults</h1>
                    <p class="col-lg-7 col-md-10 mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="50">Enter your details below to reach out to our experts. We would love to hear from you! Please reach out with any questions, comments, or feedback, and we will get back to you as soon as possible</p>
                </div>
                
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-lg-8 col-md-10">    
                    
                         <?php include './include/contact-us-form.php' ?>
                    </div>
                    <div class="d-none col-md-4 col-lg-4 d-lg-flex justify-content-center object-fit-cover overflow-hidden p-0 mt-2 mt-md-0" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                        <img src="images/img-2.png" class="h-100" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-delay="350">
                    </div>
                </div>

            </div>

        </div>
        <!-- Enquiry Form ends-->
        
        
        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const headings = document.querySelectorAll('#blogParagraph h1, #blogParagraph h2, #blogParagraph h3, #blogParagraph h4, #blogParagraph h5, #blogParagraph h6');
        
                headings.forEach(function(heading) {
                    heading.classList.add('title', 'display-5');
                });
            });
        </script>


    </body>
</html>