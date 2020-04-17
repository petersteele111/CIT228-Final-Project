<?php
require_once '../scripts/verifyIsLoggedIn.php';
require_once '../../DB/db_connect.php';

$movie_id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
$user_id = $_SESSION["id"];

$sql = 'REPLACE INTO User_Movie (user_id, movie_id) VALUES ('.$user_id.', '.$movie_id.')';
if (!$connection->query($sql)) {
    echo "ERROR: " . mysqli_error($connection);
} else {
    header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewAll-loggedin.php");
}