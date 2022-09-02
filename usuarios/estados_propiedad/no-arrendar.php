<?php
    include '../../db_connection/connection.php';
    $id = $_GET['id'];
    $sql = "UPDATE propiedad SET estado = '0' WHERE id_propiedad='$id'";
    $conn->query($sql);
    header("Location: ../mis_propiedades.php");
?>