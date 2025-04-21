<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];
    $user_id = $_POST["user_id"];
    $memb_id = $_POST["memb_id"];

    if (!$user_id || !$memb_id) {
        echo "Missing data";
        exit;
    }

    $status = $action === "accept" ? "accept" : "denied";

    // Update membership_request status
    $update_request = Database::iud("UPDATE membership_request SET status = '$status' WHERE user_user_id = '$user_id'");

    if ($update_request && $action === "accept") {
        // Generate unique membership_id
        $unique_id = "FIT" . str_pad($user_id, 5, "0", STR_PAD_LEFT); 

        $date = date("Y-m-d H:i:s");

        // Insert into customer_has_membership
        $insert = Database::iud("INSERT INTO customer_has_membership 
            (user_id, membership_id, memb_id, status, membership_date) 
            VALUES ('$user_id', '$unique_id', '$memb_id', 'approved', '$date')");

        if ($insert) {
            echo "success";
        } else {
            echo "Insert failed";
        }
    } elseif ($action === "deny") {
        echo "success";
    } else {
        echo "Update failed";
    }
}
