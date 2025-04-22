<?php
require "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inquiry_id = $_POST["inquiry_id"];
    $reply = $_POST["reply"];

    if (!$inquiry_id || !$reply) {
        echo "Missing data";
        exit;
    }

    $reply_safe = addslashes($reply); // escape apostrophes

    $update = Database::iud("UPDATE inquery SET reply = '$reply_safe', status = 'replied' WHERE inquery_id = '$inquiry_id'");

    echo $update ? "success" : "failed";
}
