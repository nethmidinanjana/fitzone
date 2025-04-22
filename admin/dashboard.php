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
    <?php
    session_start();
    require_once "../includes/db.php";

    if (isset($_SESSION["u"])) {
        $data = $_SESSION["u"];

        if ($data["role"] == "admin" || $data["role"] == "staff") {
            $user_id = $data["user_id"];
    ?>

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
                                <a href="#" class="nav-link text-white custom-sidebar-link" data-section="user_management">User Management</a>
                            </li>
                            <?php
                            if ($data["role"] == "admin") {
                            ?>

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
                        <button class="btn btn-danger w-100" data-section="logout" onclick="logout();">Logout</button>
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
                                                <h5 class="profile-section-header fw-bold mb-1"><?php echo $data["first_name"] . " " . $data["last_name"]; ?></h5>
                                                <span class="text-white small profile-section-header"><?php echo $data["role"] == "admin" ? "Admin" : "Staff"; ?></span>
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
                                                <?php
                                                $total_user_rs = Database::search("SELECT * FROM `user` WHERE user.role = 'customer'");
                                                $user_count = $total_user_rs->num_rows;

                                                if ($user_count > 0) {
                                                    $formatted_count = str_pad($user_count, 3, '0', STR_PAD_LEFT);
                                                ?>
                                                    <h5 class="profile-section-header fw-bold mb-1"><?php echo $formatted_count; ?></h5>
                                                <?php
                                                } else {
                                                ?>
                                                    <h5 class="profile-section-header fw-bold mb-1">No user yet.</h5>
                                                <?php
                                                }
                                                ?>
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
                                                <?php
                                                $total_class_rs = Database::search("SELECT * FROM `classes`");

                                                if ($total_class_rs->num_rows > 0) {
                                                    $class_count = $total_class_rs->num_rows;

                                                    $formatted_cls_count = str_pad($class_count, 2, '0', STR_PAD_LEFT);

                                                ?>
                                                    <h5 class="profile-section-header fw-bold mb-1"><?php echo $formatted_cls_count; ?></h5>
                                                <?php

                                                } else {
                                                ?>

                                                    <h5 class="profile-section-header fw-bold mb-1">No class yet</h5>

                                                <?php
                                                }
                                                ?>
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
                        <h2 class="profile-section-header fw-bold ">User Management</h2>

                        <!-- If and admin. Block/Unblock users -->
                        <?php
                        if ($data["role"] == "admin") {
                        ?>

                            <!-- User Cards Container -->
                            <div id="userCards" class="row g-3 mb-5 mt-4">
                                <!-- Example User Card -->
                                <?php
                                $user_rs = Database::search("SELECT * FROM user WHERE user.role = 'customer' AND (user.user_status_id = 2 OR user.user_status_id = 3)");

                                if ($user_rs->num_rows > 0) {
                                    while ($user_data = $user_rs->fetch_assoc()) {
                                ?>
                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                                            <div class="card h-100 shadow-sm p-2">
                                                <div class="card-body p-2 text-center">
                                                    <h6 class="fw-bold mb-1"><?php echo $user_data["first_name"] . " " . $user_data["last_name"] ?></h6>
                                                    <small class="d-block text-muted"><?php echo $user_data["user_id"]; ?></small>
                                                    <small class="d-block text-muted"><?php echo $user_data["email"]; ?></small>
                                                    <small class="d-block text-muted"><?php echo $user_data["contact"]; ?></small>
                                                    <button class="btn btn-outline-danger btn-sm mt-2"
                                                        onclick="blockOrUnblockUser(<?php echo $user_data['user_id']; ?>, this)">
                                                        <?php echo $user_data["user_status_id"] == 3 ? "Unblock" : "Block"; ?>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- If a staff memebr - User membership requests - to accept or deny -->

                        <?php
                        if ($data["role"] == "staff") {
                        ?>
                            <p style="font-family: Rajdhani, sans-serif; ">Membership requests to accept or deny.</p>

                            <!-- User Cards Container -->
                            <div id="userCards" class="row g-3">
                                <?php
                                $memb_req_rs = Database::search("SELECT * FROM membership_request INNER JOIN user ON membership_request.user_user_id = user.user_id INNER JOIN membership ON membership_request.membership_id = membership.id WHERE membership_request.`status` = 'pending'");

                                if ($memb_req_rs->num_rows > 0) {
                                    while ($memb_req_data = $memb_req_rs->fetch_assoc()) {
                                ?>
                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card mb-3">
                                            <div class="card h-100 shadow-sm p-2">
                                                <div class="card-body p-2 text-center">
                                                    <h6 class="fw-bold mb-1"><?php echo $memb_req_data["first_name"] . " " . $memb_req_data["last_name"]; ?></h6>
                                                    <small class="d-block text-muted"><?php echo $memb_req_data["name"] ?> Plan</small>
                                                    <small class="d-block text-muted"><?php echo $memb_req_data["email"] ?></small>
                                                    <small class="d-block text-muted"><?php echo $memb_req_data["contact"] ?></small>

                                                    <button
                                                        class="btn btn-warning btn-sm mt-3 w-100"
                                                        onclick="showImageModal('/fitzone/<?php echo $memb_req_data['deposit_slip_url']; ?>')">
                                                        View
                                                    </button>

                                                    <div class="d-flex flex-sm-row flex-column justify-content-between mt-1 gap-2">
                                                        <button
                                                            class="btn btn-success btn-sm flex-fill"
                                                            onclick="handleMembershipAction('accept', <?php echo $memb_req_data['user_user_id']; ?>, <?php echo $memb_req_data['membership_id']; ?>)">
                                                            Accept
                                                        </button>

                                                        <button
                                                            class="btn btn-danger btn-sm flex-fill"
                                                            onclick="handleMembershipAction('deny', <?php echo $memb_req_data['user_user_id']; ?>, <?php echo $memb_req_data['membership_id']; ?>)">
                                                            Deny
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>


                            </div>
                        <?php
                        }
                        ?>
                    </div>



                    <div id="staff_management" class="custom-section d-none">
                        <h2 class="profile-section-header fw-bold mb-4">Staff Management</h2>

                        <!-- User Cards Container -->
                        <div id="userCards" class="row g-3 mt-3">
                            <?php
                            $staff_rs = Database::search("SELECT * FROM user WHERE user.role = 'staff' ");

                            if ($staff_rs->num_rows > 0) {
                                while ($staff_data = $staff_rs->fetch_assoc()) {
                            ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card">
                                        <div class="card h-100 shadow-sm p-2">
                                            <div class="card-body p-2 text-center">
                                                <h6 class="fw-bold mb-1"><?php echo $staff_data["first_name"] . " " . $staff_data["last_name"]; ?></h6>
                                                <small class="d-block text-muted"><?php echo $staff_data["user_id"]; ?></small>
                                                <small class="d-block text-muted"><?php echo $staff_data["email"]; ?></small>
                                                <small class="d-block text-muted"><?php echo $staff_data["contact"]; ?></small>
                                                <button class="btn btn-outline-danger btn-sm mt-2"
                                                    onclick="blockOrUnblockUser(<?php echo $staff_data['user_id']; ?>, this)">
                                                    <?php echo $staff_data["user_status_id"] == 3 ? "Unblock" : "Block"; ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>

                    </div>

                    <div id="classes" class="custom-section d-none">
                        <div class="">
                            <h2 class="profile-section-header fw-bold mb-">Class Management</h2>

                            <p style="font-family: Rajdhani, sans-serif; ">Class requests to accept or deny.</p>

                            <!-- User Cards Container -->
                            <div id="userCards" class="row g-3">
                                <?php
                                $cls_req_rs = Database::search("SELECT * FROM class_request INNER JOIN user ON class_request.user_user_id = user.user_id INNER JOIN classes ON class_request.classes_class_id = classes.class_id WHERE class_request.`status` = 'pending'");

                                if ($cls_req_rs->num_rows > 0) {
                                    while ($cls_req_data = $cls_req_rs->fetch_assoc()) {
                                ?>
                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 user-card mb-3">
                                            <div class="card h-100 shadow-sm p-2">
                                                <div class="card-body p-2 text-center">
                                                    <h6 class="fw-bold mb-1"><?php echo $cls_req_data["first_name"] . " " . $cls_req_data["last_name"]; ?></h6>
                                                    <small class="d-block text-muted"><?php echo $cls_req_data["title"] ?></small>
                                                    <small class="d-block text-muted"><?php echo $cls_req_data["email"] ?></small>
                                                    <small class="d-block text-muted">Rs. <?php echo $cls_req_data["price"] ?></small>

                                                    <button
                                                        class="btn btn-warning btn-sm mt-3 w-100"
                                                        onclick="showImageModal('/fitzone/<?php echo $cls_req_data['cls_fee_deposit_slip_url']; ?>')">
                                                        View
                                                    </button>


                                                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 mt-2">
                                                        <button
                                                            class="btn btn-success btn-sm flex-fill"
                                                            onclick="handleClassReqAction('accept', <?php echo $cls_req_data['user_user_id']; ?>, <?php echo $cls_req_data['classes_class_id']; ?>)">
                                                            Accept
                                                        </button>

                                                        <button
                                                            class="btn btn-danger btn-sm flex-fill"
                                                            onclick="handleClassReqAction('deny', <?php echo $cls_req_data['user_user_id']; ?>, <?php echo $cls_req_data['classes_class_id']; ?>)">
                                                            Deny
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <span class="alert alert-warning">No Data To Show.</span>
                                <?php
                                }
                                ?>

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
                                        <th scope="col">User Id</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $inquiry_rs = Database::search("SELECT * FROM inquery WHERE inquery.`status` = 'pending' ORDER BY sent_date_time DESC");

                                    if ($inquiry_rs->num_rows > 0) {
                                        while ($row = $inquiry_rs->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $row['sent_date_time'] ?></td>
                                                <td><?= $row['from_user_id'] ?></td>
                                                <td><?= $row['message'] ?></td>
                                                <td>
                                                    <button
                                                        class="btn btn-warning"
                                                        onclick="openReplyModal(<?= $row['inquery_id'] ?>)">
                                                        Reply
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td>No Inquiries Yet.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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
                                        <th scope="col">User Id</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Reply Message</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $inqry_rs = Database::search("SELECT * FROM inquery WHERE inquery.`status` = 'replied' ORDER BY sent_date_time DESC");

                                    if ($inqry_rs->num_rows > 0) {
                                        while ($inqry_data = $inqry_rs->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $inqry_data['sent_date_time'] ?></td>
                                                <td><?= $inqry_data['from_user_id'] ?></td>
                                                <td><?= $inqry_data['message'] ?></td>
                                                <td><?= $inqry_data['reply'] ?></td>
                                                <td>
                                                    <button class="btn btn-success" disabled>
                                                        Replied
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td>No Inquiries Yet.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Reply Modal -->
                    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="replyModalLabel">Reply to Inquiry</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <textarea id="replyMessage" class="form-control bg-white text-black border" rows="4" placeholder="Type your reply here..."></textarea>
                                    <input type="hidden" id="inquiryId">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" onclick="sendReply()">Send Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deposit Slip</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img id="modalImage" src="" alt="Deposit Slip" class="img-fluid rounded" />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            } else {
                // Access denied for logged in users with wrong role
                ?>
                    <div class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #f8f9fa;">
                        <div class="text-center bg-white p-5 rounded shadow-lg" style="max-width: 500px; width: 100%;">
                            <h2 class="text-danger mb-4">Access Denied</h2>
                            <p class="lead text-muted">You do not have permission to access this page.</p>
                            <a href="/fitzone/pages/login.php" class="btn btn-primary">Go to Login</a>
                        </div>
                    </div>
                <?php
            }
        } else {
            // Access denied for not logged in users
                ?>
                <div class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #f8f9fa;">
                    <div class="text-center bg-white p-5 rounded shadow-lg" style="max-width: 500px; width: 100%;">
                        <h2 class="text-danger mb-4">Access Denied</h2>
                        <p class="lead text-muted">You need to log in to access your profile. Please log in to continue.</p>
                        <a href="/fitzone/pages/login.php" class="btn btn-primary">Go to Login</a>
                    </div>
                </div>
            <?php
        }
            ?>

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

                function showImageModal(imageUrl) {
                    const modalImg = document.getElementById("modalImage");
                    modalImg.src = imageUrl; // Set the image src

                    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
                    modal.show(); // Show the modal
                }
            </script>
</body>

</html>