<?php
    include_once "../header.php";
    include_once "../Include/navbar.php";
    include_once "../dbh.inc.php";
    $user = $_SESSION["userUid"];
    $userId = $_SESSION["userId"];
    $sql= "SELECT * FROM users";
    $result= mysqli_query($conn, $sql);
?>
<?php if (isset($_SESSION["userUid"])): ?>
  <title><?php echo $_SESSION["userName"]; ?></title>
  <body class="w3-theme-d2">

    <header class="w3-bar w3-top w3-hide-large w3-xlarge">
      <div class="w3-bar-item w3-padding-24 w3-wide"></div>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

      <div class="w3-hide-large" style="margin-top:83px"></div>
      <header class="w3-display-container w3-theme-d4 w3-xlarge" style="height:200px;">
        <div class="position-absolute top-100 start-50 translate-middle">
          <?php echo' <button onclick="document.getElementById(\'id01\').style.display=\'block\'"
          class="btn w3-circle"> <img src="/Página Portafolio/img/'.$_SESSION["userImagen"].'" class=" w3-circle" alt="Foto del Usuario" style="max-width:250px;max-height:250px;min-width:250px;min-height:250px" > </button> '; ?>
          <div class="position-absolute top-100 start-50 translate-middle w3-black w3-round-xxlarge w3-block w3-opacity-min w3-display-container">
            <p class="w3-center w3-container"><?php echo $_SESSION["userUid"]?>
        </p>
        <?php if ($_SESSION["userVerified"]): ?>
          <div class="position-absolute top-0 start-100 translate-middle w3-round-xxlarge w3-container w3-yellow w3-round w3-opacity-off fs-6">Verificado</div>
        <?php endif; ?>
          </div>
        </div>
      </header>
      <div class="w3-container">
        <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
      </div>
      <div class="w3-container w3-white w3-round w3-padding w3-margin">
        <p class=" w3-content  w3-padding-large"><!-- The Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <h1 class="w3-center">Cambia tu foto de perfil</h1>
      <div class="w3-center">
      <form class="w3-form" action="profile.inc.php" method="post" enctype="multipart/form-data">
          <input type="file" name="image" id="img" class="w3-center" >
          <input type="submit" name="" value="Enviar" type="button">
      </form>
      </div>
    </div>
  </div>
</div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>

    <script>
    // Accordion
      function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
      }

      // Open and close sidebar
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
      }
    </script>



      <?php else:  ?>
<p>Haha no</p>

        <?php endif; ?>
    <?php
    include_once "../footer.php";
  ?>
