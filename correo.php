<?php 
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    $nombre=$_POST["nombre"];
    $asunto=$_POST["asunto"];
    $correo=$_POST["correo"];
    $mensaje=$_POST["mensaje"];

    if (empty($correo)) {
        $error=1;
        $mensaje="Correo electrónico vacio.";
        $datos=0;
    }else {
        $usuario_mail="clickjaenoficial@gmail.com";
        $remite="Fomulario de mi";
        $remite_email="edmelectronica21@gmail.com";
        $asunto="Se envio un correo desde $remite";

     
            // Armar un mensaje html para el cuerpo del correo electrónico
            $mensaje = "<!doctype html>
            <html class=''><head><meta charset='utf-8'>
            <title>Han enviado los siguientes comentarios!</title>
            </head>
            <body>
            <h1>Contacto desde el sitio www.puvel.com.mx (Punto de Venta en Línea)</h1>
            Nombre: ".$nombre." <br clear='all'/>
            Asunto: ".$asunto." <br clear='all'/>
            Correo: ".$correo." <br clear='all'/>
            Mensaje: <br clear='all'/> ".$mensaje." <br clear='all'/>
            </body></html>";

            $cabeceras = "From: ".$remite." <".$remite_email.">\r\n";
            $cabeceras = $cabeceras."Mime-Version: 1.0\n";
            $cabeceras = $cabeceras.'Content-type: text/html; charset=utf-8' . "\r\n";

             // Realizar el envío con la función mail de php
             $enviar_email = mail($usuario_mail, $asunto, $mensaje, $cabeceras);

            
             if($enviar_email) { // Envío exitoso
                $error=0;
                $mensaje="Correo enviado";
                $datos=0;
              }else { // No se pudo enviar el correo
                $error=1;
                $mensaje="El correo no fue enviado";
                $datos=0;
              }
    }

     // Empaquetado de la respuesta en formato JSON
     $resp=[
        "error"=>$error,
        "mensaje"=>$mensaje,
        "datos"=>$datos,
      ];

    echo json_encode($resp);
}else {
    $resp=[
        "error"=>1,
        "mensaje"=>"El servidor denego la petición.",
        "error"=>0,
    ];
    echo json_encode($resp);
}



/*
    $destinatario="clickjaenoficial@gmail.com";//al correo a quien se envia el mensaje
    $nombre=$_POST["nombre"];
    $asunto=$_POST["asunto"];
    $email=$_POST["correo"];
    $mensaje=$_POST["mensaje"];

    $header= "Enviado desde la pagina Web RADOSYS";
    $mensajecompleto = $mensaje."\nAtentamente: " .$nombre;


    //enviar correo
    mail($destinatario,$asunto,$mensajecompleto,$header);
    echo"<script>alert('Correo enviado correctamente.')</script>";
    echo"<script> setTimeout(\"location.href='index.html'\",1000)</script>";*/
?>