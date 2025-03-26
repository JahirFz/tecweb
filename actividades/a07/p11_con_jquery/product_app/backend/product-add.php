<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\Products;
require_once __DIR__ . '/Products.php';

// Crear una instancia de la clase Products
$products = new Products("root", "", "nombre_de_tu_bd");

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$data = array(
    'status'  => 'error',
    'message' => 'Ya existe un producto con ese nombre'
);

if (isset($_POST['nombre'])) {
    // SE TRANSFORMA EL POST A UN STRING EN JSON, Y LUEGO A OBJETO
    $jsonOBJ = json_decode(json_encode($_POST));

    // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
    $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
    $result = $products->conexion->query($sql); // Cambio en la variable de conexión

    if ($result->num_rows == 0) {
        $products->conexion->set_charset("utf8");
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
        
        if ($products->conexion->query($sql)) { // Cambio en la variable de conexión
            $data['status'] = "success";
            $data['message'] = "Producto agregado";
        } else {
            $data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($products->conexion);
        }
    }

    $result->free();
    // Cierra la conexión
    $products->conexion->close(); // Cambio en la variable de conexión
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>
