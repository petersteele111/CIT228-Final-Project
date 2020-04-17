<?php
require_once '../../../DB/db_connect.php';
if (isset($_POST["submit"])) {
    $name = filter_var($_POST["studio_name"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["studio_phone"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["studio_email"], FILTER_SANITIZE_EMAIL);
    $address = filter_var($_POST["studio_address"], FILTER_SANITIZE_STRING);
    $zipcode_id = filter_var($_POST["zipcode"], FILTER_SANITIZE_NUMBER_INT);

    $sql = 'INSERT INTO Studio (zipcode_id, studio_name, studio_phone, studio_email, studio_address) VALUES ('.$zipcode_id.', "'.$name.'", "'.$phone.'", "'.$email.'", "'.$address.'" )';

    if (!$connection->query($sql)) {
        echo "ERROR: " . mysqli_error($connection);
    } else {
        header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/viewStudio.php");
    }
}