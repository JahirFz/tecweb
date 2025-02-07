<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Titulo de la página </title>
    </head>
    <body>
        <h2> 1. Escribir programa para comprobar si un número es un múltiplo de 5 y 7. </h2>
        <?php

            require_once __DIR__ . '/src/funciones.php';

            if (isset($_GET['numero'])) {
                $num= $_GET['numero'];
                echo multiplo($num) ? "$num es múltiplo de 5 y 7" : "$num no es múltiplo de 5 y 7";
            }
        ?>

        <h2></h2>

        <?php
            require_once __DIR__ . '/src/funciones.php';

            list($matriz, $iteracion) = secuencia();

            echo "<table border='0'>";
            foreach ($matriz as $f) {
                echo "<tr><td>" . implode("</td><td>", $f) . "</td></tr>";
            }
            echo "</table>";
            echo "<p>{$iteracion} iteraciones realizadas.</p>";
        ?>

    <h2>Con ciclo while</h2>
    <?php
        require_once __DIR__ . '/src/funciones.php';
    if (isset($_GET['multiplo'])) {
        $multiplo = $_GET['multiplo'];
        if (is_numeric($multiplo) && $multiplo> 0) {
            $resultado = multiploAleatorioWhile($multiplo);
            echo "El primer múltiplo de $multiplo encontrado con while es $resultado";
        }
    }
    ?>

    <h2>Con ciclo do-while</h2>
    <?php
        require_once __DIR__ . '/src/funciones.php';
    if (isset($_GET['multiplo'])) {
        if (is_numeric($multiplo) && $multiplo > 0) {
            $resultado = multiploAleatorioDoWhile($multiplo);
            echo "El primer múltiplo de $multiplo encontrado con do-while es $resultado";
        }
    }
    ?>

    <h2>4.</h2>
    <?php
        $arreglo= arregloAlfabetoAcsii();
        
        foreach($arreglo as $key => $value){
            echo "[$key] => $value <br>";
        }
    ?>

    <h2>5.</h2>
    <form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
            Edad: <input type="text" name="edad" required><br>
            Sexo: <input type="text" name="sexo" required><br>
                    <input type="submit" value="Verificar">
        </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo sexoEdad($_POST['edad'], $_POST['sexo']);
        }
    ?>
    </body>
</html>