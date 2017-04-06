<?php
session_start();
if(!isset($_SESSION['in']) OR !$_SESSION['in']){
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Logistica Premium</title>

  <!-- Bootstrap -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div id="container_logo">
    <img class="img-responsive" id="logotipo" src="res/Logotipos/logprem.png" width="500" height="150"> </img>
  </div>

  <div id="calculador">
    <p> Tipo de Cambio = $ <input type="text" value="18.50" id=tipoDeCambio></p>



  </body>

  <!--<img id="logotipo" url(../res/Fondos/leather.jpg)/>-->



  <script>

  $(document).ready(function(){
    /*var isMobile = window.matchMedia("only screen and (max-width: 760px)");

    if (!isMobile.matches) {
    $("#custom_hover_nav").hover(function(){ //show inventario on hover
    $("#collapse").collapse('toggle');
  });
}
*/
$('#correr').click(function() {
  var precioDeSalida, igi, dta, sumaInit, iva, servicio, otroIncrementable, prevalidador, sumaFinal, mayorCC, fletemexC, fleteusC, costofcop;
  var tipoDeCambio = document.getElementById("tipoDeCambio").value;
  precioDeSalida = 0;
  var precio = document.getElementById("precioText").value;
  var final = precioUnidad(precio);
  //console.log(final);
  document.getElementById("precioFinal").value = final;
  document.getElementById("costoFinalcop").value = (final*1 + ((tarifa(precio)*tipoDeCambio))*1);

  function tarifa(precio){
    if(precio >= 0.01 && precio <= 49.99){
      return 25.00;
    }
    else if(precio >= 50.00 && precio <= 99.99){
      return 45.00;
    }
    else if(precio >= 100.00 && precio <= 199.99){
      return 80.00;
    }
    else if(precio >= 200.00 && precio <= 399.99){
      return 120.00;
    }
    else if(precio >= 400.00 && precio <= 499.99){
      return 160.00;
    }
    else if(precio >= 500.00 && precio <= 599.99){
      return 185.00;
    }
    else if(precio >= 600.00 && precio <= 699.99){
      return 210.00;
    }
    else if(precio >= 700.00 && precio <= 799.99){
      return 230.00;
    }
    else if(precio >= 800.00 && precio <= 899.99){
      return 250.00;
    }
    else if(precio >= 900.00 && precio <= 999.99){
      return 275.00;
    }
    else if(precio >= 1000.00 && precio <= 1199.99){
      return 325.00;
    }
    else if(precio >= 1200.00 && precio <= 1399.99){
      return 350.00;
    }
    else if(precio >= 1400.00 && precio <= 1599.99){
      return 380.00;
    }
    else if(precio >= 1600.00 && precio <= 1799.99){
      return 410.00;
    }
    else if(precio >= 1800.00 && precio <= 1999.99){
      return 440.00;
    }
    else if(precio >= 2000.00 && precio <= 2499.99){
      return 470.00;
    }
    else if(precio >= 2500.00 && precio <= 2999.99){
      return 500.00;
    }
    else if(precio >= 3000.00 && precio <= 4999.99){
      return 600.00;
    }
    else if(precio >= 5000.00 && precio <= 9999.99){
      return precio * 0.15;
    }
    else{
      return 0;
    }
  }

  function precioUnidad(precio){
    if(document.getElementById("cilindrajemayor").checked){
      mayorCC = 1;
    }
    else{
      mayorCC = 0;
    }
    if(mayorCC == 1){
      precioDeSalida = parseFloat(precio) + parseFloat(tarifa(precio));
      document.getElementById("precioDolares").value = precioDeSalida;
      precioDeSalida *= tipoDeCambio;
      document.getElementById("precioPesos").value = precioDeSalida;
      dta = (precioDeSalida * 0.008);
      sumaInit = precioDeSalida + dta;
      iva = sumaInit * 0.16;
      servicio = 5000;
      otroIncrementable = 8000;
      prevalidador = 267;
      sumaFinal = dta + iva + prevalidador;
      return sumaFinal;
    }
    else{
      precioDeSalida = parseFloat(precio) + parseFloat(tarifa(precio));
      document.getElementById("precioDolares").value = precioDeSalida;
      precioDeSalida *= tipoDeCambio;
      document.getElementById("precioPesos").value = precioDeSalida;
      igi = (precioDeSalida * 0.15);
      dta = (precioDeSalida * 0.008);
      sumaInit = precioDeSalida + igi + dta;
      iva = sumaInit * 0.16;
      servicio = 5000;
      otroIncrementable = 8000;
      prevalidador = 267;
      sumaFinal = igi + dta + iva + prevalidador;
      return sumaFinal;
    }
  }
});

$('#correr').click(function(){
  var cambio = document.getElementById("tipoDeCambio").value;
  var copFleteDll = ((document.getElementById("all_fletes_cop").value*1) + (document.getElementById("precioDolares").value*1));

  document.getElementById("flete_dolares").value = copFleteDll;
  document.getElementById("flete_pesos").value = copFleteDll*cambio;
});

$('#correr2A').click(function() {
  var precioDeSalida2A, igi2A, dta2A, sumaInit2A, iva2A, servicio2A, otroIncrementable2A, prevalidador2A, sumaFinal2A, mayorCC2A, costof2a;
  precioDeSalida2A = 0;
  var precio2A = document.getElementById("precioText2A").value;
  var final2A = precioUnidad2A(precio2A);
  var tipoDeCambio2A = document.getElementById("tipoDeCambio").value;
  document.getElementById("precioFinal2A").value = final2A;
  document.getElementById("costoFinal2A").value = (final2A*1 + ((tarifa2A(precio2A)*tipoDeCambio2A))*1);

  function tarifa2A(precio2A){
    if(precio2A >= 0.01 && precio2A <= 49.99){
      return 75.00;
    }
    else if(precio2A >= 50.00 && precio2A <= 99.99){
      return 95.00;
    }
    else if(precio2A >= 100.00 && precio2A <= 199.99){
      return 130.00;
    }
    else if(precio2A >= 200.00 && precio2A <= 399.99){
      return 170.00;
    }
    else if(precio2A >= 400.00 && precio2A <= 499.99){
      return 210.00;
    }
    else if(precio2A >= 500.00 && precio2A <= 599.99){
      return 235.00;
    }
    else if(precio2A >= 600.00 && precio2A <= 699.99){
      return 260.00;
    }
    else if(precio2A >= 700.00 && precio2A <= 799.99){
      return 280.00;
    }
    else if(precio2A >= 800.00 && precio2A <= 899.99){
      return 300.00;
    }
    else if(precio2A >= 900.00 && precio2A <= 999.99){
      return 325.00;
    }
    else if(precio2A >= 1000.00 && precio2A <= 1199.99){
      return 375.00;
    }
    else if(precio2A >= 1200.00 && precio2A <= 1399.99){
      return 400.00;
    }
    else if(precio2A >= 1400.00 && precio2A <= 1599.99){
      return 430.00;
    }
    else if(precio2A >= 1600.00 && precio2A <= 1799.99){
      return 460.00;
    }
    else if(precio2A >= 1800.00 && precio2A <= 1999.99){
      return 490.00;
    }
    else if(precio2A >= 2000.00 && precio2A <= 2499.99){
      return 520.00;
    }
    else if(precio2A >= 2500.00 && precio2A <= 2999.99){
      return 550.00;
    }
    else if(precio2A >= 3000.00 && precio2A <= 4999.99){
      return 650.00;
    }
    else if(precio2A >= 5000.00 && precio2A <= 9999.99){
      return precio2A * 0.15;
    }
    else{
      return 0;
    }
  }

  function precioUnidad2A(precio2A){
    if(document.getElementById("cilindrajemayor2A").checked){
      mayorCC2A = 1;
    }
    else{
      mayorCC2A = 0;
    }

    if(mayorCC2A == 1){
      precioDeSalida2A = parseFloat(precio2A) + parseFloat(tarifa2A(precio2A));
      document.getElementById("precioDolares2A").value = precioDeSalida2A;
      precioDeSalida2A *= document.getElementById("tipoDeCambio").value;
      document.getElementById("precioPesos2A").value = precioDeSalida2A;
      dta2A = (precioDeSalida2A * 0.008);
      sumaInit2A = precioDeSalida2A + dta2A;
      iva2A = sumaInit2A * 0.16;
      servicio2A = 5000;
      otroIncrementable2A = 8000;
      prevalidador2A = 267;
      sumaFinal2A = dta2A + iva2A + prevalidador2A;
      return sumaFinal2A;
    }
    else{
      precioDeSalida2A = parseFloat(precio2A) + parseFloat(tarifa2A(precio2A));
      document.getElementById("precioDolares2A").value = precioDeSalida2A;
      precioDeSalida2A *= document.getElementById("tipoDeCambio").value;
      document.getElementById("precioPesos2A").value = precioDeSalida2A;
      igi2A = (precioDeSalida2A * 0.15);
      dta2A = (precioDeSalida2A * 0.008);
      sumaInit2A = precioDeSalida2A + igi2A + dta2A;
      iva2A = sumaInit2A * 0.16;
      servicio2A = 5000;
      otroIncrementable2A = 8000;
      prevalidador2A = 267;
      sumaFinal2A = igi2A + dta2A + iva2A + prevalidador2A;
      return sumaFinal2A;
    }
  }
});
$('#correr2A').click(function(){
  var cambio = document.getElementById("tipoDeCambio").value;
  //console.log(cambio);
  var dobleFleteDll = ((document.getElementById("all_fletes_doble").value*1) + (document.getElementById("precioDolares2A").value*1));
  document.getElementById("flete_dolares2A").value = dobleFleteDll;
  document.getElementById("flete_pesos2A").value = dobleFleteDll*cambio;
});

});
</script>



<h3> Calculador de precios para Copart </h3>
<p> Costo de la unidad = $ <input type="text" id="precioText"> </p>
<p> Flete:  <select id="all_fletes_cop"> </p>
  <option value="0">Sin seleccion</option>
  <option value="300">Abeline, Texas</option>
  <option value="300">Amarillo, Texas</option>
  <option value="300">Austin, Texas</option>
  <option value="300">Dallas, Texas</option>
  <option value="300">Forth Worth, Texas</option>
  <option value="350">Houston, Texas</option>
  <option value="350">Longview, Texas</option>
  <option value="300">Lubbock, Texas</option>
  <option value="350">Lufkin, Texas</option>
  <option value="230">Albuquerque, New Mexico</option>
  <option value="230">Denver, Colorado</option>
  <option value="230">Phoenix, Arizona</option>
  <option value="230">Tucson, Arizona</option>
  <option value="330">Oklahoma City, Oklahoma</option>
  <option value="330">Tulsa, Oklahoma</option>
  <option value="330">Kansas City, Kansas</option>
  <option value="330">Wichita, Kansas</option>
  <option value="450">Lincoln, Nebraska</option>
  <option value="450">Omaha, Nebraska</option>
  <option value="390">St. Louis, Missouri</option>
  <option value="390">Springfield, Missouri</option>
  <option value="390">Columbia, Missouri</option>
  <option value="390">Sikeston, Missouri</option>
  <option value="450">Des Moines, Iowa</option>
  <option value="500">Davenport, Iowa</option>
  <option value="500">Eldridge, Iowa</option>
  <option value="500">East Bethel, Minnesota</option>
  <option value="420">Little Rock, Arkansas</option>
  <option value="420">Fayetteville, Arkansas</option>
  <option value="400">Anaheim, California</option>
  <option value="500">Bakersfield, California</option>
  <option value="500">Fremont, California</option>
  <option value="500">Fresno, California</option>
  <option value="400">Los Angeles, California</option>
  <option value="400">Rancho Cucamonga, California</option>
  <option value="400">San Bernardino, California</option>
  <option value="450">Van Nuys, California</option>
  <option value="500">Peoria, Illinois</option>
  <option value="390">Granite, Illinois</option>
  <option value="500">Lincoln, Illinois</option>
  <option value="530">Lexington, Kentucky</option>
  <option value="530">Louisville, Kentucky</option>
  <option value="430">Baton Rouge, Louisiana</option>
  <option value="450">CrashedToys</option>
</select>
<form name="cilin">
  <p>Cilindraje de la motocicleta es mayor a 800 cc <input type="radio" name="cilindrajes" id="cilindrajemayor" value="1"></p>
  <p>Cilindraje de la motocicleta es menor a 800 cc <input type="radio" name="cilindrajes" id="cilindrajemenor" value="0"></p>
</form>
<p>
</p>
<p id="tipoDeCambio" value="18.50"></p>

<button id="correr"> Correr calculos </button>
<p> Costo de la unidad incluyendo porcentaje de salida para auction, en dolares (<strong>sin flete</strong>) = $ <input type="text" value="Precio en dolares..." style="color: black;" class="field left" id="precioDolares" readonly> </p>
<p> Costo de la unidad incluyendo porcentaje de salida para auction, en pesos (<strong>sin flete</strong>) = $ <input type="text" value="Precio en pesos..." style="color: black;" class="field left" id="precioPesos" readonly> </p>
<p> Precio de salida <strong>con flete</strong> en dolares = $ <input type="text" id="flete_dolares" readonly></p>
<p> Precio de salida <strong>con flete</strong> en pesos = $ <input type="text" id="flete_pesos" readonly></p>
<p> Impuestos de la unidad (sin flete, en pesos) = $ <input type="text" value="Precio + impuestos..." style="color: black;" class="field left" id="precioFinal" readonly> </p>
<p> Costo de salida + impuestos (pesos) = $ <input type="text" value="Costo final unidad..." style="color: black;" class="finalcop" id="costoFinalcop" readonly> </p>

<h3> Calculador de precios para AA </h3>
<p> Costo de la unidad = $ <input type="text" id="precioText2A"> </p>
<p> Fletes:  <select id="all_fletes_doble"> </p>
  <option value="0">Sin seleccion</option>
  <option value="300">Abeline, Texas</option>
  <option value="300">Amarillo, Texas</option>
  <option value="300">Austin, Texas</option>
  <option value="300">Dallas, Texas</option>
  <option value="300">Forth Worth, Texas</option>
  <option value="350">Houston, Texas</option>
  <option value="350">Longview, Texas</option>
  <option value="300">Lubbock, Texas</option>
  <option value="350">Lufkin, Texas</option>
  <option value="230">Albuquerque, New Mexico</option>
  <option value="230">Denver, Colorado</option>
  <option value="230">Phoenix, Arizona</option>
  <option value="230">Tucson, Arizona</option>
  <option value="330">Oklahoma City, Oklahoma</option>
  <option value="330">Tulsa, Oklahoma</option>
  <option value="330">Kansas City, Kansas</option>
  <option value="330">Wichita, Kansas</option>
  <option value="450">Lincoln, Nebraska</option>
  <option value="450">Omaha, Nebraska</option>
  <option value="390">St. Louis, Missouri</option>
  <option value="390">Springfield, Missouri</option>
  <option value="390">Columbia, Missouri</option>
  <option value="390">Sikeston, Missouri</option>
  <option value="450">Des Moines, Iowa</option>
  <option value="500">Davenport, Iowa</option>
  <option value="500">Eldridge, Iowa</option>
  <option value="500">East Bethel, Minnesota</option>
  <option value="420">Little Rock, Arkansas</option>
  <option value="420">Fayetteville, Arkansas</option>
  <option value="400">Anaheim, California</option>
  <option value="500">Bakersfield, California</option>
  <option value="500">Fremont, California</option>
  <option value="500">Fresno, California</option>
  <option value="400">Los Angeles, California</option>
  <option value="400">Rancho Cucamonga, California</option>
  <option value="400">San Bernardino, California</option>
  <option value="450">Van Nuys, California</option>
  <option value="500">Peoria, Illinois</option>
  <option value="390">Granite, Illinois</option>
  <option value="500">Lincoln, Illinois</option>
  <option value="530">Lexington, Kentucky</option>
  <option value="530">Louisville, Kentucky</option>
  <option value="430">Baton Rouge, Louisiana</option>
  <option value="450">CrashedToys</option>
</select>
<form name="cilin2A">
  <p>Cilindraje de la motocicleta es mayor a 800 cc <input type="radio" name="cilindrajes2A" id="cilindrajemayor2A" value="1"></p>
  <p>Cilindraje de la motocicleta es menor a 800 cc <input type="radio" name="cilindrajes2A" id="cilindrajemenor2A" value="0"></p>
</form>
<p>
</p>
<button id="correr2A" style="color: black;"> Correr calculos </button>
<p> Costo de la unidad incluyendo porcentaje de salida para auction, en dolares (<strong>sin flete</strong>) = $ <input type="text" value="Precio en dolares..." style="color: black;" class="field left2A" id="precioDolares2A" readonly> </p>
<p> Costo de la unidad incluyendo porcentaje de salida para auction, en pesos (<strong>sin flete</strong>) = $ <input type="text" value="Precio en pesos..." style="color: black;" class="field left2A" id="precioPesos2A" readonly> </p>
<p>Precio de salida <strong> con flete </strong> en dolares = $ <input type="text" id="flete_dolares2A" readonly></p>
<p> Precio de salida <strong> con flete </strong> en pesos = $ <input type="text" id="flete_pesos2A" readonly></p>
<p> Impuestos de la unidad (sin flete, en pesos) = $ <input type="text" value="Precio + impuestos..." style="color: black;"class="field left2A" id="precioFinal2A" readonly> </p>
<p> Costo de salida + impuestos (pesos) = $ <input type="text" value="Costo final unidad..." style= "color: black;" class="finaldobleA" id="costoFinal2A" readonly> </p>
</div>
</body>
</html>
