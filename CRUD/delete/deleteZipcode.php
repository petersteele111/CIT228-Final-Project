<?php
require_once '../../admin/scripts/verifyIsLoggedIn.php';
require_once '../../DB/db_connect.php';

$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

$sql = 'DELETE FROM Zipcode WHERE zipcode_id = ' . $id;

if (!$connection->query($sql)) {
    echo "ERROR: " . mysqli_error($connection);
} else {
    header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/viewZipcode.php");
}