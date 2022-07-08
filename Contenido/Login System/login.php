<?php
include_once '../header.php';
include_once '../Include/navbar.php'
?>
<title>Login</title>
</head>

<body class="w3-dark-grey">

    <div class=" w3-container w3-center w3-display-middle col-3 w3-teal ">
        <section class="w3-section  w3-container">
            <h1 class="w3-center">
                Iniciar sessión
            </h1>
            <br>
<img src="/Página Portafolio/Contenido/svg/white/airplay.svg" style="min-width: 100px;min-height: 100px;"
                alt="" class="w3-container">
            <br>
            <br>
            <form action="../Include/login.inc.php" method="post">
                <input class="w3-input" type="text" name="uid" id="" placeholder="Email or Username...">
                <input class="w3-input" type="password" name="pwd" id="" placeholder="Password...">
                <br>
                <button class="w3-Button w3-blue" type="submit" name="submit">Iniciar</button>
            </form>
            <br><br>
            <?php
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {

            case 'UsuarioInvalido':
                echo 'Ese usuario es inválido';
                break;
            case 'CampoVacío':
                    echo 'Parece que falta algo por llenar';
                    break;

                    case 'InicioErroneo':
                            echo 'Usuario o contraseña incorrectos';
                        break;

                    default:
            echo 'Has entrado';
                break;
        }
    }
?>

        </section>
    </div>
    <?php
include_once '../footer.php'

?>
