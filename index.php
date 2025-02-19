<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php require_once './include/header.php'?>
    <!-- Head ends-->

    <body>
           
        <!-- Navbar -->
        <?php include_once './include/navbar.php' ?>
        <!-- Navbar ends -->

        <!-- Banner -->
        <div class="wrapper">
            <div class="banner-wrapper d-flex align-items-center" data-aos="fade-up" data-aos-duration="500">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-7" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
                            <h1 class="banner-header text-white mb-2 animate__animated animate__fadeIn">Achieve your educational and career aspirations with Nemconsults</h1>
                            <p class="text-white col-md-10 col-lg animate__animated animate__fadeIn" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">We provide expert guidance, support, and resources for international students looking to explore, develop, and manage their careers.</p>
                            <a href="about.php" class="btn btn-accent px-5 py-2 animate__animated animate__pulse" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="banner-form-overlay d-none container" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row align-items-center p-2 py-3 p-md-0">
                                <div class="col-sm mb-3 mb-md-0">
                                    <input class="form-control p-3" type="text" name="course" id="course" placeholder="Enter course to study" required>
                                </div>
                                <div class="col-sm mb-3 mb-md-0">
                                    <input class="form-control p-3" type="text" name="place" id="place" placeholder="Enter where to study" required>
                                </div>
                                <div class="col-sm mb-3 mb-md-0 col-md-2">
                                    <input class="btn btn-accent p-3 py-2 w-100" type="submit" name="search" id="search" value="Search" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Study steps -->
        <div class="study-step pt-5 mt-4">
            <div class="px-3 px-md-0 ps-md-4 px-lg-0 ps-lg-5">
                <h1 class="title" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Your study abroad step</h1>
                <div class="row justify-content-between">

                    <div class="col-md-7 p-md-0">
                        <div class="row row-cols-1 gap-3 my-4">
                            <div class="col">
                                <div class="accordion" id="whyStudyAbroad">
                                    <div class="accordion" id="whyStudyAbroad">
                                        <div class="accordion-item mb-3" data-aos="fade-right" data-aos-duration="500" data-aos-delay="200">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-one" aria-expanded="false" aria-controls="flush-one">
                                                    Why study abroad?
                                                </button>
                                            </h2>
                                            <div id="flush-one" class="accordion-collapse collapse" data-bs-parent="#whyStudyAbroad">
                                                <div class="accordion-body">Studying abroad provides an opportunity to gain international exposure, learn new languages, and experience different cultures. It also enhances your academic and professional prospects by offering a diverse and global perspective.</div>
                                            </div>
                                        </div>
                                    
                                        <div class="accordion-item mb-3" data-aos="fade-right" data-aos-duration="500" data-aos-delay="300">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-two" aria-expanded="false" aria-controls="flush-two">
                                                    Where and when to study?
                                                </button>
                                            </h2>
                                            <div id="flush-two" class="accordion-collapse collapse" data-bs-parent="#whyStudyAbroad">
                                                <div class="accordion-body">Choosing the right destination and time for your studies depends on your academic goals, budget, and personal preferences. Popular destinations include the UK, USA, Canada, Australia, and New Zealand. It's important to consider application deadlines and start dates for your preferred programs.</div>
                                            </div>
                                        </div>
                                    
                                        <div class="accordion-item mb-3" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-three" aria-expanded="false" aria-controls="flush-three">
                                                    How do I apply?
                                                </button>
                                            </h2>
                                            <div id="flush-three" class="accordion-collapse collapse" data-bs-parent="#whyStudyAbroad">
                                                <div class="accordion-body">Applying to study abroad involves several steps including researching universities, preparing application documents (such as transcripts, recommendation letters, and personal statements), and submitting applications. It may also involve taking standardized tests like the TOEFL, IELTS, or GRE.</div>
                                            </div>
                                        </div>
                                    
                                        <div class="accordion-item mb-3" data-aos="fade-right" data-aos-duration="500" data-aos-delay="500">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-four" aria-expanded="false" aria-controls="flush-four">
                                                    After receiving an offer
                                                </button>
                                            </h2>
                                            <div id="flush-four" class="accordion-collapse collapse" data-bs-parent="#whyStudyAbroad">
                                                <div class="accordion-body">Once you receive an offer, you need to accept it and follow the university's instructions for next steps. This often includes paying a deposit, applying for a student visa, and arranging accommodation. It's important to carefully read through all correspondence from the university to ensure you don't miss any critical steps.</div>
                                            </div>
                                        </div>
                                    
                                        <div class="accordion-item mb-3" data-aos="fade-right" data-aos-duration="500" data-aos-delay="600">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-five" aria-expanded="false" aria-controls="flush-five">
                                                    Prepare to depart
                                                </button>
                                            </h2>
                                            <div id="flush-five" class="accordion-collapse collapse" data-bs-parent="#whyStudyAbroad">
                                                <div class="accordion-body">Preparing to depart involves several tasks such as booking flights, packing, and understanding the customs and culture of your destination. Ensure you have all necessary documents (passport, visa, offer letter) and consider attending pre-departure orientations if offered by your institution.</div>
                                            </div>
                                        </div>
                                    
                                        <div class="accordion-item mb-3" data-aos="fade-right" data-aos-duration="500" data-aos-delay="700">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-six" aria-expanded="false" aria-controls="flush-six">
                                                    Arrive and thrive
                                                </button>
                                            </h2>
                                            <div id="flush-six" class="accordion-collapse collapse" data-bs-parent="#whyStudyAbroad">
                                                <div class="accordion-body">Upon arrival, it's crucial to attend orientations and settle into your new environment. Get acquainted with your university, local transportation, and essential services. Engage with your peers, join student groups, and seek support services if needed to help you thrive in your new academic and social setting.</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-4 d-flex justify-content-center object-fit-cover overflow-hidden p-0" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                        <img src="images/img-1.png" class="h-100" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
                    </div>

                </div>
            </div>
        </div> 
        <!-- Study steps end -->

        <!-- WHY Nemconsults -->
        <div class="why py-5 bg-white">
            <div class="container px-3 px-md-0">
                <h1 class="title" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Why choose Nemconsults?</h1>
                
                <div class="row mt-4 mt-md-5 row-cols row-cols-md-2 row-cols-lg-3 row-gap-4">
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <i class="fa fa-graduation-cap"></i>
                                <p class="card-title mb-3">10+ years experience.</p>
                                <p class="">Nemconsults combines experience and technology to help students get into their dream international course.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-user-graduate"></i>
                                <p class="card-title mb-3">2,500+ students.</p>
                                <p class="">Helped by Nemconsults in securing admissions to leading universities across the UK, USA, Australia, New Zealand, Canada, and more.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <i class="fa fa-certificate"></i>
                                <p class="card-title mb-3">Accredited Partners.</p>
                                <p class="">We have established partnerships with top universities, institutions, company including 12Go partner, to offer students the best opportunities and resources.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <i class="fa-solid fa-ranking-star"></i>
                                <p class="card-title mb-3">4.7/5 Rating</p>
                                <p class="">Most of our customers said they would recommend our student placement services to their family and friends.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="600">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <i class="fa fa-globe"></i>
                                <p class="card-title mb-3">International Education Expert</p>
                                <p class="">We provide personalized support for international students, including scholarship options and visa assistance.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm" data-aos="fade-up" data-aos-duration="500" data-aos-delay="700">
                        <div class="card h-100">
                            <div class="card-body p-4">
                                <i class="fa fa-calendar-check"></i>
                                <p class="card-title mb-3">Tailored Guidance</p>
                                <p class="">Our dedicated team offers tailored advice and support to help you make informed decisions about your education and career path.</p>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        <!-- WHY Nemconsults ends -->

        <!-- Six Destination -->
        <div class="six-destination p-3 p-md-5">
            <h1 class="title mt-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Six Common Destination</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 my-5 g-4">
                <div class="col position-relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                    <div class="card h-100 card-0">
                        <div class="card-body text-center p-0">
                            <img src="images/canada.jpg" class="card-img-top" alt="...">
                            <h3 class="position-absolute top-50 start-50 translate-middle text-white">CANADA</h3>
                        </div>
                    </div>
                    <div class="card card-1 h-100 position-absolute top-0 start-0">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="card-title">Study in Canada</h5>
                            <p class="card-text">Canada is renowned for its high-quality education and welcoming multicultural society. With a reputation for safety, innovation, and stunning scenery, it's a top choice for those seeking a well-rounded study abroad experience.</p>
                            <a href="study-in-canada.php" class="btn btn-accent w-100 mt-lg-3">Discover more</a>
                        </div>
                    </div>
                </div>
                
                <div class="col position-relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                    <div class="card h-100 card-0">
                        <div class="card-body text-center p-0">
                            <img src="images/london.jpg" class="card-img-top" alt="...">
                            <h3 class="position-absolute top-50 start-50 translate-middle text-white">UNITED KINGDOM</h3>
                        </div>
                    </div>
                    <div class="card card-1 h-100 position-absolute top-0 start-0">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="card-title">Study in United Kingdom</h5>
                            <p class="card-text">The United Kingdom is home to some of the world's finest and oldest universities and colleges. Experience a tradition of academic excellence and research innovation, with access to top-quality education that shapes future leaders across diverse fields.</p>
                            <a href="study-in-uk.php" class="btn btn-accent w-100 mt-lg-3">Discover more</a>
                        </div>
                    </div>
                </div>

                <div class="col position-relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                    <div class="card h-100 card-0">
                        <div class="card-body text-center p-0">
                            <img src="images/united-states.jpg" class="card-img-top" alt="...">
                            <h3 class="position-absolute top-50 start-50 translate-middle text-white">UNITED STATES</h3>
                        </div>
                    </div>
                    <div class="card card-1 h-100 position-absolute top-0 start-0">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="card-title">Study in United States</h5>
                            <p class="card-text">Boasting 33 of the world’s top 100 universities, as well as being home to the financial, technology, aerospace, healthcare, and entertainment hubs of the world, the United States is a land of educational and career opportunities for international students.</p>
                            <a href="study-in-usa.php" class="btn btn-accent w-100 mt-lg-3">Discover more</a>
                        </div>
                    </div>
                </div>

                <div class="col position-relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                    <div class="card h-100 card-0">
                        <div class="card-body text-center p-0">
                            <img src="images/australia.jpg" class="card-img-top" alt="...">
                            <h3 class="position-absolute top-50 start-50 translate-middle text-white">AUSTRALIA</h3>
                        </div>
                    </div>
                    <div class="card card-1 h-100 position-absolute top-0 start-0">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="card-title">Study in Australia</h5>
                            <p class="card-text">Uncover a world of opportunities in the land down under! With over 1,100 institutions and 22,000 courses to choose from, Australia offers a world-class education and an outstanding quality of life.</p>
                            <a href="study-in-australia.php" class="btn btn-accent w-100 mt-lg-3">Discover more</a>
                        </div>
                    </div>
                </div>
            
                <div class="col position-relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="600">
                    <div class="card h-100 card-0">
                        <div class="card-body text-center p-0">
                            <img src="images/new-zealand.jpg" class="card-img-top" alt="...">
                            <h3 class="position-absolute top-50 start-50 translate-middle text-white">NEW ZEALAND</h3>
                        </div>
                    </div>
                    <div class="card card-1 h-100 position-absolute top-0 start-0">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="card-title">Study in New Zealand</h5>
                            <p class="card-text">Renowned as one of the world's safest nations, New Zealand is a popular choice among international students. It offers a world-class education system, abundant research opportunities, breathtaking natural beauty, and unparalleled outdoor experiences.</p>
                            <a href="study-in-newZealand.php" class="btn btn-accent w-100 mt-lg-3">Discover more</a>
                        </div>
                    </div>
                </div>
        
                <div class="col position-relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="700">
                    <div class="card h-100 card-0">
                        <div class="card-body text-center p-0">
                            <img src="images/ireland.jpg" class="card-img-top" alt="...">
                            <h3 class="position-absolute top-50 start-50 translate-middle text-white">EUROPE</h3>
                        </div>
                    </div>
                    <div class="card card-1 h-100 position-absolute top-0 start-0">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="card-title">Study in Europe</h5>
                            <p class="card-text">Europe is home to some of the world’s oldest and most prestigious universities, offering students a wide range of academic opportunities in diverse cultural settings. Whether you’re interested in history, science, business, or the arts, studying in Europe provides a rich educational experience alongside vibrant cultures and languages.</p>
                            <a href="study-in-europe.php" class="btn btn-accent w-100 mt-lg-3">Discover more</a>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Six Destination ends -->

        <!-- Enquiry Form -->
        <div class="enquiry p-3 p-md-5 bg-white" id="enquiry">
            <div class="row my-4">
                <div class="col-md 8">

                    <div class="">
                        <h1 class="title mt-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Nemconsults can help you</h1>
                        <p class="col-md-9 mt-3" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">Enter your details and get a free counselling session with our experts so they can connect you to the right course, country, university - and even scholarships!</p>
                    </div>

                    <?php include './include/free-counseling.php' ?>

                </div>
                <div class="col-md-4 col-lg-4 d-flex justify-content-center object-fit-cover overflow-hidden p-0 mt-2 mt-md-0" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                    <img src="images/img-2.png" class="h-100" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
                </div>
            </div>

        </div>
        <!-- Enquiry Form ends-->

        <!-- Footer -->
        <?php include './include/footer.php'?>
        <!-- Footer end -->

    </body>
</html>