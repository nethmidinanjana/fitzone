<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["inquiryMessage"], $_POST["user_id"])) {

        $from_user_id = addslashes($_POST["user_id"]);
        $message = addslashes($_POST["inquiryMessage"]);

        if (empty(trim($message))) {
            echo "Please enter a message.";
            exit;
        }

        // Get current date and time 
        $sent_date_time = date("Y-m-d H:i:s");

        $result = Database::iud("INSERT INTO inquery (from_user_id, message, status, sent_date_time) 
                                 VALUES ('" . $from_user_id . "', '" . $message . "', 'pending', '" . $sent_date_time . "')");

        if ($result) {
            echo "success";
        } else {
            echo "Failed to submit inquiry.";
        }
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request.";
}
