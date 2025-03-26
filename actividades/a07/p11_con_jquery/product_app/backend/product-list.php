<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\Products;
require_once __DIR__ . '/myapi/Products.php'; // Asegúrate de que el archivo se llame exactamente "Products.php"

$prodObj = new Products('root', '', 'marketzone'); // Debes incluir los parámetros correctos (usuario, contraseña y BD)
$prodObj->list();

echo $prodObj->getData();
?>
