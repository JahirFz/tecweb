<?php
use TECWEB\MYAPI\Products as Products;
require_once __DIR__ . '/myapi/Products.php';

$products = new Products('root', '', 'marketzone');
$products->add($_POST);
echo $products->getData();
?>