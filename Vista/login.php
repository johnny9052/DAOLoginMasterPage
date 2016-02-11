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
        <form name="formularioLogin" method="post" action="controlador/gestionLogin.php">
            <table>
                <tr>
                    <td>Usuario</td>
                    <td><input type="text" id="txtUsuario" name="usuario"></td>
                </tr>
                
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="txtPassword" name="password"> </td>
                </tr>
                <tr>
                    
                    <td><input type="button" id="btnLogin" value="Login" onclick="validarLogin(formularioLogin, 'con');"></td>
                </tr>
                <tr>
                    
                    <td><input type="text" name="type" style="display: none"></td>
                </tr>
             </table>
            
        </form>
    </body>
</html>
