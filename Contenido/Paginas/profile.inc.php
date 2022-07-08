<?php
include_once "../Include/functions.inc.php";
include_once "../dbh.inc.php";
$id = $_SESSION["userId"];
profileImgValidation($conn,$id);
