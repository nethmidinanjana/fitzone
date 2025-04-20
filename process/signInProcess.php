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
    $_SESSION["u"] = $user_data;

    // Check the role of the user
    $role = $user_data['role']; // Assuming 'role' is the column for user role in the database

    // Handle remember me functionality (cookies)
    if ($rememberme == "true") {
        // Set cookies for email and password that will last for 1 year
        setcookie("email", $email, time() + (60 * 60 * 24 * 365), "/", "", isset($_SERVER["HTTPS"]), true);
        setcookie("password", $password, time() + (60 * 60 * 24 * 365), "/", "", isset($_SERVER["HTTPS"]), true);
    } else {
        // If 'Remember Me' is unchecked, delete cookies
        setcookie("email", "", time() - 3600, "/");
        setcookie("password", "", time() - 3600, "/");
    }

    // Send the user's role back as the response to handle redirection
    echo $role;  // Role can be 'customer', 'staff', or 'admin'
    exit();
} else {
    // If login failed
    echo "Invalid username or password";
}
?>
