<?php
require_once '../../../admin/scripts/verifyIsLoggedIn.php';
require_once '../../../DB/db_connect.php';

if (isset($_POST["submit"])) {

    $studio_name = filter_var($_POST["studio_name"], FILTER_SANITIZE_STRING);
    $studio_phone = filter_var($_POST["studio_phone"], FILTER_SANITIZE_STRING);
    $studio_email = filter_var($_POST["studio_email"], FILTER_SANITIZE_EMAIL);
    $studio_address = filter_var($_POST["studio_address"], FILTER_SANITIZE_STRING);
    $zipcode_id = filter_var($_POST["zipcode"], FILTER_SANITIZE_NUMBER_INT);

    $id = $_POST["id"];

    $sql = 'UPDATE Studio SET zipcode_id = '. $zipcode_id . ', studio_name = "'. $studio_name . '", studio_phone = "' . $studio_phone . '", studio_email = "' . $studio_email . '", studio_address = "' .$studio_address . '" WHERE studio_id = ' . $id;

    if (!$connection->query($sql)) {
        echo "ERROR: " . mysqli_error($connection);
    } else {
        header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/viewStudio-loggedin.php");
    }

}