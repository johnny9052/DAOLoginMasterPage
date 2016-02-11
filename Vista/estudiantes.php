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
        <script type="text/javascript" src="Recursos/js/gestionEstudiantes.js"></script>
        <link type="text/css" rel="stylesheet" href="Recursos/css/estilos.css">
    </head>
    <body>
        <form name="formularioEstudiante" method="post" action="Controlador/gestionEstudiante.php">
            <table>
                <tr>

                    <td>
                        <input type="text" id="txtId" name="id" class="oculto">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Código</label>
                    </td>
                    <td>
                        <input type="text" id="txtCodigo" name="codigo">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Nombre</label>
                    </td>
                    <td>
                        <input type="text" id="txtNombre" name="nombre">
                    </td>

                    <td rowspan="10" class="listado">
                        <?php
                        if (isset($_GET['info_list'])) {
                            echo $_GET['info_list'];
                        }
                        ?>
                    </td>

                </tr>

                <tr>
                    <td>
                        <label>Apellido</label>
                    </td>
                    <td>
                        <input type="text" id="txtApellido" name="apellido">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Cedula</label>
                    </td>
                    <td>
                        <input type="text" id="txtCedula" name="cedula">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Edad</label>
                    </td>
                    <td>
                        <input type="text" id="txtEdad" name="edad">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Semestre</label>
                    </td>
                    <td>
                        <input type="text" id="txtSemestre" name="semestre">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" id="txtType" name="type" class="oculto">
                    </td>
                    <td>
                        <input type="button" value="Guardar" id="btnGuardar" onclick="validarEstudiante(formularioEstudiante, 'save')">
                        <input type="button" value="Buscar" id="btnBuscar" onclick="validarEstudiante(formularioEstudiante, 'search')">
                    </td>
                </tr>

                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="button" value="Modificar" id="btnModificar" onclick="validarEstudiante(formularioEstudiante, 'update')">
                        <input type="button" value="Eliminar" id="btnEliminar" onclick="validarEstudiante(formularioEstudiante, 'delete')">
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="button" value="Listar" id="btnListar" onclick="validarEstudiante(formularioEstudiante, 'list')">

                    </td>
                </tr>

            </table>

            <?php
            if (isset($_GET['message'])) {
                echo $_GET['message'];
            }


            if (isset($_GET['message_search'])) {
                echo "<script type='text/javascript'>" . $_GET['message_search'] . "</script>";
            }
            ?>

        </form>
    </body>
</html>
