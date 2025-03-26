<?php 
use TECWEB\MYAPI\Products;
require_once __DIR__ . '/myapi/Products.php'; // Asegúrate de que el archivo tenga el nombre correcto

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$data = array(
    'status'  => 'error',
    'message' => 'Hubo un error en la verificación'
);

// CREAR UNA INSTANCIA DE Products
$prodObj = new Products('root', '', 'marketzone'); // Pasa los parámetros correctos de conexión

// VERIFICACION DEL NOMBRE
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // SE USA EL MÉTODO CORRECTO PARA BUSCAR EL PRODUCTO POR NOMBRE
    $prodObj->singleByName($name);
    $response = json_decode($prodObj->getData(), true);

    // VALIDACION DEL NOMBRE
    if (!empty($response)) {
        $data['status'] = 'error';
        $data['message'] = 'El nombre del producto ya existe.';
    } else {
        $data['status'] = 'success';
        $data['message'] = 'Nombre disponible.';
    }
}

// SE DEVUELVE LA RESPUESTA EN FORMATO JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>
