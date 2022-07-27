<?php
class Conexion
{

  private  $server ;
  private  $username;
  private  $password;
  private  $database;
  private  $conn;

  public function __construct()
  {
    $this->server = 'localhost:3307';
    $this->username = 'root';
    $this->password = 'password';
    $this->database = 'API';
  }

  public function conexion()
  {
    $this->conn = mysqli_connect($this->server, $this->username , $this->password , $this->database) or die("Error al conectarse a la base de datos");

    return $this->conn;
  }

}
?>
