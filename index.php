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

            <button class="button-join-now mt-10 text-black" role="button">Join now</button>
        </div>
    </section>

    <!-- About section -->
    <section id="about" class="container">
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-12 col-md-6 p-4">
                    <span class="about-title-text">About us</span>
                    <div class="underline-bar"></div>
                    <p class="about-description">FitZone Fitness Center is a modern gym located in the heart of Kurunegala, dedicated to helping individuals lead healthier, more active lives. We offer a wide range of fitness programs tailored for all fitness levels, from beginners to experienced athletes. Our team of friendly and certified trainers are here to guide and motivate you every step of the way. Whether you're looking to build strength, lose weight, or simply stay fit, FitZone provides a welcoming environment and flexible plans to suit your lifestyle. Join us today and be part of a community that cares about your well-being.</p>
                </div>
                <div class="col-12 col-md-6 p-4 d-flex justify-content-center align-items-center">
                    <img src="assets/images/about-img.png" alt="Gym Group" class="about-img" />
                </div>
            </div>
        </div>

    </section>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>