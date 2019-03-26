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

  <div class="container" style="margin: 1rem auto; border: 3px solid gold; border-radius: 20px;">
    <?php
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            $idProducto = $_GET["id"];
            $datosProducto = mysqli_query($conexiones,"select * from mercaderia where id='$idProducto'") or die(mysqli_error($conexiones));
            $producto = mysqli_fetch_array($datosProducto);
        }
    ?>
        <div class="row" style="height: 40rem" >
            <div id="LogoLogin" class="col-6" style="height: 100%;  border-top-left-radius: 20px;  border-bottom-left-radius: 20px">
                <img class="img-responsive" src="imagenes/Fotos Tienda/<?php echo $producto["foto"]; ?>" style="heignt: 30rem; width: 30rem;">
            </div>
            <div class="col-6">
                <h1 class="tituloLogin" style="font-size: 2rem; margin: 1rem;"> <?php echo $producto["producto"] ?> </h1>
                <h2 class="tituloLogin" style="font-size: 2rem; margin: 1rem;"> $ <?php echo $producto["precio"] ?> </h2>
                <?php
                    if(isset($_GET["desdeFav"]) == 1){
                        echo "<a href='./listaDeseos.php' class='btn btn-dark' style='margin-top:10px'>Volver</a>";
                    } else {
                        echo "<a href='./tienda.php' class='btn btn-dark' style='margin-top:10px'>Volver</a>";
                    }
                ?>
                <form method="POST" action="FuncOpers/funcionCarrito.php">
                    <input hidden type="text" name="idMercaderia" value="<?php echo $idProducto; ?>">
                    <input hidden type="text" name="idUsuario" value="<?php echo $idUsuarioLogueado; ?>">
                    <?php
                        $queryCarrito = "select * from carrito where idUsuario = $idUsuarioLogueado and idMercaderia = $idProducto";
                        $consultaCarrito = mysqli_query($conexiones,$queryCarrito) or die(mysqli_error($conexiones));
                        $siEnCarrito = mysqli_num_rows($consultaCarrito);
                        if($siEnCarrito == 0){
                            echo "<input hidden type='text' name='indicadorFavoritos' value='agregar'>";
                            echo "<button class='btn btn-primary'>Añadir al Carrito</button>";
                        } else {
                            echo "<input hidden type='text' name='indicadorFavoritos' value='borrar'>";
                            echo "<button class='btn btn-primary'>Quitar del Carrito</button>";
                        }
                    ?>
                </form>
                    
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- MI LINK JS -->
    <script src="JS/funciones.js"></script>

</body>
</html>