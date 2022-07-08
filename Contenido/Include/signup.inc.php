<?php

if (isset($_POST["submit"])) {

    require_once '../dbh.inc.php';
    require_once './functions.inc.php';

    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $username = mysqli_real_escape_string($conn,$_POST["uid"]);
    $pwd = mysqli_real_escape_string($conn,$_POST["pwd"]);
    $pwdrepeat = mysqli_real_escape_string($conn,$_POST["pwdrepeat"]);



    if (emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat) !== false) {
        header("location:../Login System/signup.php?error=CampoVacío");
            exit();
        }
    if (invalidUid($username) !== false) {
        header("location:../Login System/signup.php?error=UsuarioInvalido");
            exit();
    }
    if (invalidEmail($email) !== false) {
        header("location:../Login System/signup.php?error=CorreoErroneo");
            exit();
    }
    if (pwdMatch($pwd,$pwdrepeat) !== false) {
        header("location:../Login System/signup.php?error=LasContraseñasNoCoinciden");
            exit();
    }
    if (uidExist($conn,$username,$email) !== false) {
        header("location:../Login System/signup.php?error=UsuarioTomado");
            exit();
    }
    createUser($conn,$name,$email,$username,$pwd);
} else {
    header("location:../Login System/signup.php");
};
