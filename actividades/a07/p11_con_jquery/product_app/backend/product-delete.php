<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\Products;
require_once __DIR__ . '/Products.php';

// Crear una instancia de la clase Products
$products = new Products("root", "", "nombre_de_tu_bd");

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array(
    'status'  => 'error',
    'message' => 'La consulta falló'
);

// SE VERIFICA HABER RECIBIDO EL ID
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
    
    if ($products->conexion->query($sql)) {
        $data['status'] = "success";
        $data['message'] = "Producto eliminado";
    } else {
        $data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($products->conexion);
    }

    // Cierra la conexión
    $products->conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>
