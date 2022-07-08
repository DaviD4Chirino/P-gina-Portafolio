<?php
include_once '../header.php';
include_once '../Include/navbar.php'
?>
<title>Crear Cuenta</title>
</head>

<body class="w3-dark-grey">

    <div class=" w3-container w3-center w3-display-middle col-3 w3-teal ">
        <section class="w3-section  w3-container">
            <h1 class="w3-center">
                Crear Cuenta
            </h1>
            <br>
            <form action="../Include/signup.inc.php" method="post">
                <img src="/Página Portafolio/Contenido/svg/white/user.svg" alt=""
                    style="min-width: 100px;min-height: 100px;" class="w3-container">
                <br>
                <br>
                <input class="w3-input" type="text" name="name" id="" placeholder="Full Name...">
                <input class="w3-input" type="text" name="email" id="" placeholder="Email...">
                <input class="w3-input" type="text" name="uid" id="" placeholder="Username...">
                <input class="w3-input" type="password" name="pwd" id="" placeholder="Password...">
                <input class="w3-input" type="password" name="pwdrepeat" id="" placeholder="Repeat password...">
                <br>
                <button class="w3-Button w3-blue" type="submit" name="submit">Crear</button>
                <br>
                <br>
                <div class="container">
                    <?php
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {

            case 'UsuarioInvalido':
                echo 'Ese usuario es inválido';
                break;

                case 'CorreoErroneo';
            echo 'El correo especificado no existe o ya está tomado';
            break;

            case 'LasContraseñasNoCoinciden';
            echo 'Las contraseñas deben coincidir';
            break;

            case 'UsuarioTomado':
                echo 'Ese usuario ya está registrado';
                break;
            case 'CampoVacío':
                    echo 'Parece que falta algo por llenar';
                    break;
            case 'smtFailed':
            echo 'Algo terrible acaba de suceder';
            break;

                    default:
            echo 'Has sido registrado satisfactoriamente';
            echo 'Se ha enviado un correo de verificación';
                break;
        }
    }
?>
                </div>

            </form>
        </section>
    </div>

    <?php
include_once '../footer.php'
?>
