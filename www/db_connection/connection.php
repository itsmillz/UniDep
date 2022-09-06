<?php

    // Conexión base de datos de la Universidad.
    // * Se requiere estar conectado al OpenVPN.
    // $conn=mysqli_connect('mysqltrans.face.ubiobio.cl','G51taller','G51taller1058','G51taller_bd');
    // date_default_timezone_set('America/Santiago');
    // if(mysqli_connect_errno()){
    //    echo 'Error de conexión:'.mysqli_connect_error();
    //}

    // Utilizar conexión local:
     $conn=mysqli_connect('db','root','test','unidep');
     if(mysqli_connect_errno()){
         echo 'Error de conexión:'.mysqli_connect_error();
     }

    // Utilizar otra conexión:
    // $conn=mysqli_connect('host','username','password','dbname');
    // if(mysqli_connect_errno()){
    //     echo 'Error de conexión:'.mysqli_connect_error();
    // }
?>
