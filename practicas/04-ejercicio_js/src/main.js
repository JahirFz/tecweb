
function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}
//ejemplo  1
function holamundo(){
    document.write('hola mundo');
}

//ejemplo 2
function datosPersona(){
    var nombre = "Juan";
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: ' + nombre + '</h3>';
    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: ' + edad + '</h3>';
    var div3 = document.getElementById('altura');
    div3.innerHTML = '<h3> Altura: ' + altura + '</h3>';
    var div4 = document.getElementById('casado');
    div4.innerHTML = '<h3> Casado: ' + casado + '</h3>';

}

//ejemplo 3
function datosPersonaEntrada(){
    var nombre = prompt('Ingresa tu nombre', '');
    var edad = prompt('Ingresa tu edad:', '');
    
    var div1 = document.getElementById('nombre2');
    div1.innerHTML = '<h3> Nombre: ' + nombre + '</h3>';
    var div2 = document.getElementById('edad2');
    div2.innerHTML = '<h3> Edad: ' + edad + '</h3>';

}

//ejemplo 4
function suma(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);

    var div1 = document.getElementById('suma');
    div1.innerHTML = '<h3> La suma es: ' + suma + '</h3>';
    var div2 = document.getElementById('producto');
    div2.innerHTML = '<h3> La suma es: ' + producto + '</h3>';
}

//ejemplo 5
function if_(){
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota');

    if (nota>=4){
        var div1 = document.getElementById('nota');
        div1.innerHTML = '<h3>' + nombre +  ' esta aprovado con un ' + nota +'</h3>';
    }
}

//ejemplo 6
function ifelse(){
    var num1 = prompt('Ingresa el primer número');
    var num2 = prompt('Ingresa el segundo número');
    num1=parseInt(num1);
    num2=parseInt(num2);

    if (num1>num2){
        var div1 = document.getElementById('num');
        div1.innerHTML = '<h3> el mayor es:'  + num1 + '</h3>';
    }else{
        var div1 = document.getElementById('num');
        div1.innerHTML = '<h3> el mayor es: '  + num2 + '</h3>';
    }

}

//ejemplo 7

function anidadas(){
    var nota1 = prompt('Ingresa 1ra nota:', '');
    var nota2 = prompt('Ingresa 2da nota:', '');
    var nota3 = prompt('Ingresa 3ra nota:', '');

    nota1=parseInt(nota1);
    nota2=parseInt(nota2);
    nota3=parseInt(nota3);

    var pro = (nota1+nota2+nota3)/3;
    var div1 = document.getElementById('estado');

    if(pro>=7){
            div1.innerHTML = '<h3> aprovado </h3>';
    }else{
        if(pro>=4){
            div1.innerHTML = '<h3> regular </h3>';
        }else{
            div1.innerHTML = '<h3> reprobado </h3>';
        }
    }
}

//ejemplo 8
function valores(){
    var valor=prompt('Ingresa un valor comprendido entre 1 y 5', '');

    valor=parseInt(valor);
    var div1 = document.getElementById('valor');

    switch(valor){
        case 1: div1.innerHTML = '<h3> uno </h3>';
                break;
        case 2: div1.innerHTML = '<h3> dos </h3>';
                break;
        case 3: div1.innerHTML = '<h3> tres </h3>';
                break;
        case 4: div1.innerHTML = '<h3> cuatro </h3>';
                break;
        case 5: div1.innerHTML = '<h3> cinco </h3>';
                break;
        default: case 1: div1.innerHTML = '<h3> debe ingresar un valor comprendido entre 1 y 5 </h3>';
    }
}

//ejemplo 9
function color(){
    var col = prompt('Ingrese el color con el que quiera pintar el fondo de la ventana (rojo, verde, azul)');

    switch(col){
        case 'rojo': document.bgColor='#ff0000'
                break;
        case 'verde': document.bgColor='#00ff00'
                break;
        case 'azul': document.bgColor='#0000ff'
                break;
    }
}

//ejemplo 10
function repetido(){
    var x = 1;

    while(x<=100){
            document.write(x);
            document.write('<br>');
            x=x+1;
    }
}

//ejemplo 11
function acumulador(){
    var x=1;
    var suma=0;
    var valor;

    while (x<=5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    var div1 = document.getElementById('sumaValores');
    div1.innerHTML = '<h3> La suma de los valores es: ' + suma + '</h3>';
}

//ejemplo 12
function digitos(){
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        document.write('El valor '+valor+' tiene');
        if (valor<10)
            document.write('Tiene 1 dígitos')
        else
            if (valor<100) {
            document.write('Tiene 2 dígitos');
            }
            else {
                document.write('Tiene 3 dígitos');
            }
    document.write('<br>');
    }while(valor!=0);
}

//ejemplo 13
function veces(){
    var f;
    for(f=1; f<=10; f++){
        document.write(f+"");
    }
}

//ejemplo 14
function implementacion1(){
    document.write('Cuidado<br>');
    document.write('Ingresa tu documento correctamente<br>');
    document.write('Cuidado<br>');
    document.write('Ingresa tu documento correctamente<br>');
    document.write('Cuidado<br>');
    document.write('Ingresa tu documento correctamente<br>');
}

//ejemplo 15
function implementacion2() {
    var div1 = document.getElementById('mostrar');

            for (var i = 0; i < 3; i++) {
                div1.innerHTML += 'Cuidado<br>Ingresa tu documento correctamente<br>';
            }
}

//ejemplo 16
function implementacion5() {
        var inicio;
        var x1 = prompt('Ingresa el valor inferior:', '');
        var x2 = prompt('Ingresa el valor superior:', '');

        for(inicio=x1; inicio <= x2; inicio++){
            document.write(inicio + '');
        }
}

//ejemplo 17
function retorno(){
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var resultado;

    if (valor == 1) 
        resultado = "uno";
        else if (valor == 2) 
            resultado = "dos";
            else if (valor == 3) 
                    resultado = "tres";
                    else if (valor == 4) 
                        resultado = "cuatro";
                            else if (valor == 5) 
                                resultado = "cinco";
                                else 
                                    resultado = "valor incorrecto";

    var div1 = document.getElementById('numeros');
    div1.innerHTML = '<h3>' + resultado + '</h3>';
}

//ejemplo 18
function retornovalor() {
    var x = prompt("Ingresa un valor entre 1 y 5", "");
    x=parseInt(x);
    var resul;

    switch (x) {
        case 1: resul= "uno"; break;
        case 2: resul = "dos"; break;
        case 3: resul = "tres"; break;
        case 4: resul = "cuatro"; break;
        case 5: resul = "cinco"; break;
        default: resul = "valor incorrecto";
    }

    var div1 = document.getElementById('val');
    div1.innerHTML = '<h3>' + resul + '</h3>';
}