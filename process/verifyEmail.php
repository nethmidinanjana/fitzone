<?php
require "../includes/db.php";

$email = $_POST["email"];
$code = $_POST["code"];

$rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `verification_code`='" . $code . "'");

if ($rs->num_rows == 1) {
    // Update user status to verified
    Database::iud("UPDATE `user` SET `user_status_id` = '2' WHERE `email`='" . $email . "'");
    echo "verified";
} else {
    echo "invalid";
}
