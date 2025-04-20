<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone</title>

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="assets/images/fitzone-logo.png" type="image/png">

</head>

<body>

    <?php include "includes/header.php" ?>



    <!-- Hero Section -->
    <section id="heroCarousel" class="carousel slide carousel-fade position-relative" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Background images -->
        <div class="carousel-inner position-absolute top-0 start-0 w-100 h-100">
            <div class="carousel-item active">
                <img src="assets/images/hero-carousel-3.png" class="w-100 h-100 object-fit-cover" alt="Hero 1">
            </div>
            <div class="carousel-item">
                <img src="assets/images/hero-carousel-2.png" class="w-100 h-100 object-fit-cover" alt="Hero 2">
            </div>
            <div class="carousel-item">
                <img src="assets/images/hero-bg.png" class="w-100 h-100 object-fit-cover" alt="Hero 3">
            </div>
        </div>

        <!-- Static text content -->
        <div class="hero-overlay text-white text-center d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-2 fw-bold hero-main-text">Welcome to Fit<span style="color: #FFC017;">Zone</span></h1>
            <p class="lead display-6 hero-sub-text">Your journey to a healthier
                <br>lifestyle starts here!
            </p>

            <button class="button-join-now mt-10 text-black" role="button" onclick="window.location.href='pages/login.php'">Join now</button>
        </div>
    </section>

    <!-- About section -->
    <section id="about" class="container">
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-12 col-md-6 p-4">
                    <span class="title-text">About us</span>
                    <div class="underline-bar"></div>
                    <p class="about-description">FitZone Fitness Center is a modern gym located in the heart of Kurunegala, dedicated to helping individuals lead healthier, more active lives. We offer a wide range of fitness programs tailored for all fitness levels, from beginners to experienced athletes. Our team of friendly and certified trainers are here to guide and motivate you every step of the way. Whether you're looking to build strength, lose weight, or simply stay fit, FitZone provides a welcoming environment and flexible plans to suit your lifestyle. Join us today and be part of a community that cares about your well-being.</p>
                </div>
                <div class="col-12 col-md-6 p-4 d-flex justify-content-center align-items-center">
                    <img src="assets/images/about-img.png" alt="Gym Group" class="about-img" />
                </div>
            </div>
        </div>

    </section>

    <!-- Services Section -->

    <section id="services" class="py-5" style="background-color: rgba(255, 192, 23, 0.59);">
        <div class="container">
            <h1 class="fw-bold title-text text-center">Our Services</h1>

            <div class="row justify-content-center align-items-stretch mt-5 g-4">
                <!-- Service Cards -->

                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card h-100 w-100" style="max-width: 20rem;">
                        <img src="assets/images/service/service-card-1.png" class="card-img-top" alt="Personal Training">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title service-name">Personal Training</h5>
                            <p class="card-text service-description">Work one-on-one with a certified trainer who guides, motivates, and builds a plan to help you reach your fitness goals efficiently.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card h-100 w-100" style="max-width: 20rem;">
                        <img src="assets/images/service/service-card-2.png" class="card-img-top" alt="Group Fitness Classes">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title service-name">Group Fitness Classes</h5>
                            <p class="card-text service-description">Take part in fun and energetic group classes like Zumba, HIIT, and Yoga designed for all skill levels to keep you moving and motivated.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card h-100 w-100" style="max-width: 20rem;">
                        <img src="assets/images/service/service-card-3.png" class="card-img-top" alt="Custom Workout Plans">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title service-name">Custom Workout Plans</h5>
                            <p class="card-text service-description">Receive a personalized workout plan based on your goals, fitness level, and schedule — built just for you.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card h-100 w-100" style="max-width: 20rem;">
                        <img src="assets/images/service/service-card-4.png" class="card-img-top" alt="Nutrition Guidance">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title service-name">Nutrition Guidance</h5>
                            <p class="card-text service-description">Get simple diet tips and basic meal guidance to stay healthy, improve energy, and boost your fitness progress.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card h-100 w-100" style="max-width: 20rem;">
                        <img src="assets/images/service/service-card-5.png" class="card-img-top" alt="Body Composition Analysis">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title service-name">Body Composition Analysis</h5>
                            <p class="card-text service-description">Measure and track your BMI, fat percentage, and other key health stats to monitor your progress and stay on track.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card h-100 w-100" style="max-width: 20rem;">
                        <img src="assets/images/service/service-card-6.png" class="card-img-top" alt="Gym Equipment Access">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title service-name">Gym Equipment Access</h5>
                            <p class="card-text service-description">Use our state-of-the-art machines for a complete and effective full-body workout experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership section -->
    <section id="membership">
        <div class="bg-light">
            <div class="container py-5">
                <div class="row text-center mb-5">
                    <div class="col">
                        <h2 class="display-4 fw-bold title-text">Choose Your Fit Plan</h2>
                        <p class="text-muted" style="font-family: Raleway,sans-serif;">Select the perfect plan for your needs</p>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Basic Plan -->
                    <div class="col">
                        <div class="card h-100 pricing-card shadow-sm">
                            <div class="card-body p-5">
                                <h5 class="card-title text-muted text-uppercase mb-4">Basic Plan</h5>
                                <h1 class="display-5 mb-4">LKR 1500<small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled feature-list">
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Gym equipment access</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Body composition check
                                        (once a month)</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Open gym hours</li>
                                </ul>
                                <button class="btn btn-outline-warning btn-lg w-100 mt-4">Get Started</button>
                            </div>
                        </div>
                    </div>

                    <!-- Pro Plan -->
                    <div class="col">
                        <div class="card h-100 pricing-card shadow position-relative">
                            <span class="badge gradient-custom text-white popular-badge px-4 py-2">Popular</span>
                            <div class="card-body p-5">
                                <h5 class="card-title text-warning text-uppercase mb-4">Standard Plan</h5>
                                <h1 class="display-5 mb-4">LKR 2500<small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled feature-list">
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Everything in Basic</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Group fitness classes
                                        (Zumba, Yoga, etc.)</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>One personal training session per month</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Nutrition guidance</li>
                                </ul>
                                <button class="btn gradient-custom text-white btn-lg w-100 mt-4">Get Started</button>
                            </div>
                        </div>
                    </div>

                    <!-- Enterprise Plan -->
                    <div class="col">
                        <div class="card h-100 pricing-card shadow-sm">
                            <div class="card-body p-5">
                                <h5 class="card-title text-muted text-uppercase mb-4">Premium Plan</h5>
                                <h1 class="display-5 mb-4">LKR 4000<small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled feature-list">
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Everything in Standard</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Unlimited personal training sessions</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Custom workout + meal plan</li>
                                    <li><i class="bi bi-check2 text-primary me-2"></i>Priority trainer booking</li>
                                </ul>
                                <button class="btn btn-outline-warning btn-lg w-100 mt-4">Get Started</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 p-4">
                    <span class="title-text">Contact Us</span>
                    <div class="underline-bar"></div>
                    <img src="assets/images/contact-img.png" alt="Gym Group" class="about-img mt-5" />
                </div>
                <div class="col-12 col-md-6 p-4 d-flex justify-content-center align-items-center">
                    <!-- Contact Form -->
                    <div class="container contact-form my-5">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fs-5">Name</label>
                                    <input type="text" class="form-control py-3" placeholder="eg: Alex">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-5">Email</label>
                                    <input type="email" class="form-control py-3" placeholder="eg: example@domain.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-5">Message</label>
                                    <textarea rows="5" class="form-control py-3" placeholder="Let’s talk about..."></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn submit-btn w-100 py-3 fs-5">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include "includes/footer.php" ?>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>