<?php
    include '../db_connection/connection.php';
    if(isset($_POST['submit'])){
        $sector = $_POST['sector'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $baño = $_POST['baño'];
        $habitacion = $_POST['habitacion'];
        $amoblado = $_POST['amoblado'];
        $superficie = $_POST['superficie'];
        $estacionamiento = $_POST['estacionamiento'];
        $servicio_aseo= $_POST['servicio_aseo'];
        $gastos_comunes = $_POST['gastos_comunes'];
        $descripcion = $_POST['descripcion'];
        //Limpiamos las variables
        $sector = trim($sector);
        $precio = trim($precio);
        $tipo = trim($tipo);
        //Evitar o eliminar HTML injection
        $sector = htmlspecialchars(strip_tags($sector));
        $precio = htmlspecialchars(strip_tags($precio));
        $tipo = htmlspecialchars(strip_tags($tipo));
        $baño = htmlspecialchars(strip_tags($baño));
        $habitacion = htmlspecialchars(strip_tags($habitacion));
        $amoblado= htmlspecialchars(strip_tags($amoblado));
        $superficie = htmlspecialchars(strip_tags($superficie));
        $estacionamiento = htmlspecialchars(strip_tags($estacionamiento));
        $servicio_aseo = htmlspecialchars(strip_tags($servicio_aseo));
        $gastos_comunes = htmlspecialchars(strip_tags($gastos_comunes));
        $descripcion = htmlspecialchars(strip_tags($descripcion));
        $sql_propiedad = "insert into propiedad values (null, '$sector', '$precio', '$tipo', '$baño', '$habitacion', '$amoblado', '$superficie', '$estacionamiento', '$servicio_aseo', '$gastos_comunes', '$descripcion')";
        $conn->query($sql_propiedad);
        $id = '';
        $rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
        if ($row = mysqli_fetch_row($rs)){
            $id = trim($row[0]);
		}
        header('Location: insert_fotos.php?id='.$id);
    }
?>