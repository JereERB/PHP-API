<?php 

require_once ('./DB/Conexion.php');

class TblUsuario{


    private $usuarios = array();
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();     
    }
    
    public function listarUsuarios(){

        $query = ("CALL listarUsuarios()");
        $res = mysqli_query($this->conn->conexion(), $query);

        if($res){

            while($row = mysqli_fetch_array($res)) {

                //Varibles para que solo me devuelva los datos por id
                $id = $row['id'];
                $nm = $row['nombre'];
                $cl = $row['clave'];
                
                $us = array('id'=>$id,'nombre'=>$nm,'clave'=>$cl);
                array_push($this->usuarios,$us);
                
            }
            
        }else{

            echo "error en la consulta";

        }
        
        print(var_dump($this->usuarios));

        
        return $this->usuarios;
        mysqli_close($this->conn->conexion());
        
    }

    public function insertarUsuario($id,$nombre,$clv){
        
        $query = "CALL insertarUsuario('$id','$nombre','$clv')";
        $result = mysqli_query($this->conn->conexion(), $query);

        if ($result) {
            echo "New user created successfully";
            return true;
        } else {
            echo "Error: ";
            return false;
        }
        mysqli_close($this->conn->conexion());
    }


    public function eliminarUsuario($nombre){

        $query = "CALL eliminarUsuario('$nombre')";
        $result = mysqli_query($this->conn->conexion(), $query);

        if ($result) {
            echo "New user eliminated successfully";
            return true;
        } else {
            echo "Error: ";
            return false;
        }
        mysqli_close($this->conn->conexion());
    }
} 




?>