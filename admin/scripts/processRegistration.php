<?php
include '../../DB/db_connect.php';

if (isset($_POST["submit"])) {
    $first = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
    $last = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO User (user_first_name, user_last_name, user_password, user_email) VALUE ('$first', '$last', '$hashed_password', '$email')";

    if ($connection->query($sql) === true) {
        $msg = "Success! " . $sql;
        header("Location: https://cit228.pbsteele.com/FinalProject/admin/user/auth/login.php");
    } else {
        $msg = "Error: " . mysqli_error($connection);
    }
}
$connection->close();

