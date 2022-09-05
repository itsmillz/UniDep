<?php

include("../../db_connection/connection.php");
$id = "";
if($_GET["id"]){
    $id = $_GET["id"];
    $id_propiedad = $_GET["id_propiedad"];
}
$sql = "delete from multiple_images where image_id = $id";
$conn->query($sql);
header("Location: ../insert_fotos.php?id=$id_propiedad");
?>