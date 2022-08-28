<?php
    if ((isset($_POST['desde']) != '' && isset($_POST['hasta']) != '' && isset($_POST['banos']) != '' && isset($_POST['habitaciones']) != '' && isset($_POST['amoblada']) != '' && $_POST['tipo'] != '' && isset($_POST['gastoscomunesdesde']) != '' && isset($_POST['gastoscomuneshasta']) != '') || isset($_POST['buscar']) != ''){
        $all = "SELECT DISTINCT * FROM propiedad ORDER BY id_propiedad DESC";
        $all_list = $conn->query($all);
        while ($all_listt = $all_list->fetch_assoc()) {
        ?>
            <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo">
                <div class="imagen-arriendo">
                        <img src="imagenes/depto.png" alt="">
                </div>
                <div class="contenido-arriendo">
                        <!-- Información principal: universidades, dirección, descripción -->
                        <div class="contenido-principal">
                            <div class="universidades">
                                <ul>
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        while($uni = $res->fetch_assoc()){
                                            echo "<li class='listado_universidad'>";
                                                echo "<img class='svg-caracteristicas' src='imagenes/caracteristicas/school-outline.svg'></img>";
                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                            echo "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <h2 class="direccion-titulo"><?php echo $all_listt['sector'] ?></h2>
                            <div class="contenedor-descripcion">
                                <p><?php echo $all_listt['descripcion'] ?></p>
                            </div>
                        </div>
                        <!-- Información secundaria: precio, caracteristicas -->
                        <div class="contenido-secundario">
                            <hr class="separador-primario-secundario">
                            <div class="contenedor-caracteristica">
                                <h2>$<?php echo $all_listt['precio'] ?> CLP</h2>
                                <div class="contenido-caracteristica">
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/zona.png" alt="">
                                        <p><?php echo $all_listt['superficie'] ?> m<sup>2</sup></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                </div>
            </a>
            <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo-movil">
                <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),url('imagenes/depto.png');background-size:cover;background-position: center;">
                    <!-- Información principal: universidades, dirección, descripción -->
                    <div class="contenido-principal">
                            <div class="universidades">
                                <ul>
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        while($uni = $res->fetch_assoc()){
                                            echo "<li class='listado_universidad'>";
                                                echo "<img class='svg-caracteristicas' src='imagenes/caracteristicas/school-outline.svg'></img>";
                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                            echo "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <h2 class="direccion-titulo"><?php echo $all_listt['sector'] ?></h2>
                            <div class="contenedor-descripcion">
                                <p><?php echo $all_listt['descripcion'] ?></p>
                            </div>
                    </div>
                    <div class="contenido-arriendo">
                        <!-- Información secundaria: precio, caracteristicas -->
                        <div class="contenido-secundario">
                            <hr class="separador-primario-secundario">
                            <div class="contenedor-caracteristica">
                                <h2>$<?php echo $all_listt['precio'] ?> CLP</h2>
                                <div class="contenido-caracteristica">
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
    }
    if (isset($_POST['buscar']) == "" && $BAN == 1) {
        $all = "SELECT DISTINCT * FROM propiedad ORDER BY id_propiedad DESC";
        $all_list = $conn->query($all);
        while ($all_listt = $all_list->fetch_assoc()) {
        ?>
            <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo">
                <div class="imagen-arriendo">
                        <img src="imagenes/depto.png" alt="">
                </div>
                <div class="contenido-arriendo">
                        <!-- Información principal: universidades, dirección, descripción -->
                        <div class="contenido-principal">
                            <div class="universidades">
                                <ul>
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        while($uni = $res->fetch_assoc()){
                                            echo "<li class='listado_universidad'>";
                                                echo "<img class='svg-caracteristicas' src='imagenes/caracteristicas/school-outline.svg'></img>";
                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                            echo "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <h2 class="direccion-titulo"><?php echo $all_listt['sector'] ?></h2>
                            <div class="contenedor-descripcion">
                                <p><?php echo $all_listt['descripcion'] ?></p>
                            </div>
                        </div>
                        <!-- Información secundaria: precio, caracteristicas -->
                        <div class="contenido-secundario">
                            <hr class="separador-primario-secundario">
                            <div class="contenedor-caracteristica">
                                <h2>$<?php echo $all_listt['precio'] ?> CLP</h2>
                                <div class="contenido-caracteristica">
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/zona.png" alt="">
                                        <p><?php echo $all_listt['superficie'] ?> m<sup>2</sup></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                </div>
            </a>
            <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo-movil">
                <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),url('imagenes/depto.png');background-size:cover;background-position: center;">
                    <!-- Información principal: universidades, dirección, descripción -->
                    <div class="contenido-principal">
                            <div class="universidades">
                                <ul>
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        while($uni = $res->fetch_assoc()){
                                            echo "<li class='listado_universidad'>";
                                                echo "<img class='svg-caracteristicas' src='imagenes/caracteristicas/school-outline.svg'></img>";
                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                            echo "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <h2 class="direccion-titulo"><?php echo $all_listt['sector'] ?></h2>
                            <div class="contenedor-descripcion">
                                <p><?php echo $all_listt['descripcion'] ?></p>
                            </div>
                    </div>
                    <div class="contenido-arriendo">
                        <!-- Información secundaria: precio, caracteristicas -->
                        <div class="contenido-secundario">
                            <hr class="separador-primario-secundario">
                            <div class="contenedor-caracteristica">
                                <h2>$<?php echo $all_listt['precio'] ?> CLP</h2>
                                <div class="contenido-caracteristica">
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
    }
?>