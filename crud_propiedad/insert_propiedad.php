<?php


    include '../conexion_bd/conexion.php';
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
        // $checkbox = $_POST['checkbox'];
        // foreach($checkbox as $llave => $valor){
        //     $ficha2 = "insert into tiene_2 set id_propiedad = '$valor' and id_universidad = '$valor' ";
        //     $ejecutar_insertar_ficha2=mysqli_query($link, $ficha2);
        // }
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


        $sql_propiedad = "insert into propiedad values (null, '$sector', '$descripcion', '$precio', '$tipo', '$baño', '$habitacion', '$amoblado', '$superficie', '$estacionamiento', '$gastos_comunes', '$servicio_aseo')";
        $conn->query($sql_propiedad);
        echo "insertado correctamente";
        $result="<div class='alert-success'> Datos enviados, gracias.</div>";
        
        $id = '';
        $rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
        if ($row = mysqli_fetch_row($rs)){
            $id = trim($row[0]);
			// echo ("la id proveniente de la tabla imagen");
			// echo $id;
		}


        header('Location: ../formulario/indexform.php?id='.$id);
    }
?>