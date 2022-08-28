<?php
    include_once '../db_connection/connection.php';
    if(!empty($_POST)){
        $direc = $_POST['direccion'];
        $direc = trim($direc); //limpiar variable inicio y final del string
        $direc = htmlspecialchars($direc); //quita el efecto al ingresar un injection html
        $direc = strip_tags($direc); //elimina la etiqueta HTML
        $query = "select * from propiedad where sector = '$direc' ";
        $resultado = mysqli_query($conn, $query);
        mysqli_close($conn);
        $filas = mysqli_num_rows($resultado);
        if($filas > 0){
            $data = mysqli_fetch_assoc($resultado);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo "error";
    }
    exit;
?>