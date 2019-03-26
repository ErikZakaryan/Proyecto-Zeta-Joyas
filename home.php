<?php
    session_start();
    require_once("FuncOpers/conexiones.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Zeta Joyas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a routerLink="" class="narvar-brand" style="text-decoration: none; font-size: 1.7rem; color: #e1e1e1; margin-right: 1.5rem">Zeta Joyas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbarSupportedContent collapse navbar-collapse" id="navbarSupportedContent">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-xl-4 col-lg-2 navbarSupportedContent collapse navbar-collapse float-left" style="border-left: 1px solid gold"></div>
                  <div class="col-xl-8 col-lg-10">
                      <ul class="navbar-nav" id="navbarClick">
                          <li class="nav-item" id="item6">
                              <a class="nav-link" href="home.php">Home</a>
                          </li>
                          <li class="nav-item" id="item5">
                              <a class="nav-link" href="tienda.php">Tienda</a>
                          </li>
                          <li class="nav-item" id="item4">
                              <a class="nav-link" href="
                              <?php
                                  if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                                      echo "miCuenta.php";
                                  } else {
                                      echo "Login-Register.php";
                                  }
                              ?>
                              ">Mi Cuenta</a>
                          </li>
                          <li class="nav-item" id="item3">
                          <a class="nav-link" href="
                              <?php
                                  if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                                      echo "listaDeseos.php";
                                  } else {
                                      echo "Login-Register.php";
                                  }
                              ?>
                              ">Mi Lista de Deseos</a>
                          </li>
                          <li class="nav-item" id="item2">
                          <a class="nav-link" href="
                              <?php
                                  if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                                      echo "carrito.php";
                                  } else {
                                      echo "Login-Register.php";
                                  }
                              ?>
                              ">Carrito</a>
                          </li>
                          <li class="nav-item" id="item1">
                              <!-- <a class='nav-link' routerLink="loginRegister">Iniciar Sesión o Registrarse</a> -->
                              <?php
                                  if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                                      $idUsuarioLogueado = $_SESSION["id"];
                                      $nombreUsuarioLogueado = $_SESSION["nombre"];
                                      $apellidoUsuarioLogueado = $_SESSION["apellido"];

                                      echo "<a class='nav-link' href='FuncOpers/funcionLogout.php'>Cerrar sesión</a>";

                                      // echo "<a class='nav-link' href=''>Bienvenido " . $nombreUsuarioLogueado . " " . $apellidoUsuarioLogueado . "</a>";
                                  } else {
                                      $idUsuarioLogueado = "";
                                      echo "<a class='nav-link' href='Login-Register.php'>Iniciar Sesión o Registrarse</a>";
                                  }
                              ?>
                          </li>     
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </nav>

                <?php
                    // if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                    //     $idUsuarioLogueado = $_SESSION["id"];
                    //     $nombreUsuarioLogueado = $_SESSION["nombre"];
                    //     $apellidoUsuarioLogueado = $_SESSION["apellido"];

                    //     echo "<h1>Bienvenido</h1>";
                    //     echo "<h5 class='nombreUsuarioLogueado'>". $nombreUsuarioLogueado . " " . $apellidoUsuarioLogueado . "</h5>";

                    //     // echo "<a class='nav-link' href=''>Bienvenido " . $nombreUsuarioLogueado . " " . $apellidoUsuarioLogueado . "</a>";
                    // } else {
                    //     $idUsuarioLogueado = "";
                    //     echo "<h1>Zeta Joyas</h1>";
                    // }
                ?>

    


    <div class="container-fluid">
      <div class="row">
        <div class="col-12" style="padding:0">
          <img src="imagenes/banner.jpg" alt="Banner Zeta Joyas" width="100%" height="350rem" style="border-bottom:5px solid gold">
        </div>
      </div>
      
    </div>
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12" style="margin-top: 5rem">
          <h1 class="font-weight-bold">Zeta Joyas</h1>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-12" style="margin-top: 1rem">
          <p>En el año 1973, un grupo de joyeros con ganas de emprender una ilusión, decidimos fundar la joyería "EL TASADOR".</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-1"></div>
        <div class="col-lg-5 text-center" style="margin-top: 5rem; padding-left: 6px">
          <img src="imagenes/frenteJoyeria.jpg" alt="Foto del Frente de la Joyería">
        </div>
        <div class="col-lg-5" style="margin-top: 5rem">
          <h1 class="font-weight-bold" style="margin-bottom: 3rem">La Empresa</h1>
          <p style="font-size: 1rem">El Tasador nace en la zona de Once de la Capital Federal. De esta forma da comienzo un sueño que a través de los años se ha convertido en una de las joyerías más importantes de Bs.as. En el día de la fecha contamos con un amplio local en la esquina de Corrientes y Pueyrredón, con más de trescientos metros cuadrados en donde los que nos visitan podrán apreciar una importante cantidad de antigüedades de muy alta calidad. Nuestra dedicación comprende la tasación y compra de alhajas antiguas, brillantes, relojes, platería, cuadros, esculturas y toda clase de objetos que estén ligados con el arte. Los esperamos para brindarles la mejor atención de lunes a viernes en nuestro horario de 09.00 a 20.00 hs, y los sábados de 09.00 a 14.00.</p>
        </div>
        <div class="col-lg-1"></div>
      </div>
    </div>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-12" style="margin-top: 5rem">
              <h1 class="font-weight-bold">Tienda Online</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12" style="margin-top: 1rem">
                <p>Tenemos una increible variedad de productos y estilos para que usted pueda elegir su joya ideal</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a class="btn btn-warning" routerLink="tienda">Ingrese a nuestra Tienda</a>
            </div>
          </div>
    </div>

    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12" style="margin-top: 5rem">
          <h1 class="font-weight-bold">Contáctenos</h1>
        </div>
      </div>
      <div class="row" style="margin-top: 1rem">
        <div class="col-1"></div>
        <div class="col-lg-6">
          <p>Nuestra empresa cuenta con el grupo de profesionales tasadores más preparados del mercado, que le brindarán la seguridad de contar con el mejor precio de mercado para sus pertenencias. Complete el formulario para tasar su pieza on line sin costo.</p>

          <!-- GOOGLE MAPS JOYERIA -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.539410166738!2d-58.524982985051885!3d-34.61580666564424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb7d8547eaaab%3A0xaec8e208b39c111b!2sZeta+Joyas!5e0!3m2!1ses-419!2sar!4v1552339599971" width="100%" height="250" frameborder="0" style="border:1px solid gold" allowfullscreen></iframe>
          <div class="container-fluid">
              <div class="detail-block">
                <div class="detail-title"><i class="fas fa-map-marker-alt"> </i>
                  <h6 class="font-weight-bolder">Dirección</h6>
                </div>
                <p><span class="detail-text"> Av. Lope de Vega 2859 (CABA)</span></p>
              </div>

              
              <div class="detail-block">
                <div class="detail-title"><i class="fa fa-phone"> </i>
                  <h6 class="font-weight-bolder">Teléfonos</h6>
                </div>
                <p><span class="detail-text"> 011 3398-7195</span></p>
              </div>
              <hr>
              <div class="detail-block">
                <div class="detail-title"><i class="fa fa-envelope"> </i>
                  <h6 class="font-weight-bolder">Correo Electrónico</h6>
                </div>
                <p><span class="detail-text">zetajoyas@gmail.com</span></p>
              </div>
            </div>
          
        </div>

        <div class="col-lg-4">
            <form action="FuncOpers/enviarMensajeCliente.php" method="POST">
                <div class="form-group">
                  <h3 class="text-center">Envíanos un mensaje</h3>
                    <div class="form-group">
                        <div class="input-group"> <!-- POSICIONA AL LADO DEL INPUT UNA IMAGEN O ICONO (DEJA UNA IMAGEN AL LADO DEL INPUT) -->
                            <div class="input-group"> <!-- POSICIONA DENTRO DEL INPUT LA IMAGEN O ICONO (PEGA LA IMAGEN AL LADO DEL INPUT) -->
                              <span>Nombre</span>
                            </div>
                            <input required name="nombre" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">    
                        <div class="input-group"> 
                            <div class="input-group"> 
                                <span>Correo electrónico</span>
                            </div>
                            <input required name="mail" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">    
                        <div class="input-group"> 
                            <div class="input-group">
                                <span>Número</span>
                            </div>
                            <input required name="numero" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> 
                            <div class="input-group">
                                <span>Comentarios</span>
                            </div>
                            <textarea required class="form-control" name="comentario" id="" cols="1000" rows="5"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary">Enviar</button>
                  </div>
            </form>
        </div>
        <div class="col-1"></div>
      </div>
    </div>


<footer class="modal-footer bg-dark d-flex" style="border-top: 5px solid gold">
    <div class="container-fluid">
      <div class="row navbar">
        <div class="col-1"></div>
        <div class="col-lg-4" style="color:white">
          <h4>Zeta Joyas</h4>
          <p>Nuestra dedicación comprende la tasación y compra de alhajas antiguas, brillantes, relojes, platería, cuadros, esculturas y toda clase de objetos que estén ligados con el arte.
              Los esperamos para brindarles la mejor atención de lunes a viernes en nuestro horario de 09.00 a 20.00 hs, y los sábados de 09.00 a 14.00.</p>
        </div>
        <div class="col-1"></div>
        <div class="col-lg-5">
          <ul class="navbar-nav">
            <li class="nav-item" id="item6">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item" id="item5">
              <a class="nav-link" href="tienda.php">Tienda</a>
              </li>
            <li class="nav-item" id="item4">
            <a class="nav-link" href="
                <?php
                    if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                        echo "miCuenta.php";
                    } else {
                        echo "Login-Register.php";
                                  }
                ?>
                ">Mi Cuenta</a>
            </li>
            <li class="nav-item" id="item3">
                <a class="nav-link" href="
                <?php
                    if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                        echo "listaDeseos.php";
                    } else {
                        echo "Login-Register.php";
                                  }
                ?>
                ">Mi Lista de Deseos</a>
            </li>
            <li class="nav-item" id="item2">
            <a class="nav-link" href="
                <?php
                    if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                        echo "carrito.php";
                    } else {
                        echo "Login-Register.php";
                                  }
                ?>
                ">Carrito</a>
            </li>
            <li class="nav-item" id="item1">
              <!-- <a class='nav-link' routerLink="loginRegister">Iniciar Sesión o Registrarse</a> -->
              <?php
                  if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                      $idUsuarioLogueado = $_SESSION["id"];
                      $nombreUsuarioLogueado = $_SESSION["nombre"];
                      $apellidoUsuarioLogueado = $_SESSION["apellido"];

                      echo "<a class='nav-link' href='FuncOpers/funcionLogout.php'>Cerrar sesión</a>";

                      // echo "<a class='nav-link' href=''>Bienvenido " . $nombreUsuarioLogueado . " " . $apellidoUsuarioLogueado . "</a>";
                  } else {
                      $idUsuarioLogueado = "";
                      echo "<a class='nav-link' href='Login-Register.php'>Iniciar Sesión o Registrarse</a>";
                  }
              ?>
            </li>     
          </ul>
        </div>
        <div class="col-1"></div>
      </div>
    </div>
  </footer>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>