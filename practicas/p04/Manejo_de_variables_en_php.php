<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Variables php </title>
    </head>

    <body>
        <h1>Manejo de variables en php  </h1>

        <?php
            echo "<h2>Inciso 1</h2>";
            echo '$_myvar: es valida, porque comienza con un guion bajo, sigue la nomenclatura de php';
            echo "<br>";
            echo '$_7var: es valida, porque comienza con un guion bajo, sigue la nomenclatura de php';
            echo "<br>";
            echo 'myvar: no es valida, porque no comienza con el signo de $, no sigue la nomenclatura de php';
            echo "<br>";
            echo '$myvar: es valida, porque comienza el signo $, sigue la nomenclatura de php';
            echo "<br>";
            echo '$var7: es valida, porque comienza con el signo $, sigue la nomenclatura de php';
            echo "<br>";
            echo '$_element1: es valida, porque comienza con un guion bajo, sigue la nomenclatura de php';
            echo "<br>";
            echo '$house*5: no es valida, porque tiene un signo *, no sigue la nomenclatura de php';
        ?>

        <?php
            echo "<h2>Inciso 2</h2>";
            echo "<h3>a)</h3>";
            $a = "ManejadorSQL";
            $b = 'MySQL';
            $c = &$a;
            
            echo "Variable \$a: $a <br>";
            echo "Variable \$b: $b <br>";
            echo "Variable \$c: $c";
            
            echo "<h3>b) y c)</h3>";
            $a = "PHP server";
            $b = &$a;
            
            echo "Variable \$a: $a <br>";
            echo "Variable \$b: $b <br>";
            echo "Variable \$c: $c";
            
            echo "<h3>d)</h3>";
            echo "La variable \$a cambia su valor a 'PHP server' y como las variables \$b y \$c son referencias de \$a, toman el mismo valor";
            unset($a, $b, $c)
        ?>

        <?php
            echo "<h2>Inciso 3</h2>";

            $a = "PHP5";
            echo "Variable \$a: $a <br>";
            
            $z[] = &$a;
            print_r($z);
            echo "<br>";
            
            $b = "5a version de PHP";
            echo "Variable \$b: $b <br>";
            
            $c = $b*10;
            echo "Variable \$c: $c <br>";
            
            $a .= $b;
            echo "Variable \$a: $a <br>";
            
            $b *= $c;
            echo "Variable \$b: $b <br>";
            
            $z[0] = "MySQL";
            print_r($z);

            unset($a, $b, $c, $z)
        ?>


        <?php
            echo "<h2>Inciso 4</h2>";

            $a = "PHP5";
            echo "Variable \$a:" . $GLOBALS['a'] . "<br>";
                        
            $z[] = &$a;
            print_r($GLOBALS['z']);
            echo "<br>";
                        
            $b = "5a version de PHP";
            echo "Variable \$b:" . $GLOBALS['b'] . "<br>";
                        
            $c = $b*10;
            echo "Variable \$c:" . $GLOBALS['c'] . "<br>";
                        
            $a .= $b;
            echo "Variable \$a:" . $GLOBALS['a'] . "<br>";
                        
            $b *= $c;
            echo "Variable \$b:" . $GLOBALS['b'] . "<br>";
                        
            $z[0] = "MySQL";
            print_r($GLOBALS['z']);

            unset($a, $b, $c, $z)
        ?>

        <h2>Inciso 5</h2>

        <?php
            $a = "7 personas";
            $b = (integer) $a;
            $a = "9e3";
            $c = (double) $a;
            
            echo "Variable \$a: $a <br>";
            echo "Variable \$b: $b <br>";
            echo "Variable \$c: $c"; 
        ?>

        <h2>Inciso 6</h2>

        <?php
            $a = "0";
            $b = "TRUE";
            $c = FALSE;
            $d = ($a OR $b);
            $e = ($a AND $c);
            $f = ($a XOR $b);
            
            echo "Variable \$a: ", var_dump($a);
            echo "<br>";
            echo "Variable \$a: ", var_dump($b);
            echo "<br>";
            echo "Variable \$a: ", var_dump($c);
            echo "<br>";
            echo "Variable \$a: ", var_dump($d);
            echo "<br>";
            echo "Variable \$a: ", var_dump($e);
            echo "<br>";
            echo "Variable \$a: ", var_dump($f);
        ?>

        <h3>Transformación de valor booleano de la variable $c y $e</h3>

        <?php
            echo "Variable \$c: " . (int)$c;
            echo "<br>";
            echo "Variable \$e: " . (int)$e;
        ?>

    </body>
</html>
