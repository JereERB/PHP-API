<?php
    require_once './Model/Usuario.php';

    class UsuarioController{
        private $objUsuario; // Instancia de objeto usuario

        public function __construct(){
            $this->objUsuario = new Usuario(); // Instanciamos Usuario
        }

        public function agregarUsuarioSvc($id,$nombre,$clave){
            $this->objUsuario->setId($id);
            $this->objUsuario->setNombre($nombre);
            $this->objUsuario->setClave($clave);

            if ($this->objUsuario->agregarUsuario()) {
                return true;
            }

            return false;
        }

        public function eliminarUsuarioSvc($nombre){
            $this->objUsuario->setNombre($nombre);
            if ($this->objUsuario->eliminarUsuario()) {
                return true;
            }else{
                return false;
            }
        }

        public function listarUsuarioSvc(){
            $usuarios = $this->objUsuario->listarUsuarios(); // Obtenemos los usuarios del .txt
            array_pop($usuarios); // Eliminamos el ultimo ya que es una linea vacia
            return $usuarios;
        }
    }

?>