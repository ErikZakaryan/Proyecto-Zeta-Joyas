<?php
    require_once("conexiones.php");
    if(isset($_POST["idMercaderia"]) && isset($_POST["idUsuario"]) && isset($_POST["indicadorFavoritos"]) && isset($_POST["desde"])){
        $idMercaderia = $_POST["idMercaderia"];
        $idUsuario = $_POST["idUsuario"];
        $borrarOAgregar = $_POST["indicadorFavoritos"];
        $desde = $_POST["desde"];
        
        
        if($borrarOAgregar == "agregar"){
            $verificacion= mysqli_query($conexiones,"select * from listadeseos where idMercaderia = $idMercaderia and idUsuario = $idUsuario") or die(mysqli_error($conexiones));
            if(mysqli_num_rows($verificacion) == 0){
                $queryMercaderia = "insert into listadeseos (idUsuario,idMercaderia) value ($idUsuario,$idMercaderia)";
                mysqli_query($conexiones, $queryMercaderia) or die(mysqli_error($conexiones));
                if ($desde == "tienda"){
                    header("Location:../tienda.php");
                } elseif($desde == "listaDeseos") {
                    header("Location:../listaDeseos.php?");
                }
                
            } else {
                // YA SE ENCUENTRA EN FAVORITOS
                header("Location:../tienda.php?yaExisteEnFavoritos=1");
            }
        } elseif($borrarOAgregar == "borrar"){
            mysqli_query($conexiones,"delete from listadeseos where idMercaderia = $idMercaderia and idUsuario = $idUsuario") or die(mysqli_error($conexiones));
            if ($desde == "tienda"){
                header("Location:../tienda.php");
            } elseif($desde == "listaDeseos") {
                header("Location:../listaDeseos.php?");
            }
        } else {
            echo "mierda";
        }
            
        
    } else {
    }
?>