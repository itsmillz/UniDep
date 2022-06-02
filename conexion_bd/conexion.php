<?php
try{

$host = "mysqltrans.face.ubiobio.cl";
$dbname = "G51taller_bd";
$username = "G51taller";
$password = "G51taller1058";
date_default_timezone_set('America/Santiago');
$conn = new mysqli($host,$username,$password,$dbname);
$conn->set_charset("utf8");
echo ("conexion exitosa");
}catch(Exception $e){
echo "Error: ".$e->getMessage();
}

?>