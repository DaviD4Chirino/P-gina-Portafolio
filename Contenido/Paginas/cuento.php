<?php
  include_once '..\header.php';
  include_once '..\dbh.inc.php';
  include_once '../Include/navbar.php';
  include_once '../Include/functionBiblioteca.inc.php';
  $cuentoId = $_GET["cuento"];

  $sql = "SELECT * FROM `biblioteca` WHERE `cuentoId` = ".$cuentoId .";";
  $result =mysqli_query($conn,$sql);
  $cuento =mysqli_fetch_assoc($result);

  $contenido = $cuento["contenido"];
  $titulo = $cuento["titulo"];
  $explode =explode("\n",$contenido);
  $array = array();
  for ($i=0; $i < count($explode); $i++) {
    array_push($array,'<p class="w3-padding fs-4 w3-margin-top">'.$explode[$i]."</p>");
  };
?>
<link rel="stylesheet" href="../custom.css" />
<style media="screen">
  div.scrollmenu {
 white-space: nowrap;
  overflow: auto;
  }

  div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;

  }
  #myBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
  }
</style>
  <title><?php echo $titulo?> - David Escribe</title>
</head>

 <button onclick="topFunction()" id="myBtn" class="btn w3-black" title="Go to top">
   <img src="../svg/white/arrow-up-circle.svg" alt="" style="width: 50px;height:50px;">
 </button>

<br><br>
<body class="w3-black">
<div class="container  w3-padding  w3-white text-black w3-round-large">
  <br>

    <div class="container w3-padding w3-center w3-border-bottom ">
      <h1 class="fs-1"><?php echo $titulo;?></h1>
  <br>
    </div>

    <div class="container w3-padding w3-center">
      <img src="../svg/black/star.svg" class="w3-left" alt="" style="width: 25px;height: 25px;">
    </div>
<div class="container w3-margin-64 content w3-center w-75 w3-shadow fw-normal" id="contenido">
  <?php echo implode("\n",$array);?>

</div>
<br>
<br>
</div>
<div class="container w3-padding">
  <p class="text-white "> <h2 class="w3-border-bottom container">Continúa leyendo: </h2></p>
</div>
<div class="scrollmenu container w3-padding">

  <?php cuentoCartas($conn,$cuentoId) ?>
</div>
<br><br>

<?php if (isset($_SESSION["userId"]) and $_SESSION["userVerified"] == 1): ?>
  <div class="container w3-padding w3-round w3-white" id="comment">
    <form class="w3-container" action="<?php crearComentario($conn) ?>" method="post">
      <h1>Deja un comentario:</h1>
      <br>
      <input type="hidden" name="uid" value="<?php echo $_SESSION["userUid"];?>">
      <input type="hidden" name="cuentoid" value="<?php echo $cuentoId;?>">
      <input type="hidden" name="date" value="<?php  echo date('Y/m/d H:i:s')?>">
      <textarea class="w3-input w3-border w3-light-grey" name="comentario" rows="8" cols="120" placeholder="Añade un comentario"></textarea>
      <br>
      <button type="submit" class="btn btn-primary" name="commentSubmit">
        Enviar comentario.
      </button>
    </form>
  </div>

<?php else: ?>
  <div class="container w3-padding w3-round w3-white" id="comment">
    <form class="w3-container" action="<?php crearComentario($conn) ?>" method="post" disabled>
      <h1>Debes estar registrado y verificado para dejar un comentario:</h1>
      <br>
      <input type="hidden" name="uid" value="<?php echo $_SESSION["userUid"];?>">
      <input type="hidden" name="cuentoid" value="<?php echo $cuentoId;?>">
      <input type="hidden" name="date" value="<?php  echo date('Y/m/d H:i:s')?>">
      <textarea class="w3-input w3-border w3-light-grey" name="comentario" rows="8" cols="120" value="Debes estar registrado y verificado para poder comentar" disabled></textarea>
      <br>
      <button type="submit" class="btn btn-primary" name="commentSubmit" disabled>
        Enviar comentario.
      </button>
    </form>
  </div>

<?php endif; ?>
<br>
<div class="container w3-padding w3-round w3-white">
  <div class="container">
<br>
    <?php commentSection($conn,$cuentoId) ?>
</div>
</div>

<script>
  //Get the button
  var mybutton = document.getElementById("myBtn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<?php
include_once "../../Contenido/footer.php";
?>
