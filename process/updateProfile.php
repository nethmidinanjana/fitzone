<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["user_id"]) || !isset($_POST["weight"]) || !isset($_POST["height"])) {
        echo "Missing required fields.";
        exit;
    }

    $user_id = $_POST["user_id"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];

    $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
    $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : null;

    $update_fields = [];

    if ($gender !== null) {
        $update_fields[] = "gender_id = '$gender'";
    }

    if ($birthday !== null) {
        $update_fields[] = "bday = '$birthday'";
    }

    $update_fields[] = "weight = '$weight'";
    $update_fields[] = "height = '$height'";

    $update_query = "UPDATE user SET " . implode(", ", $update_fields) . " WHERE user_id = '$user_id'";

    if (Database::iud($update_query)) {
        echo "success";
    } else {
        echo "Update failed.";
    }
} else {
    echo "Invalid request method.";
}
