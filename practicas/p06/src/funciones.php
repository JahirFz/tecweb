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
            $numgenerado = 0;
    
            while (true) {
                $f = [
                rand(1, 999), 
                rand(1, 999), 
                rand(1, 999)];

                $numgenerado +=3;
                $iteracion++;
        
                if ($f[0] % 2 != 0 && $f[1] % 2 == 0 && $f[2] % 2 != 0) {
                    $matriz[] = $f;
                    break;
                }
                $matriz[] = $f;
            }

            return [$matriz, $iteracion, $numgenerado];
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

    <?php
        function arregloAcsii(){
            $b=[];
            for($i=97; $i <= 122; $i++){
                $b[$i] = chr($i);
            }
            return $b;
        }
    ?>

    <?php
        function sexoEdad($edad, $sexo){
            if($sexo == 'femenino' && $edad >= 18 && $edad <= 35){
                echo 'Bienvenida, usted esta en el rango de edad permitido';
            }else{
                echo 'No cumple con la edad';
            }
        }
    ?>
</body>
</html>