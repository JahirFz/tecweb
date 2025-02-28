<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizado</title>
</head>
<body>
<?php

$link = mysqli_connect("localhost", "root", "20septiembrE.", "marketzone");

if ($link === false) {
    die("ERROR: No pudo conectarse con la base de datos");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $sql = "UPDATE productos SET nombre = ?, modelo = ?, marca = ?, precio = ?, detalles = ?, unidades = ?, imagen = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssdssi", 
            $_POST['nombre'], 
            $_POST['modelo'], 
            $_POST['marca'], 
            $_POST['precio'], 
            $_POST['story'], 
            $_POST['cantidad'], 
            $_POST['imagen'], 
            $_POST['id']
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "Registro actualizado.";
        } else {
            echo "ERROR: No se pudo ejecutar la consulta. " . mysqli_stmt_error($stmt);
        }

      
        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: No se pudo preparar la consulta. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>
</body>
</html>