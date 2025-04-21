<?php

session_start();

require "../includes/db.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

// Query the database for the user
$user_rs = Database::search("SELECT * FROM `user` WHERE `email`= '" . $email . "' AND `password`='" . $password . "'");
$user_num = $user_rs->num_rows;

if ($user_num == 1) {
    // User found, fetch user data
    $user_data = $user_rs->fetch_assoc();

    // Check if user is blocked
    if ($user_data["user_status_id"] == 3) {
        echo "Your account has been blocked. Please contact support.";
        exit();
    }

    // Store user in session
    $_SESSION["u"] = $user_data;

    // Check the role of the user
    $role = $user_data['role']; // 'customer', 'staff', or 'admin'

    // Handle remember me functionality (cookies)
    if ($rememberme == "true") {
        setcookie("email", $email, time() + (60 * 60 * 24 * 365), "/", "", isset($_SERVER["HTTPS"]), true);
        setcookie("password", $password, time() + (60 * 60 * 24 * 365), "/", "", isset($_SERVER["HTTPS"]), true);
    } else {
        setcookie("email", "", time() - 3600, "/");
        setcookie("password", "", time() - 3600, "/");
    }

    // Send the user's role back as the response to handle redirection
    echo $role;
    exit();
} else {
    echo "Invalid username or password";
}
