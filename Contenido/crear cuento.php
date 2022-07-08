<?php
include_once "header.php";
require_once 'dbh.inc.php';
?>
<title>Home</title>
<body class="w3-theme">
  <div class="w3-display-middle w3-shadow w3-round w3-theme-l3 w3-container">

    <p class="w3-text-center">
      <h1>
        Escribe su cuento
      </h1>
    </p>
    <form class="w3-form" action="crear cuento.inc.php" method="post" enctype="multipart/form-data">
      <div class="w3-center w3-container">
        <input type="text" name="title" value="" placeholder="Título" class="w3-form">
        <input type="text" name="date" value="" placeholder="Fecha" class=" w3-form">
        <input type="text" name="author" value="David Chirino" class=" w3-form">
        <br>
      <textarea name="descripcion"placeholder="descripcion..."  rows="1" cols="80"></textarea>
      <textarea name="content"  rows="8" cols="80"></textarea>
      <input type="file" name="image" id="img" class="w3-right" >
      <input type="submit" name="" value="Imprimir" type="button">
    </div>
    <img src="" alt="">


    </form>

  </div>
<?php
include_once "footer.php";
?>
