<?php
Include_once("../header.php");
Include_once("../dbh.inc.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Página Portafolio\Contenido\Include\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\Página Portafolio\Contenido\Include\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\Página Portafolio\Contenido\Include\PHPMailer-master\src/SMTP.php';


//verificación y enviar correo
function sendMail($conn,$sender,$reciver,$body,$subject){
  $mail = new PHPMailer();
  $mail->isHTML(TRUE);
  $mail ->Body = $body;
  //$mail->Body = 'Gracias por crear una cuenta con nosotros, por favor usa el siguiente botón para verificar su cuenta: ';
  /* Set the mail sender. */
  $mail->setFrom($sender, 'David Chirino');
  /* Add a recipient. */
  $mail->addAddress($reciver, 'usuario');
  $mail->Subject = $subject;
  if (!$mail->send())
  {
    echo $mail->ErrorInfo;
  }
}

function verifyEmail($conn,$vkey){
  $sql = "SELECT verified FROM users WHERE verified = 0 AND vkey = '$vkey'";
  $result = mysqli_query($conn,$sql);
  if ($result) {
    $update = "UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";
    $verify = mysqli_query($conn,$update);
  } else {
    echo "Error con la consulta";
  }
}


//Funcion de la bilbioteca
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

//Sistema de Comentarios
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

//Funciones del sistema de inicio
function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat){
     $result;
     if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
         $result=true;
     } else {
         $result=false;
     }
     return $result;
 }
function invalidUid($username){
    $char = '/[^0-9A-Za-z\-\.]/';
   $result;
   if (preg_match('/[^0-9A-Za-z\-\.]/', $username)){
       $result=true;
   } else {
       $result=false;
   }
   return $result;
}
function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    } else {
        $result=false;
    }
    return $result;
}
function pwdMatch($pwd,$pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat){
        $result=true;
    } else {
        $result=false;
    }
    return $result;
}
function uidExist($conn,$username,$email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Login System/signup.php?error=stmtFailed");
            exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn,$name,$email,$username,$pwd){
    $vkey =md5(time().$username);
    $mailto=$email;
    $eSubject = "Verificación de correo";
    $eMessage = 'Gracias por crear una cuenta con nosotros, por favor usa el siguiente link para verificar su cuenta:  http://localhost/P%C3%A1gina%20Portafolio/Contenido/Include/verify.php?vkey='.$vkey;
    $Headers='genarodavid@gmail.com';
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd,vkey) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Login System/signup.php?error=stmtFailed");
            exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    sendMail($conn,$Headers,$mailto,$eMessage,$eSubject);
    mysqli_stmt_bind_param($stmt, "sssss", $name,$email,$username,$hashedPwd,$vkey);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt);
    header("location:../Login System/signup.php?error=none");
            exit();
}
function emptyInputLogin($username,$pwd){
    $result;
     if (empty($username) || empty($pwd)){
         $result=true;
     } else {
         $result=false;
     }
     return $result;
}
function loginUser($conn, $username,$pwd){
    $uidExist = uidExist($conn,$username,$email);

    if ($uidExist === false) {
    header("location:../Login System/login.php?error=InicioErroneo");

        exit();
    }

    $pwdHashed = $uidExist['usersPwd'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
    header("location:../Login System/login.php?error=InicioErroneo");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION['userId'] = $uidExist['usersId'];
        $_SESSION['userUid'] = $uidExist['usersUid'];
        $_SESSION['userName'] = $uidExist['usersName'];
        $_SESSION['userImagen'] = $uidExist['imagen'];
        $_SESSION['userVerified'] = $uidExist['verified'];
        header("location: /Página Portafolio/Contenido/main.php");
        exit();

    }
}

//Funciones de la biblioteca
function profileImgValidation($conn,$id){
  $file = $_FILES['image'];
  $fileName =$_FILES['image']['name'];
  $fileNameTmp =$_FILES['image']['tmp_name'];
  $fileSize =$_FILES['image']['size'];
  $fileError =$_FILES['image']['error'];
  $fileType =$_FILES['image']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowTypes = array('jpg','png','jpeg','gif');
  $finalImage;
  if(in_array($fileActualExt, $allowTypes)){
        if ($fileSize < 5000000){
          if ($fileError === 0){
            $fileNameNew = uniqid("", true) . '.'. $fileActualExt;
            $fileDestination = "../../img/". $fileNameNew;
            copy($_FILES['image']['tmp_name'], $fileDestination);

            $sql ="UPDATE users SET imagen =  '$fileNameNew' WHERE usersId = '$id'";
            $_SESSION['userImagen'] = $fileNameNew;

              if (mysqli_query($conn,$sql)) {
                header("location:".$_SERVER[HTTP_REFERER]."?error=none");

              } else{
                session_end();
                header("location:".$_SERVER[HTTP_REFERER]."?error=imgError");


              }


          } else{
            header("location:".$_SERVER[HTTP_REFERER]."?error=none");
            exit();
          }
        } else {
          header("location:".$_SERVER[HTTP_REFERER]."?error=imgError");
          exit();
        }
      } else {
        header("location:".$_SERVER[HTTP_REFERER]."?error=imgTooLarge");
        exit();
      }
}
function validate($title,$date,$content,$author,$desc,$img){
    $result;
    if (is_array($title) && is_array($content) && is_array($author) && is_string($date) && !is_empty($desc) && !is_empty($img)){
      $result = true;
    } else{
      $result = false;

    }
    return $result;
  }
function imgValidation(){
  $file = $_FILES['image'];
  $fileName =$_FILES['image']['name'];
  $fileNameTmp =$_FILES['image']['tmp_name'];
  $fileSize =$_FILES['image']['size'];
  $fileError =$_FILES['image']['error'];
  $fileType =$_FILES['image']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowTypes = array('jpg','png','jpeg','gif');
  $finalImage;
  if(in_array($fileActualExt, $allowTypes)){
        if ($fileSize < 5000000){
          if ($fileError === 0){
            $fileNameNew = uniqid("", true) . '.'. $fileActualExt;
            $fileDestination = "../img/". $fileNameNew;
            copy($_FILES['image']['tmp_name'], $fileDestination);
            return $fileNameNew;
          } else{
            header("location:".$_SERVER[HTTP_REFERER]."?error=imgError");
            exit();
          }
        } else {
          header("location:".$_SERVER[HTTP_REFERER]."?error=imgTooLarge");
          exit();
        }
      } else {
        header("location:".$_SERVER[HTTP_REFERER]."?error=WrongImgType");
        exit();
      }
}
function emptyInput($title, $date, $content,$author,$desc,$fileNameNew){
      $result;
      if (empty($title) || empty($date) || empty($content) || empty($author)){
          $result=true;
      } else {
          $result=false;
      }
      return $result;
  }
function correctDate($date){
  $result;
  if (preg_match('/[^0-9\/]/', $date)){
      $result=true;
  } else {
      $result=false;
  }
  return $result;
}
function imprimirCuento($conn,$title,$date,$content,$author,$desc,$img){
  $sql = "INSERT INTO biblioteca (titulo,fecha,contenido,autor,descripcion,imagen) VALUES (?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location:../Login System/signup.php?error=stmtFailed");
          exit();
  }
  mysqli_stmt_bind_param($stmt, "ssssss", $title,$date,$content,$author,$desc,$img);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
function imgValidationAndSendData($conn,$title,$date,$content,$author,$desc){
  $file = $_FILES['image'];
  $fileName =$_FILES['image']['name'];
  $fileNameTmp =$_FILES['image']['tmp_name'];
  $fileSize =$_FILES['image']['size'];
  $fileError =$_FILES['image']['error'];
  $fileType =$_FILES['image']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileActualExt, $allowTypes)){
        if ($fileSize < 5000000){
          if ($fileError === 0){
            $fileNameNew = uniqid("", true) . '.'. $fileActualExt;
            $fileDestination = "../img/". $fileNameNew;
            copy($_FILES['image']['tmp_name'], $fileDestination);
            imprimirCuento($conn,$title,$date,$content,$author,$desc,$fileNameNew);
          } else{
            header("location:crear cuento.php?error=ErrorConLaImagen");
            exit();
          }
        } else {
          header("location:crear cuento.php?error=ImagenMuyGrande");
          exit();
        }
      } else {
        header("location:crear cuento.php?error=formatoIncorrecto");
        exit();
      }
}
//funciones de perfil
