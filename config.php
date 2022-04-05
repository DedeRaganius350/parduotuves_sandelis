<?php

// ijungti klaidu pranesimus
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// jungiames prie duomenu bazes
$database = mysqli_connect('localhost', 'root', '', 'parduotuves_sandelis');

// Tikrinam ar pavyko prisijungti prie duomenu bazes
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}