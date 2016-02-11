<?php
class clsConexion{
    private $usuario;
    private $password;
    private $dataBase;
    private $puerto;
    private $host;
    private $cadenaConexion;
    private  $connect;
    private $consulta_ID;
    
    public function conectar(){
        $this->usuario = "postgres";
        $this->password = "admin";
        $this->dataBase ="registroAcademico";
        $this->puerto = 5432;
        $this->host = "localhost";
       
        $this->cadenaConexion = "host=$this->host port = $this->puerto dbname = $this->dataBase user = $this->usuario password = $this->password";
        
        $this->connect = pg_connect($this->cadenaConexion) or die("Error al realizar la conexion con la base de datos");
        
    }
    
    public function acceder_conexion(){
        return $this->connect;
    }
    
    function ejecutar($sql){
        if($sql ==""){
            return 0;
        }else{
            $this->consulta_ID = pg_query($this->connect, $sql);
            return $this->consulta_ID;
        }
    }
    
    function validarLogin($resultado){
        $vec = pg_fetch_row($resultado);
        
        if ($vec[0]!=""){
            return $vec[0];
        }else{
            return "";
        }
    }
    
    function  respuesta($resultado){
        if($resultado){
            $mensaje = "operacion exitosa";
            
        }else{
            $mensaje = "Error en la operación";
        }
        header('location: ../index.php?page=estudiantes&&message='.$mensaje);
            
    }
        
}
?>