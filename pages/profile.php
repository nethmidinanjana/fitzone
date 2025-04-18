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
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="dashboard">Dashboard</a>
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
            <div id="dashboard" class="custom-section">
                <h2 class="profile-section-header fw-bold">Dashboard</h2>
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
                                <div class="date">
                                    <i class="fa fa-clock-o"></i>
                                    5:00pm -6:30pm
                                </div>
                                <h5>Improving the quality of the management.</h5>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua</p>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h6>Dr. Ariful Islam Abid</h6>
                                        <p>Ceo of AIA software agency, USA.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-schedules-inner">
                                <div class="date">
                                    <i class="fa fa-clock-o"></i>
                                    5:00pm -6:30pm
                                </div>
                                <h5>Improving the quality of the management.</h5>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua</p>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h6>Dr. Ariful Islam Abid</h6>
                                        <p>Ceo of AIA software agency, USA.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-schedules-inner lunch-schedules text-center">
                                <div class="lunch-schedules-inner align-self-center">
                                    <div class="icons">
                                        <img src="https://www.bootdey.com/image/200x200/00FFFF/000000" alt="img">
                                    </div>
                                    <h5>Lunch Break</h5>
                                    <div class="date">
                                        <i class="fa fa-clock-o"></i>
                                        5:00pm -6:30pm
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="classes" class="custom-section d-none">
                <h2 class="profile-section-header fw-bold">Classes</h2>
                <p>Here are your past orders.</p>
            </div>

            <div id="inquiries" class="custom-section d-none">
                <h2 class="profile-section-header fw-bold">Inquiries</h2>
                <p>You have been logged out (not really, just placeholder).</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle and Page Section Switcher -->
    <script src="../assets/js/script.js"></script>
</body>

</html>