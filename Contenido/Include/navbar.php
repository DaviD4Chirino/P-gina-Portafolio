<!-- <div class="w3-margin"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top w3-text-white">
  <img src="/Página Portafolio/img/logo_white.svg" alt="" style="width:30px;height:30px"><a class="navbar-brand w3-margin-left">David</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#my-nav"
        aria-controls="my-nav my-nav2" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="my-nav" class="w3-margin-right collapse navbar-collapse w-75">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/Página Portafolio/Contenido/main.php">Inicio<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Página Portafolio/Contenido/Paginas/biblioteca.php">Biblioteca</a>
            </li>


        </ul>


    </div>
    <ul class="nav navbar-nav navbar-right collapse navbar-collapse alignRight" id="my-nav">
        <?php
if (isset($_SESSION['userUid'])) {

    echo '<li class="nav-item ">
                                                         <a class="nav-link" href="/Página Portafolio/Contenido/Paginas/profile.php">Perfil</a> </li>';

    echo '
                                                     <li class="nav-item ">
                                                         <a class="nav-link" href="/Página Portafolio/Contenido/Include/logout.inc.php">Cerrar Sesión</a>
                                                     </li>';} else {
    echo '<li class="nav-item ">
                                                         <a class="nav-link" href="/Página Portafolio/Contenido/Login System/login.php">Iniciar
                                                             Sesión</a> </li>';

    echo '
                                                     <li class="nav-item ">
                                                         <a class="nav-link" href="/Página Portafolio/Contenido/Login System/signup.php">Crear cuenta</a>
                                                     </li>';
}
?>
    </ul>

    </div>

</nav>
<br><br>
