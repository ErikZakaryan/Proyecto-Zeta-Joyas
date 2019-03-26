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
    <link rel="stylesheet" type="text/css" href="tienda.css">
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

    <!-- FILTRO -->
    <div class="container-fluid" style="width: 95%">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-2"> <!-- FILTRO -->
            <div class="row"> <!-- FILTROS PUESTOS -->
            <?php 
                // $idUsuarioLogueado = $_GET["idUsuarioLogueado"];    
                if(isset($_GET["tipo"]) || isset($_GET["metal"]) || isset($_GET["precio"])) {
                    echo "<a class='nav-link' href='tienda.php'>Quitar filtro</a>";
                } else {
                    echo "<br>";
                }
            ?>
            </div>
            <div class="row">
            <?php
                if(isset($_GET["tipo"])){
                    $_SESSION["filtroTipo"] = $_GET["tipo"];
                } else {
                    $_SESSION["filtroTipo"] = NULL;
                }
                if(isset($_GET["metal"])){
                    $_SESSION["filtroMetal"] = $_GET["metal"];
                } else {
                    $_SESSION["filtroMetal"] = NULL;
                }
                if(isset($_GET["precio"])){
                    $_SESSION["filtroPrecio"] = $_GET["precio"];
                } else {
                    $_SESSION["filtroPrecio"] = NULL;
                }
            ?>
                <dl>
                    <dt>Articulo</dt>
                    <input hidden id="filtroTipo" name="filtroTipo" type="text" value="<?php echo $_SESSION["filtroTipo"]; ?>">
                    <dd><button class="nav-link botonFiltro botonFiltroTipo" id="anillo">Anillos</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroTipo" id="pulsera">Pulseras</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroTipo" id="dije">Dijes</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroTipo" id="cadena">Cadenas</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroTipo" id="aro">Aros</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroTipo" id="reloj">Relojes</button></dd>
                </dl>
            </div>
            <div class="row">
                <dl>
                    <dt>Metal</dt>
                    <input hidden id="filtroMetal" name="filtroTipo" type="text" value="<?php echo $_SESSION["filtroMetal"]; ?>">
                    <dd><button class="nav-link botonFiltro botonFiltroMetal" id="oro">Oro</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroMetal" id="plata">Plata</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroMetal" id="acero">Acero</button></dd>
                </dl>
            </div>
            <div class="row">
                <dl>
                    <dt>Precio</dt>
                    <input hidden id="filtroPrecio" name="filtroTipo" type="text" value="<?php echo $_SESSION["filtroPrecio"]; ?>">
                    <dd><button class="nav-link botonFiltro botonFiltroPrecio" id="precio1">Menos de $200</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroPrecio" id="precio2">Entre $200 y $499</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroPrecio" id="precio3">Entre $500 y $1499</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroPrecio" id="precio4">Entre $1500 y $3000</button></dd>
                    <dd><button class="nav-link botonFiltro botonFiltroPrecio" id="precio5">Más de $3000</button></dd>
                </dl>
            </div>

        </div>
        <div class="col-9">
            <?php

            if(isset($_GET["precio"])){
                $precioFiltro = $_GET["precio"];
                if($precioFiltro == "precio1"){
                    $precioDe = 0;
                    $precioA= 200;
                } else {
                    if($precioFiltro == "precio2"){
                        $precioDe = 200;
                        $precioA= 499;
                    } else {
                        if($precioFiltro == "precio3"){
                            $precioDe = 500;
                            $precioA= 1499;
                        } else {
                            if($precioFiltro == "precio4"){
                                $precioDe = 1500;
                                $precioA= 3000;
                            } else {
                                if($precioFiltro == "precio5"){
                                    $precioDe = 3000;
                                    $precioA= 999999999;
                                } else {
                                    
                                }
                            }
                        }
                    }
                }
            } else {
                $precioFiltro = "";
                $precioA = "";
                $precioDe = "";
            }

                
                
                    
                

                if (isset($_GET["tipo"]) && isset($_GET["metal"]) && isset($_GET["precio"])){
                    $precioFiltro = $_GET["precio"];
                    $metalFiltro = $_GET["metal"];
                    $tipoFiltro = $_GET["tipo"];
                    $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro' and metal='$metalFiltro' and precio>='$precioDe' and precio<='$precioA'";
                    $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                    $filtra = true;
                } else {
                    if (isset($_GET["metal"]) && isset($_GET["precio"])){
                        $metalFiltro = $_GET["metal"];
                        $precioFiltro = $_GET["precio"];
                        $queryMercaderia = "select * from mercaderia where metal='$metalFiltro' and precio>='$precioDe' and precio<='$precioA'";
                        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                        $filtra = true;
                    } else {
                        if (isset($_GET["tipo"]) && isset($_GET["precio"])){
                            $precioFiltro = $_GET["precio"];
                            $tipoFiltro = $_GET["tipo"];
                            $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro' and precio>='$precioDe' and precio<='$precioA'";
                            $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                            $filtra = true;
                        } else {
                            if (isset($_GET["tipo"]) && isset($_GET["metal"])){
                                $metalFiltro = $_GET["metal"];
                                $tipoFiltro = $_GET["tipo"];
                                $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro' and metal='$metalFiltro'";
                                $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                                $filtra = true;
                            } else {
                                if (isset($_GET["precio"])){
                                    $precioFiltro = $_GET["precio"];
                                    $queryMercaderia = "select * from mercaderia where precio>='$precioDe' and precio<='$precioA'";
                                    $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                                    $filtra = true;
                                } else {
                                    if (isset($_GET["metal"])){
                                        $metalFiltro = $_GET["metal"];
                                        $queryMercaderia = "select * from mercaderia where metal='$metalFiltro'";
                                        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                                        $filtra = true;
                                    } else {
                                        if(isset($_GET["tipo"])){
                                            $tipoFiltro = $_GET["tipo"];
                                            $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro'";
                                            $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                                            $filtra = true;
                                        } else {
                                            $filtra = false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }




                if($filtra) {
                    while($info = mysqli_fetch_array($consulta)){

 
            ?>

                <div class="card-columns" style="display:inline">
                
                    <div class="card" style="width: 16rem; margin:1rem; height:25rem">
                        <div class="card-img-top" style="background-image: url('imagenes/Fotos Tienda/<?php echo $info["foto"]; ?>');background-repeat: no-repeat; background-size:100% 100% ;height:70%">
                            <form method="POST" action="FuncOpers/favoritos.php">
                                <input hidden type="text" name="idMercaderia" value="<?php echo $info["id"] ?>">
                                <input hidden type="text" name="idUsuario" value="<?php echo $_SESSION["id"] ?>">
                                <input hidden type="text" name="indicadorFavoritos" id="indicadorFavoritos" value="">
                                <input hidden type="text" name="desde" value="tienda">

                                <?php
                                    if(isset($_SESSION["id"])){
                                        $idUsuarioEnFavorito = $_SESSION["id"];
                                        $idMercaderiaEnFavoritos = $info["id"];
                                        $queryFavoritos = "select * from listadeseos where idMercaderia = $idMercaderiaEnFavoritos and idUsuario = $idUsuarioEnFavorito";
                                        $consultaFavoritos = mysqli_query($conexiones,$queryFavoritos) or die(mysqli_error($conexiones));
                                        if(mysqli_num_rows($consultaFavoritos) == 0){
                                ?>
                                <input hidden type="text" name="indicadorFavoritos" id="indicadorFavoritos" value="agregar">
                                <button class="far fa-heart coraModoNoFavorito" type="submit"></button>
                                <?php
                                        } else {
                                ?>
                                <input hidden type="text" name="indicadorFavoritos" id="indicadorFavoritos" value="borrar">
                                <button class="fas fa-heart coraModoNoFavorito" type="submit"></button>
                                <?php
                                        }
                                    } else {
                                ?>   
                                <a href="Login-Register.php" class="far fa-heart coraModoNoFavorito"></a>
                                <?php 
                                    }
                                
                                ?>
                            
                            </form>
                        
                        </div>
                        <div class="card-body" >
                            <h5 class="card-title">
                                <a href="pagProducto.php?id=<?php echo $info["id"]; ?>">
                                    <?php 
                                        echo $info["producto"];
                                    ?> 
                                </a>
                            </h5>
                            <p class="card-text">$<?php echo $info["precio"]; ?></p>
                        </div>
                    </div>
        
            </div>
 

            <?php
                } // ACA CIERRA EL WHILE
            } else {
                $queryMercaderia = "select * from mercaderia";
                $consultaMercaderia = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
                 while($info = mysqli_fetch_array($consultaMercaderia)){ 
        ?> 





                <div class="card-columns" style="display:inline">
                
                    <div class="card" style="width: 16rem; margin:1rem; height:25rem">
                        <div class="card-img-top" style="background-image: url('imagenes/Fotos Tienda/<?php echo $info["foto"]; ?>');background-repeat: no-repeat; background-size:100% 100% ;height:70%">
                            <form method="POST" action="FuncOpers/favoritos.php">
                                <input hidden type="text" name="idMercaderia" value="<?php echo $info["id"] ?>">
                                <input hidden type="text" name="idUsuario" value="<?php echo $_SESSION["id"] ?>">
                                <input hidden type="text" name="indicadorFavoritos" id="indicadorFavoritos" value="">
                                <input hidden type="text" name="desde" value="tienda">
                                <?php
                                    if(isset($_SESSION["id"])){
                                        $idUsuarioEnFavorito = $_SESSION["id"];
                                        $idMercaderiaEnFavoritos = $info["id"];
                                        $queryFavoritos = "select * from listadeseos where idMercaderia = $idMercaderiaEnFavoritos and idUsuario = $idUsuarioEnFavorito";
                                        $consultaFavoritos = mysqli_query($conexiones,$queryFavoritos) or die(mysqli_error($conexiones));
                                        if(mysqli_num_rows($consultaFavoritos) == 0){
                                ?>
                                <input hidden type="text" name="indicadorFavoritos" id="indicadorFavoritos" value="agregar">
                                <button class="far fa-heart coraModoNoFavorito" type="submit">
                                
                                </button>
                                <?php
                                        } else {
                                ?>
                                <input hidden type="text" name="indicadorFavoritos" id="indicadorFavoritos" value="borrar">
                                <button class="fas fa-heart coraModoNoFavorito" type="submit">
                                
                                </button>
                                <?php
                                        }
                                    } else {
                                ?>   
                                <a href="Login-Register.php" class="far fa-heart coraModoNoFavorito"></a>
                                <?php 
                                    }
                                
                                ?>
                            
                            </form>
                        
                        </div>
                        <div class="card-body" >
                            <h5 class="card-title">
                                <a href="pagProducto.php?id=<?php echo $info["id"]; ?>">
                                    <?php 
                                        echo $info["producto"];
                                    ?> 
                                </a>
                            </h5>
                            <p class="card-text">$<?php echo $info["precio"]; ?></p>
                        </div>
                    </div>
        
            </div>
            <?php
                    } // ACA CIERRA EL WHILE
                } // ACA CIERRA EL ELSE
            ?> 
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