<?php
$title = $_POST["title"];
$date = $_POST["date"];
$content = $_POST["content"];
$author = $_POST["author"];
$desc = $_POST["descripcion"];

require_once 'dbh.inc.php';

//imagen
require_once './Include/functions.inc.php';
if (emptyInput($title,$date,$content,$author, $desc,$img) == true){
  header("location:crear cuento.php?error=CampoVacío");
  exit();
};

if (correctDate($date) == true){
  header("location:crear cuento.php?error=formatoFechaIncorrecto");
  exit();
};
if (validate($title,$date,$content,$author,$desc,$img) == true){
  header("location:crear cuento.php?error=DatosErroneos");
  exit();
}
imgValidationAndSendData($conn,$title,$date,$content,$author,$desc);
header("location:crear cuento.php?error=impreso");
exit();
//imprimirCuento($conn,$title,$date,$content,$author,$desc,$fileNameNew);
