<?php
require_once './WS/endpoints.php';

$urlSolicitada =  $_SERVER['REQUEST_URI']; // Obtenemos la URL que el usuario envio para llamar al endpoint correspondiente ejemplo "agregarUsuario"


$endPoint = explode("/",$urlSolicitada)[3]; // Obtenemos el nombre del endpoint solicitado en la URL

$ws = new WS(); // Creamos un nuevo objeto WS "Web Service" el cual contiene los endpoints

$error = is_callable(array($ws,$endPoint)); // Verificamos que el endpoint exista en la clase WS

if ($error != 1) {
    echo "Endpoint no encontrado";
}else{
    call_user_func(array($ws,$endPoint)); // Llamamos al endpoint que obtuvimos dentro de la clase WS
    /**
     * Se tiene que llamar de esta forma ya que no se puede hacer $ws->$endPoint
     */
}


?>