<?php
    require_once("conexiones.php");
    if(isset($_POST["nombre"]) && isset($_POST["mail"]) && isset($_POST["numero"]) && isset($_POST["comentario"])){
        $nombre = $_POST["nombre"];
        $mail = $_POST["mail"];
        $numero = $_POST["numero"];
        $comentario = $_POST["comentario"];

        $queryComentarios = "insert into comentariosclientes (nombre,mail,numero,comentario) value ('$nombre','$mail','$numero','$comentario')";
        $query = mysqli_query($conexiones,$queryComentarios) or die($conexiones);
        
        $para = "ejemplo@gmail.com";
        $titulo = "Titulo";
        $mensaje = "
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8'>
                <title>Document</title>
            </head>
            <body>
                <p style='font-size: 20px;'>Hola, " . $nombre . " ha enviado un mensaje</p>
                <p>Su numero es: " . $numero . "</p>
                <p>Su mail es: " . $mail . "</p>
                <p>Y lo que comentó fue: " . $comentario . "</p>
            </body>
            </html>";
        $cabeceras = "From: ejemplo2@gmail.com" . "\r\n" .
            "Reply-To: ejemplo2@gmail.com" . "\r\n" .
            "X-Mailer: PHP/" . phpversion() . "\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($para, $titulo, $mensaje, $cabeceras);


        header("Location:../home.php");
    } else {
        // SE DEBEN COMPLETAR TODOS LOS CAMPOS
    }
?>