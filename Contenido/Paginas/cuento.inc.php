<?php
include_once "../dbh.inc.php";

$user = $_SESSION["userUid"];
$comentario = mysqli_real_escape_string($conn,$_POST["comentario"]);
$usuario= mysqli_real_escape_string($conn,$user);
$ubicacion = mysqli_real_escape_string($conn,$_GET["cuento"]);
$fecha = date("D/m/y");
