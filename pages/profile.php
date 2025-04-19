<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/fitzone-logo.png" type="image/png" />

    <style>
        ::placeholder {
            color: black;
            opacity: 0.8;
        }

        .class-radio {
            display: none;
        }

        .class-card {
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }

        .class-radio:checked+.class-card {
            border-color: #ffc107;
            background-color: #fff8e1;
        }

        .class-card:hover {
            border-color: #ffc107;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="custom-wrapper">
        <nav id="custom-sidebar" class="custom-sidebar bg-dark text-white d-flex flex-column">
            <div class="p-3 flex-grow-1">
                <!-- Centered logo and heading -->
                <div class="d-flex flex-column align-items-center text-center">
                    <a href="/fitzone">
                        <img src="../assets/images/fitzone-logo.png" alt="FitZone logo" class="w-75 mb-2 mt-3">
                    </a>
                </div>

                <!-- Left-aligned links -->
                <ul class="nav flex-column mt-4">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="profile">Profile</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="my_schedule">My Schedules</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="classes">Classes</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="inquiries">Inquiries</a>
                    </li>
                </ul>
            </div>

            <!-- Logout Button at the Bottom -->
            <div class="mt-auto p-3">
                <a href="#" class="btn btn-danger w-100" data-section="logout">Logout</a>
            </div>
        </nav>



        <!-- Main Content -->
        <div id="custom-content" class="flex-grow-1 p-4">
            <!-- Toggle Button -->
            <button class="btn btn-warning mb-3 d-md-none" id="custom-toggle-btn">☰ Menu</button>

            <!-- Section Content -->
            <div id="profile" class="custom-section">
                <h2 class="profile-section-header fw-bold">Profile</h2>
                <div class=" mt-4">
                    <div class="row">
                        <div class="col-md-4 col-12 mb-4">
                            <div class="rounded-box bg-warning rounded-3">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                    <div class="d-flex flex-column align-items-start text-start ms-3">
                                        <h5 class="profile-section-header fw-bold mb-1">Sahan Gamage</h5>
                                        <span class="text-white small profile-section-header">Membership: Pending</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-4">
                            <div class="rounded-box bg-dark rounded-3">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                    </svg>
                                    <div class="d-flex flex-column align-items-start text-start ms-3">
                                        <h5 class="profile-section-header fw-bold mb-1">FIT0234</h5>
                                        <span class="text-white small profile-section-header">Membership ID</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-4">
                            <div class="rounded-box bg-danger rounded-3">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                                    </svg>
                                    <div class="d-flex flex-column align-items-start text-start ms-3">
                                        <h5 class="profile-section-header fw-bold mb-1">Basic</h5>
                                        <span class="text-white small profile-section-header">Membership Plan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- If membership is pending -->

                <?php if (true) {
                ?>
                    <div class="container">
                        <h3 class="mb-3 personal-details-title">Activate Membership</h3>
                        <hr />

                        <!-- Alert with Bank Details -->
                        <div class="alert alert-danger" role="alert">
                            <strong>Bank Deposit Instructions:</strong><br />
                            Please deposit the payment to the following bank account and upload the deposit slip below:
                            <ul class="mt-2 mb-0">
                                <li><strong>Bank:</strong> Bank of Ceylon</li>
                                <li><strong>Branch:</strong> Galle</li>
                                <li><strong>Account Name:</strong> FitZone Fitness Center</li>
                                <li><strong>Account Number:</strong> 1234567890</li>
                            </ul>
                        </div>

                        <!-- Upload + Button Row -->
                        <form class="mb-5">
                            <div class="row align-items-center gy-3">
                                <label for="depositSlip" class="form-label">Upload Deposit Slip</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="depositSlip" required />
                                </div>

                                <div class="col-md-4 text-md-end">
                                    <button type="submit" class="btn btn-warning w-100 w-md-auto mt-2 mt-md-0">
                                        Activate Membership
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                } ?>


                <div class="mt-3 border rounded border-1 py-4 px-4 bg-light">
                    <h4 class="personal-details-title" style="font-weight: 500; margin-bottom: 15px;">Personal Details</h4>
                    <form onsubmit="updateProfile(event)">
                        <div class="row g-4 mb-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label for="firstName" class="form-label personal-details-title">First Name</label>
                                <input type="text" class="form-control bg-white text-dark border " id="firstName" placeholder="John" maxlength="30" required />
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label for="lastName" class="form-label personal-details-title">Last Name</label>
                                <input type="text" class="form-control bg-white text-dark  border " id="lastName" placeholder="Doe" maxlength="30" required />
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label personal-details-title">Email</label>
                                <input type="email" class="form-control bg-white text-dark  border " id="email" placeholder="john@example.com" required />
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label personal-details-title">Contact Number</label>
                                <input type="tel" class="form-control bg-white text-dark  border " id="phone" placeholder="07XXXXXXXX" pattern="^07[01245678][0-9]{7}$" required />
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6">
                                <label for="gender" class="form-label personal-details-title">Gender</label>
                                <select class="form-select bg-white text-dark  border rounded" id="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <!-- Birthday -->
                            <div class="col-md-6">
                                <label for="birthday" class="form-label personal-details-title">Birthday</label>
                                <input type="date" class="form-control bg-white text-dark  border " id="birthday" required />
                            </div>

                            <!-- Weight -->
                            <div class="col-md-6">
                                <label for="weight" class="form-label personal-details-title">Weight (kg)</label>
                                <input
                                    type="number"
                                    class="form-control bg-white text-dark  border "
                                    id="weight"
                                    placeholder="e.g. 70"
                                    min="1"
                                    max="500"
                                    step="0.1"
                                    required />
                            </div>

                            <!-- Height -->
                            <div class="col-md-6">
                                <label for="height" class="form-label personal-details-title">Height (cm)</label>
                                <input
                                    type="number"
                                    class="form-control bg-white text-dark  border "
                                    id="height"
                                    placeholder="e.g. 175"
                                    min="30"
                                    max="300"
                                    step="0.1"
                                    required />
                            </div>


                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-outline-warning btn-rounded login-title fw-bold">Update Profile</button>
                        </div>
                    </form>


                </div>
            </div>

            <div id="my_schedule" class="custom-section d-none">
                <h2 class="profile-section-header fw-bold">My Schedule</h2>
                <p style="font-family: Rajdhani, sans-serif; ">Your class schedules and bookings.</p>
                <div>
                    <div class="row py-3">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-schedules-inner">
                                <div class="date d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                    </svg>
                                    <span class="ms-2">2025/04/19 - 5:00pm -6:30pm</span>

                                </div>
                                <h5>Full Body Strength Training</h5>
                                <p>Burn fat and build muscle with a high-intensity full-body workout targeting all major muscle groups.</p>
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <h6>Instructor: John Carter</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-schedules-inner">
                                <div class="date d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                    </svg>
                                    <span class="ms-2">2025/04/19 - 5:00pm -6:30pm</span>

                                </div>
                                <h5>Full Body Strength Training</h5>
                                <p>Burn fat and build muscle with a high-intensity full-body workout targeting all major muscle groups.</p>
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <h6>Instructor: John Carter</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-schedules-inner">
                                <div class="date d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                    </svg>
                                    <span class="ms-2">2025/04/19 - 5:00pm -6:30pm</span>

                                </div>
                                <h5>Full Body Strength Training</h5>
                                <p>Burn fat and build muscle with a high-intensity full-body workout targeting all major muscle groups.</p>
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <h6>Instructor: John Carter</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="classes" class="custom-section d-none">
                <h2 class="profile-section-header fw-bold">Classes</h2>
                <div class="py-3">
                    <div class="row" id="classCardsContainer">
                        <!-- Example card -->
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <label>
                                <input type="radio" name="selectedClass" class="class-radio" value="class-id-1" />
                                <div class="card class-card p-3 h-100">
                                    <div class="card-body">
                                        <h5 class="card-title personal-details-title" style="font-weight: 600;">Yoga Basics</h5>
                                        <p class="card-text personal-details-title">Learn yoga with expert guidance. Perfect for beginners.</p>
                                        <ul class="mb-2">
                                            <li><strong>Date:</strong> 2024-04-25</li>
                                            <li><strong>Time:</strong> 6:00 PM - 7:00 PM</li>
                                            <li><strong>Instructor:</strong> Jane Doe</li>
                                            <li><strong>Price:</strong> $30/month</li>
                                        </ul>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <label>
                                <input type="radio" name="selectedClass" class="class-radio" value="class-id-1" />
                                <div class="card class-card p-3 h-100">
                                    <div class="card-body">
                                        <h5 class="card-title personal-details-title" style="font-weight: 600;">Yoga Basics</h5>
                                        <p class="card-text personal-details-title">Learn yoga with expert guidance. Perfect for beginners.</p>
                                        <ul class="mb-2">
                                            <li><strong>Date:</strong> 2024-04-25</li>
                                            <li><strong>Time:</strong> 6:00 PM - 7:00 PM</li>
                                            <li><strong>Instructor:</strong> Jane Doe</li>
                                            <li><strong>Price:</strong> $30/month</li>
                                        </ul>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <label>
                                <input type="radio" name="selectedClass" class="class-radio" value="class-id-1" />
                                <div class="card class-card p-3 h-100">
                                    <div class="card-body">
                                        <h5 class="card-title personal-details-title" style="font-weight: 600;">Yoga Basics</h5>
                                        <p class="card-text personal-details-title">Learn yoga with expert guidance. Perfect for beginners.</p>
                                        <ul class="mb-2">
                                            <li><strong>Date:</strong> 2024-04-25</li>
                                            <li><strong>Time:</strong> 6:00 PM - 7:00 PM</li>
                                            <li><strong>Instructor:</strong> Jane Doe</li>
                                            <li><strong>Price:</strong> $30/month</li>
                                        </ul>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="container my-5">
                        <h3 class="mb-3 personal-details-title">Register for a Class</h3>
                        <hr />

                        <!-- Alert with Bank Details -->
                        <div class="alert alert-danger" role="alert">
                            <strong>Bank Deposit Instructions:</strong><br />
                            Please deposit the payment to the following bank account and upload the deposit slip below:
                            <ul class="mt-2 mb-0">
                                <li><strong>Bank:</strong> Bank of Ceylon</li>
                                <li><strong>Branch:</strong> Galle</li>
                                <li><strong>Account Name:</strong> FitZone Fitness Center</li>
                                <li><strong>Account Number:</strong> 1234567890</li>
                            </ul>
                        </div>

                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                            </svg>
                            <div class="ms-2">
                                <strong>Heads up!</strong> Please select the class from above before clicking the <strong>Register Now</strong> button.
                            </div>
                        </div>


                        <!-- Upload + Button Row -->
                        <form>
                            <div class="row align-items-center gy-3">
                                <label for="depositSlip" class="form-label">Upload Deposit Slip</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="depositSlip" required />
                                </div>

                                <div class="col-md-4 text-md-end">
                                    <button type="submit" class="btn btn-warning w-100 w-md-auto mt-2 mt-md-0">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div id="inquiries" class="custom-section d-none">

                <h2 class="mb-3 profile-section-header fw-bold">Submit an Inquiry</h2>
                <div class="alert alert-warning personal-details-title" role="alert">
                    Need help? Send us your inquiry and our staff will respond shortly.
                </div>

                <!-- Inquiry Form -->
                <form id="inquiryForm" class="mb-4">
                    <div class="mb-3">
                        <label for="inquirySubject" class="form-label personal-details-title">Subject</label>
                        <input type="text" class="form-control bg-white border" id="inquirySubject" placeholder="e.g., Issue with class schedule" required>
                    </div>

                    <div class="mb-3">
                        <label for="inquiryMessage" class="form-label personal-details-title">Message</label>
                        <textarea class="form-control bg-white border" id="inquiryMessage" rows="4" placeholder="Type your inquiry here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning personal-details-title">Send Inquiry</button>
                </form>

                <!-- Replies Section -->
                <h4 class="mb-3 personal-details-title">Your Previous Inquiries & Replies</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover service-description">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Your Message</th>
                                <th scope="col">Staff Reply</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row -->
                            <tr>
                                <td>2025/04/19</td>
                                <td>Can I move my Yoga class to Monday?</td>
                                <td>Yes, we've rescheduled it to Monday 6PM.</td>
                                <td><span class="badge bg-success">Replied</span></td>
                            </tr>
                            <tr>
                                <td>2025/04/19</td>
                                <td>I paid but it doesn't reflect.</td>
                                <td>We're checking with accounts. Will update soon.</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Bootstrap Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Sidebar Toggle and Page Section Switcher -->
        <script src="../assets/js/script.js"></script>
</body>

</html>