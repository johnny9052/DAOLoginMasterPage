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
    </head>
    <body>
       
        
        <table border=1">
            <tr>
                <td style="width: 20%">
                    <a href="index.php">Inicio </a><br>
                    <a href="index.php?page=usuarios">Usuarios</a><br>
                    <a href="index.php?page=eventos">Eventos</a><br>
                    <a href="index.php?page=estudiantes">Estudiantes</a>
                </td>
                
                <td style="width: 80%">                    
                    <?php
                    if(isset($_GET['page'])){
                        include ($_GET['page'].".php");
                    }  else {
                       include ('inicio.php');
                    }
                    ?>
                </td>
            </tr>
        </table>
        
        
        
        
        <form name="formularioLogOut" method="post" action="Controlador/gestionLogin.php">
            <table>
                <tr>
                    <td><input type="text" name="type" style="display: none"></td>
                </tr>
                <tr>
                    <td><input type="button" value="Desconectar" id="btnDesconectar" onclick="validarLogin(formularioLogOut, 'desc')"</td>
                    
                </tr>
            </table>
                
            
        </form>
    </body>
</html>
