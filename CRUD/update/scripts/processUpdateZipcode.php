<?php
require_once '../../../admin/scripts/verifyIsLoggedIn.php';
require_once '../../../DB/db_connect.php';

if (isset($_POST["submit"])) {

    $zipcode = filter_var($_POST["zipcode"], FILTER_SANITIZE_NUMBER_INT);
    $zipcode_city = filter_var($_POST["zipcode_city"], FILTER_SANITIZE_STRING);
    $zipcode_state = filter_var($_POST["zipcode_state"], FILTER_SANITIZE_STRING);
    $id = $_POST["id"];

    $sql = 'UPDATE Zipcode SET zipcode = '. $zipcode . ', zipcode_city = "'. $zipcode_city . '", zipcode_state = "' . $zipcode_state . '" WHERE zipcode_id = ' . $id;

    if (!$connection->query($sql)) {
        echo "ERROR: " . mysqli_error($connection);
    } else {
        header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/viewZipcode.php");
    }

}