<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;

    public function __construct($user, $pass, $dbname) {
        $this->conexion = @mysqli_connect(
            'localhost',
            $user, 
            $pass, 
            $dbname
        );

        if ($this->conexion) {
            die('Base de datos NO encontrada');
        }
    }
}
?>
