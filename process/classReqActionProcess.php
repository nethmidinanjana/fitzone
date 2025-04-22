<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];
    $user_id = $_POST["user_id"];
    $cls_id = $_POST["classId"];

    if (!$user_id || !$cls_id) {
        echo "Missing data";
        exit;
    }

    $status = $action === "accept" ? "accept" : "denied";

    // Update membership_request status
    $update_request = Database::iud("UPDATE class_request SET status = '$status' WHERE user_user_id = '$user_id'");

    if ($update_request && $action === "accept") {
        // Generate unique membership_id

        // Insert into customer_has_membership
        $insert = Database::iud("INSERT INTO user_has_class 
            (user_user_id, classes_class_id) 
            VALUES ('$user_id', '$cls_id')");

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
