<?php
    require_once("conexiones.php");
    if(isset($_POST["idMercaderia"]) && isset($_POST["idUsuario"]) && isset($_POST["indicadorFavoritos"]) && isset($_POST["desde"])){
        $idMercaderia = $_POST["idMercaderia"];
        $idUsuario = $_POST["idUsuario"];
        $borrarOAgregar = $_POST["indicadorFavoritos"];
        $desde = $_POST["desde"];
        
        if($borrarOAgregar == "agregar"){
            $verificacion= mysqli_query($conexiones,"select * from carrito where idMercaderia = $idMercaderia and idUsuario = $idUsuario") or die(mysqli_error($conexiones));
            if(mysqli_num_rows($verificacion) == 0){
                $queryMercaderia = "insert into carrito (idUsuario,idMercaderia) value ($idUsuario,$idMercaderia)";
                mysqli_query($conexiones, $queryMercaderia) or die(mysqli_error($conexiones));
                if ($desde == "pagProducto"){
                    header("Location:../pagProducto.php");
                } elseif($desde == "listaDeseos") {
                    header("Location:../listaDeseos.php?");
                } elseif($desde == "carrito") {
                    header("Location:../carrito.php?");
                }
                
            } else {
                // YA SE ENCUENTRA EN FAVORITOS
            }
        } elseif($borrarOAgregar == "borrar"){
            mysqli_query($conexiones,"delete from carrito where idMercaderia = $idMercaderia and idUsuario = $idUsuario") or die(mysqli_error($conexiones));
            if ($desde == "pagProducto"){
                header("Location:../pagProducto.php");
            } elseif($desde == "listaDeseos") {
                header("Location:../listaDeseos.php?");
            } elseif($desde == "carrito") {
                header("Location:../carrito.php?");
            }
        } else {
            echo "mierda";
        }
            
        
    }
?>