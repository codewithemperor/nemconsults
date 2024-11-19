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

        <!-- Blog -->
        <section class="row row-cols row-cols-1 row-cols-md-2 gy-4 row-cols-lg-2 blog">

          <?php
          
          require_once 'include/db.php';


          $query = "SELECT id, blogHeading, blogURL, blogParagraph, blogImage, created_at FROM blog ORDER BY created_at DESC";
          $result = $conn->query($query);

          // Check if there are blogs to display
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  // Blog details
                  $blogId = $row['id'];
                  $blogURL = $row['blogURL'];
                  $blogHeading = htmlspecialchars($row['blogHeading']);
                  $blogParagraph = htmlspecialchars($row['blogParagraph']);
                  $blogImage = $row['blogImage'] ? "./images/blog/" . htmlspecialchars($row['blogImage']) : "./images/default.jpg";
                  $dateCreated = date("F d, Y h:i A", strtotime($row['created_at']));
                  $readMoreLink = "blog.php?" . urlencode($blogURL) . "=" . $blogId;




                  // Output blog card dynamically
                  ?>
                  <div class="col">
                      <div class="card th-ani h-100">
                          <div class="row g-0 h-100">
                              <div class="col-md-4 global-img">
                                  <img src="<?= $blogImage ?>" class="rounded-start" alt="Blog Image">
                              </div>
                              <div class="col-md-8">
                                  <div class="card-body">
                                      <h3 class="card-title"><?= $blogHeading ?></h3>
                                      <p class="card-text"><?= $blogParagraph ?></p>
                                      <p class="card-text"><small class="text-body-secondary">Last updated <?= $dateCreated ?></small></p>
                                      <a href="<?= $readMoreLink ?>" class="btn btn-accent">Read More</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          } else {
              // Display a message if no blogs exist
              echo "<div class='alert alert-warning'>No blogs available to display at the moment.</div>";
          }
          ?>


        </section>
        <!-- Blog Ends -->
        
        
        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- AOS JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

        <!-- Include Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <!-- Custom JS -->
        <script src="js/script.js"></script>

    </body>
</html>