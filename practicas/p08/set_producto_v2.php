<?php
$nombre = $_POST['name'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['story'];
$unidades = $_POST['cantidad'];
$imagen = $_POST['imagen'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '20septiembrE.', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

/** Verificacion de que un producto ya existe */
$stmt = $link->prepare("SELECT 1 FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?");
$stmt->bind_param("sss", $nombre, $marca, $modelo);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {
    echo '<p>Error: Este producto ya existe en la base de datos.</p>';
    $stmt->close();

}else{

    /** Crear una tabla que no devuelve un conjunto de resultados */
    $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
    if ( $link->query($sql) ) {
        echo 'Producto insertado con ID: '.$link->insert_id;

        echo '<h2>Resumen del producto insertado:</h2>';
        echo '<ul>';
        echo '<li><strong>Nombre:</strong> ' . $nombre . '</li>';
        echo '<li><strong>Marca:</strong> ' . $marca . '</li>';
        echo '<li><strong>Modelo:</strong> ' . $modelo . '</li>';
        echo '<li><strong>Precio:</strong> $' . number_format($precio, 2) . '</li>';
        echo '<li><strong>Detalles:</strong> ' . $detalles . '</li>';
        echo '<li><strong>Unidades:</strong> ' . $unidades . '</li>';
        echo '<li><strong>Imagen:</strong> <img src="' . $imagen . '</li>';
        echo '</ul>';

    }else{
	    echo 'El Producto no pudo ser insertado =(';
    }
}

$link->close();
?>
