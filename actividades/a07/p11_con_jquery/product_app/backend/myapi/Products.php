<?php

namespace TECWEB\MYAPI;

use TECWEB\MYAPI\DataBase as DataBase;
require_once __DIR__ . '/DataBase.php';

class Products extends DataBase { 
    private $response = NULL;

    // Constructor con el primer parámetro obligatorio y los otros opcionales
    public function __construct($db, $user='root', $pass='') {
        $this->response = array();
        parent::__construct($user, $pass, $db);
    }

    // Listar todos los productos no eliminados
    public function list() {
        $this->response = array();
        
        if ($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }

        $this->conexion->close();
    }

}
?>

<?php
namespace TECWEB\MYAPI;
use TECWEB\MYAPI\DataBase as DataBase;

require_once __DIR__ . '/DataBase.php';

class Products extends DataBase {
    private $response;

    public function __construct($dbname, $user = "root", $pass = "") {
        parent::__construct($host, $user, $pass, $dbname);
        $this->response = [];
    }

    public function list() {
        $sql = "SELECT * FROM productos WHERE eliminado=0";
        $res = $this->conexion->query($sql);
        $this->response = $res->fetch_all(MYSQLI_ASSOC);
    }

    public function add($nombre, $precio, $existencia) {
        $nombre = $this->conexion->real_escape_string($nombre);
        $sql = "INSERT INTO productos (nombre, precio, existencia) VALUES ('$nombre', $precio, $existencia)";
        $this->response = ["success" => $this->conexion->query($sql)];
    }

    public function delete($id) {
        $sql = "DELETE FROM productos WHERE id = $id";
        $this->response = ["success" => $this->conexion->query($sql)];
    }

    public function edit($id, $nombre, $precio, $existencia) {
        $nombre = $this->conexion->real_escape_string($nombre);
        $sql = "UPDATE productos SET nombre = '$nombre', precio = $precio, existencia = $existencia WHERE id = $id";
        $this->response = ["success" => $this->conexion->query($sql)];
    }

    public function single($id) {
        $sql = "SELECT * FROM productos WHERE id = $id";
        $res = $this->conexion->query($sql);
        $this->response = $res->fetch_all(MYSQLI_ASSOC);
    }

    public function singleByName($name) {
        $name = $this->conexion->real_escape_string($name);
        $sql = "SELECT * FROM productos WHERE nombre = '$name'";
        $res = $this->conexion->query($sql);
        $this->response = $res->fetch_all(MYSQLI_ASSOC);
    }

    public function search($cadena) {
        $cadena = $this->conexion->real_escape_string($cadena);
        $sql = "SELECT * FROM productos WHERE nombre LIKE '%$cadena%'";
        $res = $this->conexion->query($sql);
        $this->response = $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getData() {
        return json_encode($this->response);
    }
}
?>
