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
    <link rel="stylesheet" type="text/css" href="miCuenta.css">
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

    <div class="container-fluid" style="width: 95%; margin: 1rem auto">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-3">
            <h2>Mi Cuenta</h2>
                <ul class="list-group">
                    <li class="list-group-item"  style="background: gold">
                        <a class="nav-link" style="color: black" href="miCuenta.php">Mi Cuenta</a>
                    </li>
                    <li class="list-group-item"  style="background: gold">
                        <a class="nav-link" style="color: black" href="miCuenta.php?editar=1">Editar información de la Cuenta</a>
                    </li>
                    <li class="list-group-item"  style="background: gold">
                        <a class="nav-link" style="color: black" href="listaDeseos.php">Lista de Deseos</a>
                    </li>
                    <li class="list-group-item"  style="background: gold">
                        <a class="nav-link" style="color: black" href="carrito.php">Carrito</a>
                    </li>
                </ul>
            </div>
            <div class="col-7">
                <div class="row">
                    <h2>Información de la Cuenta</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Información del Usuario
                            </div>
                            <div class="card-body">
                                <?php 
                                    if(isset($_GET["editar"])){
                                ?>

                                <form method="POST" action="FuncOpers/editarMiCuenta.php">
                                    <div class="container-fluid">
                                        <input hidden id="idUsuario" name="idUsuario" class="card-text" type="text" value="<?php echo $_SESSION['id'] ?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title">Nombre</h5>
                                                <input required name="nombre" class="card-text form-control" type="text" value="<?php echo $_SESSION['nombre'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title">Apellido</h5>
                                                <input required name="apellido" class="card-text form-control" type="text" value="<?php echo $_SESSION['apellido'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title">Correo</h5>
                                                <input required name="mail" class="card-text form-control" type="text" value="<?php echo $_SESSION['mail'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title">Teléfono</h5>
                                                <p class="card-text">
                                                    <?php
                                                        if(isset($_SESSION["telefono"])){
                                                            echo "<input required name='telefono' class='card-text form-control' type='text' value='" . $_SESSION['telefono'] . "'>"; 
                                                        } else {
                                                            echo "<input class='card-text form-control' type='text' value='-'>";
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="card-title">Contraseña</h5>
                                                <p class="card-text">Para modificar su información es necesario que escriba su contraseña</p>
                                                <input id="passMiCuenta" name="password" class="card-text form-control" type="password" placeholder="Contraseña actual">
                                                <p id="mensajePassIncorrecto" style="color:red; font-size: 12px; margin:0, padding:0;"> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="card-text">Si desea cambiar su contraseña, complete los siguientes campos</p>
                                                <input id="passChangeMiCuenta" name="passwordChange" class="card-text form-control" type="password" style="margin-bottom: 7px" placeholder="Ingrese nueva contraseña">
                                                <input id="passRepMiCuenta" name="passwordRep" class="card-text form-control" type="password" placeholder="Repita su nueva Contraseña"> 
                                                <p id="mensajeSiNoCiunciden" style="color:red; font-size: 12px; margin:0, padding:0;"> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="miCuenta.php" class="btn btn-danger" style="float:right; margin-left: 5px">Cancelar</a>
                                                <button class="btn btn-success" style="float:right">Confirmar Edición</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                
                                <?php  
                                    } else {
                                  ?>
                                <h5 class="card-title">Nombre</h5>
                                <p class="card-text"><?php echo $_SESSION["nombre"] ?></p>
                                <h5 class="card-title">Apellido</h5>
                                <p class="card-text"><?php echo $_SESSION["apellido"] ?></p>
                                <h5 class="card-title">Correo</h5>
                                <p class="card-text"><?php echo $_SESSION["mail"] ?></p>
                                <h5 class="card-title">Teléfono</h5>
                                <p class="card-text">
                                <?php
                                    if(isset($_SESSION["telefono"])){
                                        echo $_SESSION["telefono"]; 
                                    } else {
                                        echo "-";
                                    }
                                 
                                ?></p>
                                
                            </div>
                            <div class="card-body">
                                <a href="miCuenta.php?editar=1" class="btn btn-primary" style="float:right">Editar Información</a>
                                <?php 
                                    } // CIERRA ELSE
                                ?>
                                    <?php
                                        if(isset($_GET["actualizado"])){
                                            $actualizado = $_GET["actualizado"];
                                            if($actualizado == 1){
                                                echo "<script>";
                                                echo "alert('La información se ha actualizado correctamente');";
                                                echo "</script>";
                                            } 
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
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

      <!-- MI LINK JS -->
    <script src="JS/funciones.js"></script>
</body>
</html>