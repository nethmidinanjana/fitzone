<?php
require "../includes/db.php";

if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];

    // Get current status and role
    $rs = Database::search("SELECT user_status_id, role FROM user WHERE user_id = '" . $user_id . "'");
    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();
        $current_status = $data["user_status_id"];
        $role = $data["role"];

        // Decide new status
        if ($current_status == 3) {
            // Unblock logic
            if ($role == "staff") {
                // Staff unblock -> set to NULL
                Database::iud("UPDATE user SET user_status_id = NULL WHERE user_id = '" . $user_id . "'");
                echo "2";
            } else {
                // Regular user unblock -> set to 2
                Database::iud("UPDATE user SET user_status_id = 2 WHERE user_id = '" . $user_id . "'");
                echo "2";
            }
        } else {
            // Block logic (common for all)
            Database::iud("UPDATE user SET user_status_id = 3 WHERE user_id = '" . $user_id . "'");
            echo "3";
        }
    } else {
        echo "user_not_found";
    }
} else {
    echo "invalid_request";
}
