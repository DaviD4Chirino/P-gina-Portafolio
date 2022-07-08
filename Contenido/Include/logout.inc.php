<?php

session_start();
session_unset();
session_destroy();
header("location:/Página Portafolio/Contenido/main.php");
exit();