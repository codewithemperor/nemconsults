<?php require_once '../include/functions.php'; 
    checkAdminSession(); 
    if (isset($_GET['logout'])) {
        handleLogout();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="NEWFOUNDLAND EDUCATION & MANAGEMENT CONSULTING LIMITED">
        <title><?php echo isset($pageTitle) ? $pageTitle : "NEWFOUNDLAND EDUCATION & MANAGEMENT CONSULTING LIMITED"; ?></title>
    
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="../images/icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/icon.png">
        
        <!-- Data Tables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css" integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css" integrity="sha512-/r+0SvLvMMSIf41xiuy19aNkXxI+3zb/BN8K9lnDDWI09VM0dwgTMzK7Qi5vv5macJ3VH4XZXr60ip7v13QnmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Quill js -->
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    
        <!-- Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    </head>
<body>

    <div class="main">

        <section id="sidebar" class="py-3">
            <a href="./index.php" class="d-flex align-items-center justify-content-center py-3 my-3 text-decoration-none">
                <img src="../images/icon.png" alt="Mosesmoradeun Charity Foundation Logo" class="w-50 bg-white">
            </a>
    
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="dropdown">
                    <a href="index.php" class="nav-link text-white ">
                        <i class="fa-regular fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
    
               
    
                <li class="dropdown active">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="manageCropsToggle">
                        <i class="fa-solid fa-blog"></i>
                        Blog
                    </a>
                    <ul class="d-none drop-menu" id="manageCropsDropdown">
                        <li><a class="" href="add-blog.php"><i class="fa-regular fa-plus"></i>Add Blog</a></li>
                        <li><a class="" href="view-blog.php"><i class="fa-regular fa-eye"></i>View Blog</a></li>
                    </ul>
                </li>
    
                <li class="dropdown">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="manageCropsToggle">
                        <i class="fa-solid fa-message"></i>
                        Message
                    </a>
                    <ul class="d-none drop-menu" id="manageCropsDropdown">
                        <li><a class="" href="message.php?apply_now"><i class="fa-regular fa-plus"></i>Apply Form</a></li>
                        <li><a class="" href="message.php?free_counselling"><i class="fa-regular fa-plus"></i>Free Counselling</a></li>
                        <li><a class="" href="message.php?contact"><i class="fa-regular fa-plus"></i>Contact Us</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="?logout" class="nav-link text-white ">
                        <i class="fa-regular fa-right-from-bracket"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </section>

        <section id="content">
            <!-- Header -->
            <div class="container-fluid p-0">

                <!-- Header  -->
                <div class=" search  d-flex justify-content-between align-items-center">
                    <!-- search box -->
                    <div class="col">
                      <span class="bars d-md-none pe-3">
                        <i class="fa-regular fa-bars"  style="font-size: 30px;"></i>
                      </span>
                    </div>
                    <!-- search box -->
        
                    <!-- User details -->
                    <div class="dropdown user-details col-md-4 d-flex justify-content-end align-items-center">
                        <h5 class="m-0 d-none d-md-flex align-items-center">Admin</h5>
                        <a href="#" class="d-flex align-items-center justify-content-center link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="resources/img/02.jpg" alt="user" width="40px" height="auto" class="ms-3">
                        </a>
  
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                    <!-- User details -->
                </div>
                <!-- Header  -->
            </div>

            <!-- body -->
            <div class="container-fluid p-3 p-md-4 p-lg-5">
                <div class="row">
                    <div class="col-md-8 mt-3 mt-md-0">
                    <p class="heading-1">Add Blog</p>
                        <p class="">Easily add new blog posts to your charity foundation by providing details such as the blog title, publication date, author, and content. Keep your blog updated to engage your audience and share important stories and updates about your initiatives.</p>

                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
                        <a href="view-blog.php" class="btn bg-warning text-dark p-2 px-4">
                            View Blog<i class="fa-regular fa-eye ps-2"></i>
                        </a>
                    </div>
                </div>
                    <div class="mt-4">
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { addBlog(); } ?>
                        <form action="add-blog.php" method="post" enctype="multipart/form-data">
                            <div class="row g-2 mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="blogHeading" placeholder="Blog Heading" required="">
                                        <label for="floatingInputGrid">Blog Heading</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="blogURL" placeholder="Blog URL" required="">
                                        <label for="floatingInputGrid">Blog URL</label>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="blogParagraph" placeholder="Blog Paragraph" required="">
                                <label for="floatingInputGrid">Blog Paragraph</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="blogImage" placeholder="Upload Event Cover" accept="image/*" required>
                                <label for="floatingInputGrid">Upload Blog Images</label>
                            </div>

                            <div class="mb-3">
                                <label for="editor">Blog Message</label>
                                <div id="editor" style="height: 150px; border: 1px solid #ced4da; padding: 10px;"></div>
                            </div>

                            <input type="hidden" name="blogMessage" id="blogMessage">


                            <div class="col">
                                <button type="submit" name="addBlog" class="btn btn-success w-100">Add Blog</button>
                            </div>
                        </form>
                    </div>

                </div>
        </section>
    
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script>
        // Initialize Quill
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Transfer content from Quill editor to the hidden input
        document.querySelector('form').onsubmit = function() {
            var blogMessage = document.querySelector('#blogMessage');
            blogMessage.value = quill.root.innerHTML; // Get HTML content
        };
    </script>

</body>
</html>