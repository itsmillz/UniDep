<?php


    include '../conexion_bd/conexion.php';
    if(isset($_POST['submit'])){

        // $rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
        // if ($row = mysqli_fetch_row($rs)){
        //     $id = trim($row[0]);
        //     echo $id;
        // }
        // $extension=array('jpeg','jpg','png','gif');
        // foreach ($_FILES['image']['tmp_name'] as $key => $value) {
        //     $filename=$_FILES['image']['name'][$key];
        //     $filename_tmp=$_FILES['image']['tmp_name'][$key];
        //     echo '<br>';
        //     $ext=pathinfo($filename, PATHINFO_EXTENSION);

        //     $finalimg='';
        //     if(in_array($ext,$extension))
        //     {   
        //         If(!file_exists('image/'.$filename))
        //         {
        //         move_uploaded_file($filename_tmp, 'image/'.$filename);
        //         $finalimg=$filename;
        //         }else
        //         {
        //             $filename=str_replace('.','-',basename($filename, $ext));
        //             $newfilename=$filename.time().".".$ext;
        //             move_uploaded_file($filename_tmp, 'image/'.$newfilename);
        //             $finalimg=$newfilename;
        //         }
        //         $creattime=date('Y-m-d h:i:s');
        //         //insert
        //         $insertqry="insert into 'imagenes'('id_imagen', 'imagen', 'id_propiedad') values (null, '$finalimg', '$creattime')";
        //         mysqli_query($conn,$insertqry);

        //         header('Location: prueba.php');
        //     }else
        //     {
        //             //display error
        //     }
        // }
        $sector = $_POST['sector'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $baño = $_POST['baño'];
        $habitacion = $_POST['habitacion'];
        $amoblada = $_POST['amoblada'];
        $superficie = $_POST['superficie'];
        $estacionamiento = $_POST['estacionamiento'];
        $servicio_aseo = $_POST['servicio_aseo'];
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
        $amoblada = htmlspecialchars(strip_tags($amoblada));
        $superficie = htmlspecialchars(strip_tags($superficie));
        $estacionamiento = htmlspecialchars(strip_tags($estacionamiento));
        $servicio_aseo = htmlspecialchars(strip_tags($servicio_aseo));
        $gastos_comunes = htmlspecialchars(strip_tags($gastos_comunes));
        $descripcion = htmlspecialchars(strip_tags($descripcion));


        $sql_propiedad = "insert into propiedad values (null, '$sector', '$precio', '$tipo', '$baño', '$habitacion', '$amoblada', '$superficie', '$estacionamiento', '$servicio_aseo', '$gastos_comunes', '$descripcion')";
        $conn->query($sql_propiedad);
        echo "insertado correctamente";
        $result="<div class='alert-success'> Datos enviados, gracias.</div>";
        // header("Location: prueba.php");
    }
?>