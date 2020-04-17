<?php
require_once '../../../DB/db_connect.php';

if (isset($_POST["submit"])) {
    $zipcode = filter_var($_POST["zipcode"], FILTER_SANITIZE_NUMBER_INT);
    $zipcode_city = filter_var($_POST["zipcode_city"], FILTER_SANITIZE_STRING);
    $zipcode_state = filter_var($_POST["zipcode_state"], FILTER_SANITIZE_STRING);

    $sql = 'INSERT INTO Zipcode (zipcode, zipcode_city,zipcode_state) VALUES ('.$zipcode.', "'.$zipcode_city.'", "'.$zipcode_state.'")';

    if (!$connection->query($sql)) {
        echo "ERROR: " . mysqli_error($connection);
    } else {
        header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/viewZipcode.php");
    }
}