<?php
    if ($_POST['desde'] != '' && $_POST['hasta'] != '' && $_POST['banos'] != '' && $_POST['habitaciones'] != '' && $_POST['amoblado'] != '' && $_POST['tipo'] != '' && $_POST['gastoscomunesdesde'] != '' && $_POST['gastoscomuneshasta'] != '') {
        $all = "SELECT DISTINCT * FROM propiedad";
        $all_list = $conn->query($all);
        while ($all_listt = $all_list->fetch_assoc()) {
        ?>
            <h2>TODOOOS</h2>
            <div class="contenedor-arriendo">
                <div class="imagen-arriendo">
                    <img src="imagenes/depto.png" alt="">
                </div>
                <div class="contenido-arriendo">
                    <div class="contenido-principal">
                        <div class="universidad-calificacion">
                            <?php
                                // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
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
                        <h2><?php echo $all_listt['sector_propiedad'] ?></h2>
                        <p class="descripcion-arriendo"><?php echo $all_listt['descripcion'] ?></p>
                    </div>
                    <hr>
                    <div class="contenido-secundario">
                        <p class="precio-arriendo">$<?php echo $all_listt['precio_arriendo'] ?> CLP</p>
                        <div class="caracteristicas-arriendo">
                            <div class="caracteristica-arriendo">
                                <img src="imagenes/wifi.png" alt="">
                                <p><?php echo $all_listt['cantidad_habitaciones'] ?> dorm</p>
                            </div>
                            <div class="caracteristica-arriendo">
                                <img src="imagenes/wifi.png" alt="">
                                <p><?php echo $all_listt['cantidad_banos'] ?> baños</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    if ($_POST['buscar'] == "" && $BAN == 1) {
        $all = "SELECT DISTINCT * FROM propiedad";
        $all_list = $conn->query($all);
        while ($all_listt = $all_list->fetch_assoc()) {
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
                                $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
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
                        <h2><?php echo $all_listt['sector_propiedad'] ?></h2>
                        <p class="descripcion-arriendo"><?php echo $all_listt['descripcion'] ?></p>
                    </div>
                    <hr>
                    <div class="contenido-secundario">
                        <p class="precio-arriendo">$<?php echo $all_listt['precio_arriendo'] ?> CLP</p>
                        <div class="caracteristicas-arriendo">
                            <div class="caracteristica-arriendo">
                                <img src="imagenes/wifi.png" alt="">
                                <p><?php echo $all_listt['cantidad_habitaciones'] ?> dorm</p>
                            </div>
                            <div class="caracteristica-arriendo">
                                <img src="imagenes/wifi.png" alt="">
                                <p><?php echo $all_listt['cantidad_banos'] ?> baños</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
?>