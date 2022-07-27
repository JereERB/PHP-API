<?php

require_once ('./DB/TblUsuario.php');
    class Usuario{
        private $id;
        private $nombre;
        private $clave;
        private $tbl;

        public function __construct(){

            $this->tbl = new TblUsuario();
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setClave($clave){
            $this->clave = $clave;
        }

        public function setId($id){
            $this->id = $id;
        }

        
        #Mostrar los datos listados para el api
        public function listarUsuarios(){         
            return $this->tbl->listarUsuarios();
        }

        #Agregar un usuario al api
        public function agregarUsuario(){
            
            if($this->tbl->insertarUsuario($this->id,$this->nombre,$this->clave) ){
                
                return true;
            }else{
                
                return false;
            }
            
        }

        #Se encarga de eliminar usuario del api
        public function eliminarUsuario(){
            if($this->tbl->eliminarUsuario($this->nombre) ){
                
                return true;
            }else{
                
                return false;
            }
        }

    }

?>