<?php
    include '../../db_connection/connection.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM propiedad WHERE id_propiedad='$id'";
    $conn->query($sql);
    header("Location: ../mis_propiedades.php");
?>