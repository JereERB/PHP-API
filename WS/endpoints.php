<?php
    require_once './Controller/UsuarioController.php';

    class WS{
        private $usuarioCtrl; // Instancia de objeto UsuarioController

        public function __construct(){
            $this->usuarioCtrl = new UsuarioController(); // Instanciamos UsuarioController
        }

        #Si existe el endpoint agregarUsuario en el metodo post
        public function agregarUsuario(){
            if ($_SERVER['REQUEST_METHOD'] == "POST") { // Verificamos que el tipo de solicitud sea POST
                $camposPost = json_decode(file_get_contents('php://input')); // Obtenemos los campos enviados a traves de POST en este caso "usuario y clave"

                if (property_exists($camposPost,"nombre") && property_exists($camposPost,"clave") && property_exists($camposPost,"id")   ) { // Verificamos que los campos hayan sido enviados en la peticion en este caso "usuario y clave"
                    if ($this->usuarioCtrl->agregarUsuarioSvc($camposPost->id, $camposPost->nombre, $camposPost->clave)) {
                        echo "Usuario agregado";
                    }else{
                        echo "Error al agregar usuario";
                    }  
                }else{
                    http_response_code(400); // Retornamos codigo de HTTP 400 que significa BAD REQUEST
                    echo "Los parametros nombre y clave son requeridos";
                }
            }else{
                http_response_code(405); // Retornamos codigo de HTTP 405 que significa METHOD NOT ALLOWED
                echo "Metodo no permitido error 405";
            }

        }

        #Si existe el endpoint eliminarUsuario en el metodo DELETE
        public function eliminarUsuario(){
            if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
                $camposPost = json_decode(file_get_contents('php://input')); // Obtenemos los campos enviados a traves de POST en este caso ID
                 
                if (property_exists($camposPost, "nombre")) { // Verificamos que el campo id haya sido enviado en la peticion
                    if ($this->usuarioCtrl->eliminarUsuarioSvc($camposPost->nombre)) {
                        echo "Usuario eliminado";
                    }else{
                        echo "Usuario no encontrado";
                    }
                }
            }else{
                http_response_code(405);
                echo "Metodo no permitido error 405";
            }
        }

        #Si existe el endpoint listarUsuarios en el metodo GET
        public function listarUsuarios(){
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                echo json_encode($this->usuarioCtrl->listarUsuarioSvc()); // Convertimos los usuarios a un json para enviarlo como respuesta
            }else{
                http_response_code(405);
                echo "Metodo no permitido"; // Retornamos codigo de HTTP 405 que significa METHOD NOT ALLOWED
            }
        }

    }

?>