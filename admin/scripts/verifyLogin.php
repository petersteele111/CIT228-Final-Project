<?php
session_start();

include '../../DB/db_connect.php';

if (isset($_POST["submit"])) {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];


    $sql = 'SELECT * FROM User WHERE user_email = "'.$email.'"';

    if ($result = $connection->query($sql)) {
        while ($row = $result->fetch_row()) {
            $user_email = $row[5];
            $user_password = $row[4];
            $id = $row[0];
            $name = $row[2];
        }

        if ($email != $user_email) {
            echo "ERROR: Email does not exist!";
        } else if (!password_verify($password, $user_password)) {
            echo "ERROR: Password is incorrect";
        } else {
            $_SESSION["logged_in"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            header("Location: https://cit228.pbsteele.com/FinalProject/admin/user/userProfile.php");
        }
    }
}

$connection->close();



