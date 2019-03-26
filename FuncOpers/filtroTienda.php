<?php
    require_once("conexiones.php");
    
    
    if(isset($_GET["filtroPrecio"])){
        $precioFiltro = $_POST["filtroPrecio"];

        switch ($precioFiltro){
            case "precio1":
                $precioDe = 0;
                $precioA= 200;
                break;
            case "precio2":
                $precioDe = 200;
                $precioA= 499;
                break;
            case "precio3":
                $precioDe = 500;
                $precioA= 1499;
                break;
            case "precio4":
                $precioDe = 1500;
                $precioA= 3000;
                break;
            case "precio5":
                $precioDe = 3000;
                $precioA= 99999999;
                break;
        }
    }
    switch(true)
    {
    case (isset($_GET["tipo"])):
        $tipoFiltro = $_POST["filtroTipo"];
        $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "soloTipo";
        break;
    case (isset($_GET["metal"])):
        $metalFiltro = $_POST["filtroMetal"];
        $queryMercaderia = "select * from mercaderia where metal='$metalFiltro'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "soloMetal";
        break;
    case (isset($_GET["precio"])):
        $precioFiltro = $_POST["filtroPrecio"];
        $queryMercaderia = "select * from mercaderia where precio>='$precioDe' and precio<='$precioA'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "soloPrecio";
        break;
    case (isset($_GET["tipo"]) && isset($_GET["metal"])):
        $metalFiltro = $_POST["filtroMetal"];
        $tipoFiltro = $_POST["filtroTipo"];
        $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro' and metal='$metalFiltro'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "tipoYMetal";
        break;
    case (isset($_GET["tipo"]) && isset($_GET["precio"])):
        $precioFiltro = $_POST["filtroPrecio"];
        $tipoFiltro = $_POST["filtroTipo"];
        $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro' and precio>='$precioDe' and precio<='$precioA'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "tipoYPrecio";
        break;
    case (isset($_GET["metal"]) && isset($_GET["precio"])):
        $metalFiltro = $_POST["filtroMetal"];
        $precioFiltro = $_POST["filtroPrecio"];
        $queryMercaderia = "select * from mercaderia where metal='$metalFiltro' and precio>='$precioDe' and precio<='$precioA'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "metalYPrecio";
        break;
    case (isset($_GET["tipo"]) && isset($_GET["metal"]) && isset($_GET["precio"])):
        $precioFiltro = $_POST["filtroPrecio"];
        $metalFiltro = $_POST["filtroMetal"];
        $tipoFiltro = $_POST["filtroTipo"];
        $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro' and metal='$metalFiltro' and precio>='$precioDe' and precio<='$precioA'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "los3";
        break;
    default:
        // echo"puta";
        break;
        
    }

    if(isset($_POST["filtroTipo"]) && isset($_POST["filtroMetal"]) && isset($_POST["filtroPrecio"])){
        $tipoFiltro = $_POST["filtroTipo"];
        $metalFiltro = $_POST["filtroMetal"];
        $precioFiltro = $_POST["filtroPrecio"];
    }

    if(isset($_POST["filtroTipo"])){
        $tipoFiltro = $_POST["filtroTipo"];
        $queryMercaderia = "select * from mercaderia where tipo='$tipoFiltro'";
        $consulta = mysqli_query($conexiones,$queryMercaderia) or die(mysqli_error($conexiones));
        $info = mysqli_fetch_array($consulta);
        echo "ok";
    }
?>