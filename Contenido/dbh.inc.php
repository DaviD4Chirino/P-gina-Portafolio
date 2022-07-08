<?php

$serverName = "localhost:2000";
$dBUserName = "root";
$dBPasswordName = "";
$dBName = "portafolio";

$conn = mysqli_connect($serverName,$dBUserName,$dBPasswordName,$dBName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
