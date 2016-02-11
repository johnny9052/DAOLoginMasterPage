<?php

class LoginDAO {

    private $con;
    private $objCon;

    function LoginDAO() {
        require '../Modelo/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function loguear(clsLogin $obj) {
        echo $sql = "SELECT usuario,password from usuario where usuario = '" . $obj->getUsuario() . "'AND password = " . $obj->getPassword() . "";
        
        $resultado = $this->objCon->ejecutar($sql);
        return $this->objCon->validarLogin($resultado);
    }

}
?>

