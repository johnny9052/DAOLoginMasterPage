<?php

class estudianteDAO {

    private $con;
    private $objCon;

    function estudianteDAO() {
        require '../Modelo/clsConexion.php';
        $this->objCon = new clsConexion();

        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsEstudiante $obj) {
        $sql = "INSERT INTO estudiante(codigo, nombre, apellido, cedula, edad, semestre) VALUES(" . 
		$obj->getCodigo() . ",'" . $obj->getNombre() . "','" . $obj->getApellido() . "'," . $obj->getCedula() . 
		"," . $obj->getEdad() . "," . $obj->getSemestre() . ");";

        $resultado = $this->objCon->ejecutar($sql);
        $this->objCon->respuesta($resultado);
    }

    public function buscar(clsEstudiante $obj) {
        $sql = "SELECT id, codigo,nombre, apellido, cedula, edad, semestre FROM estudiante 
		WHERE codigo= " . $obj->getCodigo() . "";
        $resultado = $this->objCon->ejecutar($sql);
        $this->construirBusqueda($resultado);
    }

    public function modificar(clsEstudiante $obj) {
        $sql = "UPDATE estudiante SET  codigo=" . $obj->getCodigo() . 
		",nombre='" . $obj->getNombre() . "', apellido='" . $obj->getApellido() . 
		"', cedula=" . $obj->getCedula() . ",edad=" . $obj->getEdad() . 
		",semestre=" . $obj->getSemestre() . 
		" WHERE id=" . $obj->getId() . "";
        $resultado = $this->objCon->ejecutar($sql);
        $this->objCon->respuesta($resultado);
    }

    public function eliminar(clsEstudiante $obj) {
        $sql = "DELETE FROM estudiante WHERE id=" . $obj->getId() . "";
        $resultado = $this->objCon->ejecutar($sql);
        $this->objCon->respuesta($resultado);
    }

    public function listar(clsEstudiante $obj) {
        $sql = "SELECT codigo, nombre, apellido, cedula, edad, semestre FROM estudiante";
        $resultado = $this->objCon->ejecutar($sql);
        $this->construirListado($resultado);
    }

    function construirBusqueda($resultado) {
        $vec = pg_fetch_row($resultado);

        if (isset($vec) && $vec[0] != "") {
            $lista = $lista . "document.getElementById('txtId').value='" . $vec[0] . "';";
            $lista = $lista . "document.getElementById('txtCodigo').value='" . $vec[1] . "';";
            $lista = $lista . "document.getElementById('txtNombre').value='" . $vec[2] . "';";
            $lista = $lista . "document.getElementById('txtApellido').value='" . $vec[3] . "';";
            $lista = $lista . "document.getElementById('txtCedula').value='" . $vec[4] . "';";
            $lista = $lista . "document.getElementById('txtEdad').value='" . $vec[5] . "';";
            $lista = $lista . "document.getElementById('txtSemestre').value='" . $vec[6] . "';";

            header('location: ../index.php?page=estudiantes&&message_search=' . $lista);
        } else {
            $mensaje = "No se enconro informacion";
            header('location: ../index.php?page=estudiantes&&message=' . $mensaje);
        }
    }

    function construirListado($resultado) {

        if ($resultado && pg_num_rows($resultado) > 0) {
            $cadenaHTML = "<table border ='1'>";
            $cadenaHTML .= "<tr>";
            $cadenaHTML .= "<th>Codigo</th>";
            $cadenaHTML .= "<th>Nombre</th>";
            $cadenaHTML .= "<th>Apellido</th>";
            $cadenaHTML .= "<th>Cedula</th>";
            $cadenaHTML .= "<th>Edad</th>";
            $cadenaHTML .= "<th>Semestre</th>";
            $cadenaHTML .= "</tr>";

            for ($cont = 0; $cont < pg_numrows($resultado); $cont++) {

                $cadenaHTML .= "<tr>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 0) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 1) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 2) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 3) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 4) . "</td>";
                $cadenaHTML .= "<td>" . pg_result($resultado, $cont, 5) . "</td>";
                $cadenaHTML .= "</tr>";
            }
            $cadenaHTML .= "</table>";
        } else {
            $cadenaHTML = "<b>No hay Registros en la Base de datos</b>";
        }
        header('location:../index.php?page=estudiantes&&info_list=' . $cadenaHTML);
    }

}

?>
