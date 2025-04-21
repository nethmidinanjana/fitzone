<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_FILES["depositSlip"], $_POST["classId"], $_POST["user_id"])) {
        $classId = $_POST["classId"];
        $user_id = $_POST["user_id"];
        $file = $_FILES["depositSlip"];
    } else {
        echo "Missing required fields.";
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
    $targetDir = "../uploads/class_fee/";
    $fileName = $user_id . ".png"; // you can also use $ext if you want to keep original format
    $targetPath = $targetDir . $fileName;

    if (!move_uploaded_file($file["tmp_name"], $targetPath)) {
        echo "Failed to move uploaded file.";
        exit;
    }

    // Save path for DB
    $relativeSlipPath = "uploads/class_fee/" . $fileName;

    // Insert into database
    $insert_query = "INSERT INTO class_request 
        (user_user_id, classes_class_id, cls_fee_deposit_slip_url, status)
        VALUES 
        ('$user_id', '$classId', '$relativeSlipPath', 'pending')";

    if (Database::iud($insert_query)) {
        echo "success";
    } else {
        echo "Database insertion failed.";
    }
} else {
    echo "Invalid request method.";
}
