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
    <link rel="stylesheet" type="text/css" href="Login-Register.css">
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
        require_once("FuncOpers/conexiones.php");
        $usuarioContraseñaIncorrecta = "";
        $mailUsado = "";
        $userUsado = "";
        $camposincompletos = "";
        //header("Location: Login-Register.php");
    ?>

    <div class="container" style="margin: 1rem auto; border: 3px solid gold; border-radius: 20px;">
        <div class="row align-items-center" style="height: 40rem" >
            <div id="LogoLogin" class="col-6" style="height: 100%;  border-top-left-radius: 20px;  border-bottom-left-radius: 20px">
                <img class="img-responsive" src="imagenes/logoZetaJ.jpg" style=" width: 85%; height: 60%">
            </div>
            <div class="col-6">
                <form method="POST" action="FuncOpers/funcionLogin.php">
                    <h1 class="tituloLogin" style="text-align: center; font-size: 2rem">Login</h1>
                    <div class="row">
                        <div class="col-6 colInput1" style="padding-right:0">
                            <input name="usuario" id="usuarioLogin" required class="form-control" type="text" style="height: 40px" placeholder="Usuario">
                        </div>
                        <div class="col-6 colInput2" style="padding-left:0">
                            <input name="password" id="passwordLogin" required class="form-control" type="password" style="height: 40px" placeholder="Contraseña">
                        </div>
                    </div>
                   <div>
                        <p id="mensajeDeIncorrecto" style="color:red; font-size: 12px; margin:0, padding:0;"> </p>
                   </div>
                    <button type="button" id="botonLogin" class="btn btn-dark btn-block" style="margin-top:10px">Ingresar</button>
                    <a href="" style="color:black; font-size: 1rem">¿Se ha olvidado la contraseña?</a> 

                </form>
                <div class="registro" style="margin-top:20px">
                    <h1 style="text-align: center; font-size: 2rem;">¿Desea registrarse?</h1>
                    <form method="POST" action="FuncOpers/funcionRegister.php">
                        <div class="row rowRegistro">
                            <div class="col-6 colInputRegistro1" style="padding-right:0">
                                <input required name="nombre" class="form-control" type="text" style="height: 40px" placeholder="Nombre">
                            </div>
                            <div class="col-6 colInputRegistro2" style="padding-left:0">
                                <input required name="apellido" class="form-control" type="text" style="height: 40px" placeholder="Apellido">
                            </div>
                        </div>
                        <input name="usuario" class="form-control" id="usuarioRegister" type="text" style="margin-top:5px" placeholder="Usuario">
                        <input required name="password" class="form-control" type="password" style="margin-top:5px" placeholder="Contraseña">
                        <input required name="passwordRep" class="form-control" type="password" style="margin-top:5px" placeholder="Repetir Contraseña">
                        <input required name="mail" id="mailRegister" class="form-control" type="mail" style="margin-top:5px" placeholder="Correo">
                        <input required type="checkbox">Usted acepta los <a href="" style="color:black">Terminos y Condiciones</a>
                        <button type="submit" class="btn btn-dark btn-block" style="margin-top:10px">Registrarse</button>
                        <div class="row text-center align-items-center">
                            <div id="resultado">

                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
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


        <!-- LINK JQUERT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- LINK JQUERY DE BOOTSTRAP SIN SLIM -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- https://sweetalert2.github.io/ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>

        <!-- MI LINK JS -->
        <script src="JS/funciones.js"></script>
</body>
</html>






<!-- 
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estiloLoginZetaJoyas.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    </head>
    <body style="background: black"> -->
    <?php
        // session_start();
        // require_once("FuncOpers/conexiones.php");
        // $usuarioContraseñaIncorrecta = "";
        // $mailUsado = "";
        // $userUsado = "";
        // $camposincompletos = "";
        // //header("Location: Login-Register.php");
    ?>
        <!-- <div class="container" style="background: gold; ; margin-top: 1rem; border: 3px solid gold; border-radius: 20px;">
            <div class="row align-items-center" style="height: 40rem" >
                <div class="col-6" style="background: black; height: 100%;  border-top-left-radius: 20px;  border-bottom-left-radius: 20px">
                    <img class="img-responsive" src="imagenes/diamante.jpg" style="heignt: 30rem; width: 30rem;">
                </div>
                <div class="col-6">
                    <form method="POST" action="FuncOpers/funcionLogin.php">
                        <h1 class="tituloLogin" style="text-align: center; font-size: 2rem">Login</h1>
                        <div class="row">
                            <div class="col-6 colInput1">
                                    <input name="usuario" id="usuarioLogin" required class="form-control" type="text" style="height: 40px" placeholder="Usuario">
                            </div>
                            <div class="col-6 colInput2">
                                    <input name="password" id="passwordLogin" required class="form-control" type="password" style="height: 40px" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="mensajes text-center" id="mensajeDeIncorrecto"> -->
                            <?php
                                // if (isset($_GET["usuarioContraseñaIncorrecta"])) {
                                //     $usuarioContraseñaIncorrecta = $_GET["usuarioContraseñaIncorrecta"];
                                //     if ($usuarioContraseñaIncorrecta == "si") {
                                //         echo "<p style='background:red;width: 15rem'>Usuario o Contraseña Incorrecta</p>";
                                //     } else {
                                //         // SE PUDO LOGEAR
                                //     }

                                // } else {
                                //     $usuarioContraseñaIncorrecta = "";
                                // }
                                
                            ?>
                        <!-- </div>
                        <button type="submit" class="btn btn-dark btn-block" style="margin-top:10px">Ingresar</button>
                        <a href="" style="color:black">¿Se ha olvidado la contraseña?</a> 
                        
                    </form>
                    <div class="registro" style="margin-top:20px">
                        <h1 style="text-align: center; font-size: 2rem;">¿Desea registrarse?</h1>
                        <form method="POST" action="FuncOpers/funcionRegister.php">
                            <div class="row rowRegistro">
                                <div class="col-6 colInputRegistro1">
                                    <input required name="nombre" class="form-control" type="text" style="height: 40px" placeholder="Nombre">
                                </div>
                                <div class="col-6 colInputRegistro2">
                                    <input required name="apellido" class="form-control" type="text" style="height: 40px" placeholder="Apellido">
                                </div>
                            </div>
                            <input name="usuario" class="form-control" id="usuarioRegister" type="text" style="margin-top:5px" placeholder="Usuario">
                            <input required name="password" class="form-control" type="password" style="margin-top:5px" placeholder="Contraseña">
                            <input required name="passwordRep" class="form-control" type="password" style="margin-top:5px" placeholder="Repetir Contraseña">
                            <input required name="mail" class="form-control" type="mail" style="margin-top:5px" placeholder="Mail">
                            <input required type="checkbox" name="M">Usted acepta los <a href="" style="color:black">Terminos y Condiciones</a>
                            <button type="submit" class="btn btn-dark btn-block" style="margin-top:10px">Registrarse</button>
                            <div class="row text-center align-items-center"> -->
                                <!-- <div class="bg-danger mensajes" id="mensajeRegister" style="margin: 1%">
                                    <?php
                                        // if (isset($_GET["nomail"]) && isset($_GET["nouser"]) && isset($_GET["camposincompletos"])) {
                                        //     $mailUsado = $_GET["nomail"];
                                        //     $userUsado = $_GET["nouser"];
                                        //     $camposincompletos = $_GET["camposincompletos"];
                                        //     if ($mailUsado == 1 && $userUsado == 1){
                                        //         echo "El mail y el usuaro ya se encuentran registrados";
                                        //     } elseif ($mailUsado == 0 && $userUsado == 1){
                                        //         echo "El usuaro ya se encuentra registrado";
                                        //     } elseif ($mailUsado == 1 && $userUsado == 0) {
                                        //         echo "El mail ya se encuentra registrado";
                                        //     } elseif ($camposincompletos == 1) {
                                        //         echo "Debe completar todos los campos";
                                        //     }
                                        // } else {
                                        //     $mailUsado = "";
                                        //     $userUsado = "";
                                        //     $camposincompletos = "";
                                        // }
                                    ?>
                                </div> -->
                                <!-- <div id="resultado">
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- LINK JQUERT -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

        <!-- LINK JQUERY DE BOOTSTRAP SIN SLIM -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  
        <!-- https://sweetalert2.github.io/ -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script> -->

<!--         
    </body>
</html> -->