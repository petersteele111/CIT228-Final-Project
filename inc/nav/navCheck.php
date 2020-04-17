<?php

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    include_once 'nav-loggedin.php';
} else {
    include_once 'nav.html';
}