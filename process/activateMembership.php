<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_FILES["depositSlip"]) && isset($_POST["membershipPlan"]) && isset($_POST["user_id"])) {
        $plan = $_POST["membershipPlan"];
        $user_id = $_POST["user_id"];
        $file = $_FILES["depositSlip"];
    } else {
        echo "Missing required fields";
        exit;
    }

    // Validate uploaded file
    if ($file["error"] !== 0) {
        echo "Error uploading file.";
        exit;
    }

    $fileType = mime_content_type($file["tmp_name"]);
    $allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

    if (!in_array($fileType, $allowedTypes)) {
        echo "Only JPG, PNG, or JPEG images are allowed.";
        exit;
    }

    // Save the file
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    $targetDir = "../uploads/membership_slips/";
    $fileName = $user_id . ".png"; // always saving as PNG format (optional: keep original extension)
    $targetPath = $targetDir . $fileName;

    if (!move_uploaded_file($file["tmp_name"], $targetPath)) {
        echo "Failed to move uploaded file.";
        exit;
    }

    // Insert into database
    $relativeSlipPath = "uploads/membership_slips/" . $fileName;

    $insert_query = "INSERT INTO membership_request 
        (user_user_id, membership_id, deposit_slip_url, status)
        VALUES 
        ('$user_id', '$plan', '$relativeSlipPath', 'pending')";

    if (Database::iud($insert_query)) {
        echo "success";
    } else {
        echo "Database insertion failed.";
    }
} else {
    echo "Invalid request method.";
}
