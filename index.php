<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Logistica Aduanera Juarez</title>

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
    <img class="img-responsive" id="logotipo" src="res/Logotipos/logo.png" width="500" height="150"> </img>
  </div>

  <!--/*<h1 id="h1test"> TESTING </h1>-->
  <!--<img id="logotipo" url(../res/Fondos/leather.jpg)/>-->

  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Logistica Aduanera</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#">INICIO</a></li>
          <li id="custom_hover_nav"><a class="dropdown-toggle" data-toggle="dropdown" href="#">INVENTARIO SUBASTADO<span class="caret"></span></a>
            <ul class="dropdown-menu" id="collapse">
              <li><a href="#">Harley Davidson</a></li>
              <li><a href="#">Motos 2</a></li>
              <li><a href="#">Motos 3</a></li>
            </ul></li>
            <li><a href="#">TERMINOS Y CONDICIONES</a></li>
            <li><a href="#">CONTACTANOS</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <script>

    $(document).ready(function(){
      /*var isMobile = window.matchMedia("only screen and (max-width: 760px)");

      if (!isMobile.matches) {
        $("#custom_hover_nav").hover(function(){ //show inventario on hover
          $("#collapse").collapse('toggle');
        });
      }
      */
    });
    </script>

    <!--<h1>Hello, world!</h1>-->

  </body>
</html>
