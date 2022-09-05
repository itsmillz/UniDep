<?php
    include '../db_connection/connection.php';
    session_start();
    $rut = $_POST['rut'];
    // Verificamos que contiene algún dato
    if (isset($_POST['rut'])) {
        $sql= "SELECT COUNT(*) AS `verificar` FROM propietario WHERE prop_rut = '$rut'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        if ($data['verificar'] > 0) {
            $_SESSION['usuario'] = $rut;
            header("Location: ../index.php");
        }else{
            $sql_rut = "INSERT INTO propietario VALUES ('$rut')";
            $ver = $conn->query($sql_rut);
            if ($ver) {
                $_SESSION['usuario'] = $rut;
                header("Location: ../index.php");
            }else{
                echo "No se inserto";
            }
        }
    }
?>
