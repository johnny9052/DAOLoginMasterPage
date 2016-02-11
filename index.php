<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="Recursos/js/gestionLogin.js"></script>
    </head>
    <body>
        <?php
        session_start();

        if (isset($_GET['message_login'])) {
            echo $_GET['message_login'];
        }

        if (isset($_SESSION['name_user'])) {
            echo 'Bienvenido ' . $_SESSION['name_user'];
        }

        if (isset($_SESSION['name_user'])) {
            include 'Vista/masterPage.php';
        } else {
            include 'Vista/login.php';
        }
        ?>
    </body>
</html>
