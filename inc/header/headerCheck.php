<?php

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    include_once 'header-loggedin.php';
} else {
    include_once 'header.html';
}