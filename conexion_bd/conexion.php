<?php
    try{

        $host = "localhost";
        $dbname = "base_prueba";
        $username = "root";
        $password = "";
        date_default_timezone_set('America/Santiago');
        $conn = new mysqli($host,$username,$password,$dbname);
        $conn->set_charset("utf8");
        // echo ("conexion exitosa");
    }catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }

?>