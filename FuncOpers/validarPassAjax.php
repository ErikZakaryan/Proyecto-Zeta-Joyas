<?php
    require_once("conexiones.php");

    if(isset($_POST["validarPassMiCuenta"]) && isset($_POST["usuarioModif"])){
        $idUsuario = $_POST["usuarioModif"];
        $password = $_POST["validarPassMiCuenta"];
        $consultaPass = "select password from usuarios where id = $idUsuario and password='$password'";
        $queryPass= mysqli_query($conexiones,$consultaPass) or die(mysqli_error($conexiones));

        if(mysqli_num_rows($queryPass) > 0) {
            echo "si";
        } else {
            echo "no";
        }
    }

?>