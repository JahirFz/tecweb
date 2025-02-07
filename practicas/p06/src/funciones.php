<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function multiplo($num){
            return ($num%5==0 && $num%7==0);
        }
    ?>

    <?php
        function secuencia() {
            $matriz = [];
            $iteracion = 0;
    
            while (true) {
                $f = [
                rand(1, 999), 
                rand(1, 999), 
                rand(1, 999)];
                $iteracion++;
        
                if ($f[0] % 2 != 0 && $f[1] % 2 == 0 && $f[2] % 2 != 0) {
                    $matriz[] = $f;
                    break;
                }
                $matriz[] = $f;
            }

            return [$matriz, $iteracion];
        }
    ?>

    <?php
        function multiploAleatorioWhile($multiplo){
            $num = rand(1, 1000);
            while ($num % $multiplo != 0) {
                $num = rand(1, 1000);
            }
            return $num;
        }
    ?>

    <?php
        function multiploAleatorioDoWhile($multiplo) {
            do {
                $num = rand(1, 1000);
            } while ($num % $multiplo != 0);
            return $num;
        }
    ?>
</body>
</html>