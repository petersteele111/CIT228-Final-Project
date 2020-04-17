<?php

$server = "localhost";

$username = "";

$password = "";

$database = "";



// Create the connection for the database

$connection = new mysqli($server, $username, $password, $database);



// Check to see if the connection succeeds

if ($connection->connect_error) {

    die("Connection has failed: " . $connection ->connect_error);

}

