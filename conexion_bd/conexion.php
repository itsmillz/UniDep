<?php
<<<<<<< HEAD
$conn=mysqli_connect('localhost','root','','imageupload');

if(mysqli_connect_errno())
{
echo 'Failed to connect '.mysqli_connect_error();
}
=======
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

>>>>>>> dde56ccff893380b7806d6f6071d51942ab31f93
?>