<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
	if (!$usuario) {
		header("Location: ../index.php");
	}
?>
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
        $baño = trim($baño);
        $habitacion = trim($habitacion);
        $amoblado = trim($amoblado);
        $superficie = trim($superficie);
        $estacionamiento = trim($estacionamiento);
        $servicio_aseo= trim($servicio_aseo);
        $gastos_comunes = trim($gastos_comunes);
        $descripcion = trim($descripcion);
        //HTML
        mysqli_real_escape_string($conn, $_POST["sector"]);
        mysqli_real_escape_string($conn, $_POST["precio"]);
        mysqli_real_escape_string($conn, $_POST["tipo"]);
        mysqli_real_escape_string($conn, $_POST["baño"]);
        mysqli_real_escape_string($conn, $_POST["habitacion"]);
        mysqli_real_escape_string($conn, $_POST["amoblado"]);
        mysqli_real_escape_string($conn, $_POST["superficie"]);
        mysqli_real_escape_string($conn, $_POST["estacionamiento"]);
        mysqli_real_escape_string($conn, $_POST["servicio_aseo"]);
        mysqli_real_escape_string($conn, $_POST["gastos_comunes"]);
        mysqli_real_escape_string($conn, $_POST["descripcion"]);
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
        $sql_propiedad = "insert into propiedad values (null, '$sector', '$precio', '$tipo', '$baño', '$habitacion', '$amoblado', '$superficie', '$estacionamiento', '$servicio_aseo', '$gastos_comunes', '$descripcion', '$usuario', '0')";
        $conn->query($sql_propiedad);
        $id = '';
        $rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
        if ($row = mysqli_fetch_row($rs)){
            $id = trim($row[0]);
		}
        header('Location: insert_fotos.php?id='.$id);
    }
?>