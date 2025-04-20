<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/fitzone-logo.png" type="image/png" />

    <!-- Donut Chart links -->
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
    </script>


    <!-- Donut Chart links -->

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


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

        #attendanceBarChart {
            height: 330px !important;
        }

        .chart-card {
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 16px;
            background-color: #fff;
            box-shadow: none !important;
        }

        .chart-canvas-container {
            height: 250px;
        }

        .personal-details-title {
            font-weight: 600;
            margin-top: 1rem;
            color: #333;
        }

        .dashboard-card {
            box-shadow: none !important;
            transform: none !important;
            transition: none !important;
        }

        .dashboard-card:hover {
            box-shadow: none !important;
            transform: none !important;
        }

        .search-bar {
            max-width: 500px;
            margin: auto auto;
        }

        .search-bar .input-group {
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .search-bar .form-control {
            border: none;
            padding-left: 20px;
        }

        .search-bar .btn {
            border: none;
            padding: 10px 20px;
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
                    <?php
                    if (true) {
                    ?>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white custom-sidebar-link" data-section="user_management">User Management</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white custom-sidebar-link" data-section="staff_management">Staff Management</a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="classes">Class Management</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white custom-sidebar-link" data-section="inquiries">Inquiry Managemnt</a>
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
                            <div class="rounded-box rounded-3" style="background-color: #FFC017;">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                    <div class="d-flex flex-column align-items-start text-start ms-3">
                                        <h5 class="profile-section-header fw-bold mb-1">Sahan Game</h5>
                                        <span class="text-white small profile-section-header">Admin</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-4">
                            <div class="rounded-box rounded-3" style="background-color: #1A2F45;">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                    </svg>
                                    <div class="d-flex flex-column align-items-start text-start ms-3">
                                        <h5 class="profile-section-header fw-bold mb-1">234</h5>
                                        <span class="text-white small profile-section-header">Total Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-4">
                            <div class="rounded-box rounded-3" style="background-color: #8B1E3F;">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                                        <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                                    </svg>
                                    <div class="d-flex flex-column align-items-start text-start ms-3">
                                        <h5 class="profile-section-header fw-bold mb-1">20</h5>
                                        <span class="text-white small profile-section-header">Total Classes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Donut Chart Card -->
                        <div class="col-md-4 col-12 mb-4">
                            <div class="card dashboard-card p-3 h-100">
                                <div id="donut-chart" class="chart-canvas-container"></div>
                                <div class="text-center mt-3">
                                    <h4 class="personal-details-title">Membership Distribution</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Bar Chart Card -->
                        <div class="col-md-8 col-12 mb-4">
                            <div class="card dashboard-card p-3 h-100">
                                <canvas id="attendanceBarChart" class="chart-canvas-container"></canvas>
                                <div class="text-center mt-3">
                                    <h4 class="personal-details-title">Class Attendance by Type</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="user_management" class="custom-section d-none">
                <h2 class="profile-section-header fw-bold mb-4">User Management</h2>

                <!-- Search Bar -->
                <div class="col-12 mb-4">
                    <div class="input-group w-100">
                        <input
                            type="text"
                            class="form-control bg-white border"
                            placeholder="Search user..."
                            aria-label="Search"
                            aria-describedby="search-addon">
                        <button class="btn btn-outline-secondary" type="button" id="search-addon">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>


                <!-- User Cards Container -->
                <div id="userCards" class="row g-3">
                    <!-- Example User Card -->
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="staff_management" class="custom-section d-none">
                <h2 class="profile-section-header fw-bold mb-4">Staff Management</h2>

                <!-- Search Bar -->
                <div class="col-12 mb-4">
                    <div class="input-group w-100">
                        <input
                            type="text"
                            class="form-control bg-white border"
                            placeholder="Search staff..."
                            aria-label="Search"
                            aria-describedby="search-addon">
                        <button class="btn btn-outline-secondary" type="button" id="search-addon">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>


                <!-- User Cards Container -->
                <div id="userCards" class="row g-3">
                    <!-- Example User Card -->
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                        <div class="card h-100 shadow-sm p-2">
                            <div class="card-body p-2 text-center">
                                <h6 class="fw-bold mb-1">John Doe</h6>
                                <small class="d-block text-muted">M12345</small>
                                <small class="d-block text-muted">john@example.com</small>
                                <small class="d-block text-muted">+1234567890</small>
                                <button class="btn btn-outline-danger btn-sm mt-2">Block</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="classes" class="custom-section d-none">
                <div class="">
                    <div class="container">
                        <h3 class="mb-3 personal-details-title">Update Class</h3>
                        <hr />

                        <!-- Class Selection Dropdown -->
                        <div class="mb-4">
                            <label for="classSelect" class="form-label fw-semibold">Select Class</label>
                            <select class="form-select bg-white border" id="classSelect">
                                <option selected disabled>Choose a class to update</option>
                                <option value="1">Yoga Basics</option>
                                <option value="2">Zumba Burn</option>
                                <option value="3">HIIT Express</option>
                            </select>
                        </div>

                        <!-- Update Form -->
                        <form id="updateClassForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Class Title</label>
                                    <input type="text" class="form-control bg-white border text-black" id="title" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="instructor" class="form-label">Instructor</label>
                                    <select class="form-control bg-white border text-black" id="instructor" required>
                                        <option value="">Select an instructor</option>
                                        <option value="instructor1">Instructor 1</option>
                                        <option value="instructor2">Instructor 2</option>
                                        <option value="instructor3">Instructor 3</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>


                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-white border text-black" id="description" rows="2" required></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control bg-white border text-black" id="date" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control bg-white border text-black" id="time" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="price" class="form-label">Price (LKR/month)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border">RS</span>
                                        <input type="number" class="form-control bg-white border text-black" id="price" placeholder="30" min="0" step="1" required>
                                    </div>
                                </div>

                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-warning px-5">Update Class</button>
                            </div>
                        </form>
                    </div>

                    <div class="container my-5">
                        <h3 class="mb-3 personal-details-title">Add New Class</h3>
                        <hr />

                        <form>
                            <div class="row gy-3">

                                <div class="col-md-6">
                                    <label for="classTitle" class="form-label">Class Title</label>
                                    <input type="text" class="form-control bg-white border text-black" id="classTitle" placeholder="Yoga Basics" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="instructor" class="form-label">Instructor</label>
                                    <select class="form-control bg-white border text-black" id="instructor" required>
                                        <option value="">Select an instructor</option>
                                        <option value="instructor1">Instructor 1</option>
                                        <option value="instructor2">Instructor 2</option>
                                        <option value="instructor3">Instructor 3</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-white border text-black" id="description" rows="3" placeholder="Learn yoga with expert guidance. Perfect for beginners." required></textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control bg-white border text-black" id="date" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control bg-white border text-black" id="time" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="price" class="form-label">Price (LKR/month)</label>
                                    <div class="input-group">
                                        <span class="input-group-text border">RS</span>
                                        <input type="number" class="form-control bg-white border text-black" id="price" placeholder="30" min="0" required>
                                    </div>
                                </div>

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-warning mt-3 px-5">
                                        Add New Class
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>


            </div>


            <div id="inquiries" class="custom-section d-none">
                <h2 class="mb-3 profile-section-header fw-bold">Manage Inquiries</h2>

                <!-- Unreplied Inquiries Section -->
                <h6 class="mt-4 personal-details-title">Unreplied Inquiries</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover service-description">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Date - Time</th>
                                <th scope="col">Membership Id</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row for an unanswered inquiry -->
                            <tr>
                                <td>2025/04/19 - 11:38:00</td>
                                <td>FIT02373</td>
                                <td>I paid but it doesn't reflect.</td>
                                <td>
                                    <button class="btn btn-warning">Reply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2025/04/17 - 09:15:00</td>
                                <td>FIT02375</td>
                                <td>My membership renewal was unsuccessful.</td>
                                <td>
                                    <button class="btn btn-warning">Reply</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Replied Inquiries Section -->
                <h6 class="mt-4 personal-details-title">Replied Inquiries</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover service-description">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Date - Time</th>
                                <th scope="col">Membership Id</th>
                                <th scope="col">Message</th>
                                <th scope="col">Reply Message</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row for a replied inquiry -->
                            <tr>
                                <td>2025/04/18 - 14:20:00</td>
                                <td>FIT02374</td>
                                <td>I am unable to log in.</td>
                                <td>We’ve reset your password. Please check your email.</td>
                                <td>
                                    <button class="btn btn-success" disabled>Replied</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2025/04/16 - 16:30:00</td>
                                <td>FIT02376</td>
                                <td>My payment isn't showing up.</td>
                                <td>Your payment has been processed. Please check again.</td>
                                <td>
                                    <button class="btn btn-success" disabled>Replied</button>
                                </td>
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

        <!-- Donut chart js -->
        <script>
            let chart = bb.generate({
                data: {
                    columns: [
                        ["Basic", 2],
                        ["Standard", 4],
                        ["Premium", 3],
                    ],
                    type: "donut"
                },
                donut: {
                    title: "234",
                },
                bindto: "#donut-chart",
            });

            // Bar chart

            const ctx = document.getElementById('attendanceBarChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Yoga', 'Zumba', 'HIIT', 'Weight Training', 'Pilates', 'Spin'],
                    datasets: [{
                        label: 'Attendees',
                        data: [45, 60, 35, 70, 40, 55],
                        backgroundColor: [
                            '#FFC017',
                            '#FF6B1A',
                            '#42A5F5',
                            '#66D19E',
                            '#6C4AB6',
                            '#333333'
                        ],
                        borderRadius: 8,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#000',
                            titleColor: '#fff',
                            bodyColor: '#fff'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 10,
                                color: '#555'
                            },
                            grid: {
                                color: '#eee'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#555'
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        </script>
</body>

</html>