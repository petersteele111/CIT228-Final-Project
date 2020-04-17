<?php

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    include_once 'movieHeaderLoggedIn.php';
} else {
    include_once 'movieHeader.php';
}