<?php
    include("../conexion_bd/conexion.php");

    // Verificamos si se ha escrito algo en el input de buscar.
    if ($_POST['buscar'] != "") {
        // Realizamos la consulta SQL para la busqueda.
        $buscador = "SELECT DISTINCT * FROM propiedad INNER JOIN tiene_2 ON tiene_2.id_propiedad=propiedad.id_propiedad INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE nombre_universidad LIKE LOWER('%".$_POST["buscar"]."%')";
        $resultado_busqueda = $conn->query($buscador);
        // Variables necesarias
        $A = [];
        $i = 0;
        // Guardamos las id de los resultados que coincidan con la busqueda
        while($resultado = $resultado_busqueda->fetch_assoc()){
            // Guardamos las id_propiedad en un arreglo aparte.
            $A[$i] = $resultado['id_propiedad'];
            $i = $i + 1;
        }
        // Eliminamos los valores repetidos dentro de ese arreglo.
        $resultado_A = array_unique($A);
        // Recorremos el arreglo que contiene los valores unicos sin repetir.
        foreach ($resultado_A as &$valor) {
            // En esta consulta, obtenemos los resultados segun la id que se alamacena en el array sin valores repetidos ($resultado_A).
            $resultado_final = "SELECT DISTINCT * FROM propiedad WHERE id_propiedad = ".$valor."";
            $resultado_busquedaa = $conn->query($resultado_final);
            // Recorremos y mostramos los resultados obtenidos según la consulta, y sin repetir.
            while ($RESU_FINA = $resultado_busquedaa->fetch_assoc()) {
            ?>
                <div class="contenedor-arriendo">
                    <div class="imagen-arriendo">
                        <img src="imagenes/depto.png" alt="">
                    </div>
                    <div class="contenido-arriendo">
                        <div class="contenido-principal">
                            <div class="universidad-calificacion">
                                <?php
                                    // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                    $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$RESU_FINA['id_propiedad']."";
                                    $res = $conn->query($sql_universidad);
                                    echo "<div class='listado_universidad'>";
                                    while($uni = $res->fetch_assoc()){
                                        echo "<p> ".$uni['nombre_universidad']." </p>";
                                    }
                                    echo "</div>";
                                ?>
                                <div class="calificacion">
                                    <img src="imagenes/estrella.png" alt="">
                                    <p><strong>4.6</strong></p>
                                </div>
                            </div>
                            <h2><?php echo $RESU_FINA['sector_propiedad'] ?></h2>
                            <p class="descripcion-arriendo"><?php echo $RESU_FINA['descripcion'] ?></p>
                        </div>
                        <hr>
                        <div class="contenido-secundario">
                            <p class="precio-arriendo">$<?php echo $RESU_FINA['precio_arriendo'] ?> CLP</p>
                            <div class="caracteristicas-arriendo">
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/wifi.png" alt="">
                                    <p><?php echo $RESU_FINA['cantidad_habitaciones'] ?> dorm</p>
                                </div>
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/wifi.png" alt="">
                                    <p><?php echo $RESU_FINA['cantidad_banos'] ?> baños</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }

    }else{
        $listar_todo = "SELECT * FROM propiedad";
        $todos_resultados = $conn->query($listar_todo);
        while ($todo = $todos_resultados->fetch_assoc()) {
            ?>
            <div class="contenedor-arriendo">
                <div class="imagen-arriendo">
                            <img src="imagenes/depto.png" alt="">
                </div>
                <div class="contenido-arriendo">
                            <div class="contenido-principal">
                                <div class="universidad-calificacion">
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$todo['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        echo "<div class='listado_universidad'>";
                                        while($uni = $res->fetch_assoc()){
                                            echo "<p> ".$uni['nombre_universidad']." </p>";
                                        }
                                        echo "</div>";
                                    ?>
                                    <div class="calificacion">
                                        <img src="imagenes/estrella.png" alt="">
                                        <p><strong>4.6</strong></p>
                                    </div>
                                </div>
                                <h2><?php echo $todo['sector_propiedad'] ?></h2>
                                <p class="descripcion-arriendo"><?php echo $todo['descripcion'] ?></p>
                            </div>
                            <hr>
                            <div class="contenido-secundario">
                                <p class="precio-arriendo">$<?php echo $todo['precio_arriendo'] ?> CLP</p>
                                <div class="caracteristicas-arriendo">
                                    <div class="caracteristica-arriendo">
                                        <img src="imagenes/wifi.png" alt="">
                                        <p><?php echo $todo['cantidad_habitaciones'] ?> dorm</p>
                                    </div>
                                    <div class="caracteristica-arriendo">
                                        <img src="imagenes/wifi.png" alt="">
                                        <p><?php echo $todo['cantidad_banos'] ?> baños</p>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <?php
        }
    }
?>


