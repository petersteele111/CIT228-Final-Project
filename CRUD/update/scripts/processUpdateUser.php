<?php
require_once '../../../admin/scripts/verifyIsLoggedIn.php';
require_once '../../../DB/db_connect.php';

if (isset($_POST["submit"])) {

    $user_first_name = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
    $user_last_name = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
    $user_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $user_phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $user_address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $zipcode_id = $_POST["zipcode"];
    $id = $_POST["id"];

    $sql = 'UPDATE User SET zipcode_id = '. $zipcode_id . ', user_first_name = "'. $user_first_name . '", user_last_name = "' . $user_last_name . '", user_email = "' . $user_email . '", user_phone = "' .$user_phone . '", user_address = "' . $user_address . '" WHERE user_id = ' . $id;

    if (!$connection->query($sql)) {
        echo "ERROR: " . mysqli_error($connection);
    } else {
        header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/viewUser.php");
    }

}