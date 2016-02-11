<?php

include '../Modelo/clsLogin.php';
include '../DAO/loginDAO.php';

isset($_POST['type']) ? $accion = $_POST['type'] : $accion = "";
isset($_POST['usuario']) ? $usuario = $_POST['usuario'] : $usuario = "";
isset($_POST['password']) ? $password = $_POST['password'] : $password = "";

session_start();

$login = new clsLogin($usuario, $password);
$dao = new LoginDAO();

$mensaje = "";

switch ($accion) {
    case "con":
        if ($dao->loguear($login)) {
            $_SESSION['name_user'] = $dao->loguear($login);
        } else {
            $mensaje = "El usuario No existe";
        }
        break;

    case "desc":
        session_destroy();
        $mensaje = "Se ha cerrado la sesion";
        break;
}
header('location:../index.php?message_login=' . $mensaje);
?>