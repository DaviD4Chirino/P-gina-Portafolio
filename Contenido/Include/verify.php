<?php
include_once "../header.php";
include_once "navbar.php";
?>
<title>Verificación</title>
</head>
<body class="w3-theme">
<?php
if (isset($_GET["vkey"])) {
  include_once '../dbh.inc.php';
  include_once 'functions.inc.php';
  $vkey = $_GET["vkey"];
    verifyEmail($conn,$vkey);
    echo '<div class="w3-display-middle w3-padding content">
      <h1 class="w3-center">¡Verificado con éxito!</h1>
      <img src="../svg/white/mail-open.svg" alt="Verificado" style="width: 500px; height:400px;">
    </div>';
  }
else {
  die("Algo terrible pasó");
}
?>
