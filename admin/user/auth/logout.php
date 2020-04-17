<?php
session_start();

$_SESSION = array();

session_destroy();

header("location: https://cit228.pbsteele.com/FinalProject/");

exit();