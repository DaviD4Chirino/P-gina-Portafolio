<?php
function cuentoCartas($conn,$cuentoId){
  $sql = "SELECT * FROM `biblioteca` ORDER BY `cuentoId` DESC;";
  $result = mysqli_query($conn,$sql);
  while($col =  mysqli_fetch_assoc($result)){
    if ($col["cuentoId"] == $cuentoId) {
      continue;
    } else {
      echo '
      <a href="cuento.php?cuento='.$col["cuentoId"].'" class="btn w3-hover-shadow w3-round">
        <div class=" row flex-nowrap" >
          <div class="card flex-wrap text-white bg-dark" style="width:250px">
            <img src="../../img/'.$col["imagen"].'" class="card-img-top w3-image" alt="'.$col["titulo"].'" style="max-height:200px;">
            <div class="card-body text-wrap">
              <h5 class="card-title">'.$col["titulo"].'</h5>
              <p class="card-text">'.$col["descripcion"].'</p>
              <p class="card-text"><small class="text-muted">'.$col["fecha"].'</small></p>
            </div>
          </div>
        </div>
      </a>';
    }

  }
}
function bibliotecaCartas($conn){
  $sql = "SELECT * FROM `biblioteca` ORDER BY `cuentoId` DESC;";
  $result = mysqli_query($conn,$sql);
  while($col =  mysqli_fetch_assoc($result)) {

    echo   '
    <div class="col">

        <a href="../Paginas/cuento.php?cuento='.$col["cuentoId"].'" class=" btn w3-hover-shadow w3-round flex-wrap w3-border" style="width:250px" id="cartas"  >
        <div class="w3-container text-wrap" >
            <header class="text-wrap">
                <h3 class="w3-border-bottom w3-dark-grey w3-block w3-center w3-round">'.$col["titulo"].'</h3>
            </header>
            <img src="../../img/'.$col["imagen"].'" alt="'.$col["titulo"].'" class="h-75 w-75 img-thumbnail">
            <p class="w3-left-align "> <strong class="flex-wrap"> '.$col["descripcion"].'</strong> </p>
            <footer class="text-muted text-sm-end ">
                '.$col["fecha"].'
            </footer>
            </div>
        </a>
        </div>

        ';

    }
}
function bibliotecaCuento($contenido,$return){
  $explode =explode("\n",$contenido);
  $array = array();
  for ($i=0; $i < count($explode); $i++) {
    array_push($array,"<p>".$explode[$i]."</p>");
  }
  $return = implode("\n",$array);
  return $contenido = $return;

}
function crearComentario($conn){
  if (isset($_POST["commentSubmit"])) {
    $uid = $_POST["uid"];
    $date = $_POST["date"];
    $comentario = $_POST["comentario"];
    $cuentoId = $_POST["cuentoid"];
    $sql = "INSERT INTO commentario (uId, date, mesage,cuento) VALUES (' $uid ', '$date',  '$comentario', '$cuentoId')";

    $result = mysqli_query($conn,$sql);
    if ($result) {
      header("location:".$_SERVER[HTTP_REFERER]."?resultado=enviado");

    } else {
      header("location:".$_SERVER[HTTP_REFERER]."?resultado=Error");


    }
  }
}
function commentSection($conn,$cuentoId){
  $sql = "SELECT * FROM commentario WHERE cuento = '$cuentoId' ORDER BY `commentario`.`date` DESC ";
  $result =mysqli_query($conn,$sql);

  while ($row = mysqli_fetch_assoc($result)) {

    echo '<div class="w3-border-bottom">
      <h6>'.$row["uId"].'</h6>
      <p class="w3-right">'.$row["date"].'</p>
      <p>'.$row["mesage"].'</p>
    </div>';
  }
}
