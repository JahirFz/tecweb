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

    // Buscar un producto por nombre
    public function singleByName($name) {
        $this->response = array();

        $stmt = $this->conexion->prepare("SELECT * FROM productos WHERE nombre = ? AND eliminado = 0");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        }

        $stmt->close();
        $this->conexion->close();
    }

    // Convertir el array response a JSON
    public function getData() {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
?>
