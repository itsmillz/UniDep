<?php
    include("../db_connection/connection.php");

    if ($_POST['buscar'] == "") {
        $bandera = true;
        $contador = 1;
        $BAN = 1;
        include("listado_propiedades.php");
    }
    if ($_POST['buscar'] != "") {
        // Realizamos la consulta SQL para la busqueda.
        $buscador = "SELECT DISTINCT * FROM propiedad INNER JOIN tiene_2 ON tiene_2.id_propiedad=propiedad.id_propiedad INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE nombre_universidad LIKE LOWER('%".strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST["buscar"]))))."%')";
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
        echo "<p class='no-encontrado' style='margin-bottom:7px;color:rgb(95, 95, 95);width:900px;'>Se encontraron <span style='color:#4361ee;'>".count($resultado_A)."</span> propiedades</p>";
        foreach ($resultado_A as &$valor) {
            // En esta consulta, obtenemos los resultados segun la id que se alamacena en el array sin valores repetidos ($resultado_A).
            $resultado_final = "SELECT DISTINCT * FROM propiedad WHERE id_propiedad = ".$valor." AND estado = '0'";
            $resultado_busquedaa = $conn->query($resultado_final);
            $total = mysqli_num_rows($resultado_busquedaa);
            // Recorremos y mostramos los resultados obtenidos según la consulta, y sin repetir.
            if ($total > 0) {
                while ($all_listt = $resultado_busquedaa->fetch_assoc()) {
                    ?>
                    <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo">
                            <div class="imagen-arriendo">
                            <?php 
                                $consulta = 'SELECT * FROM multiple_images WHERE id_propiedad ='.$all_listt['id_propiedad'];
                                $resultado = $conn->query($consulta);
                                    while($uni = $resultado->fetch_assoc()){
                                    echo '<img width="400px" height="auto" src="data:image/jpg;base64,'.base64_encode($uni['imagen']).'"/>';
                                    break;
                                } 
                            ?>
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
                                        <div class="contenedor-fecha" style="margin: 8px 0;">
                                            <img width="16px" height="16px" style="margin-right: 2px;" src="../imagenes/caracteristicas/fecha.svg" alt="">
                                            <?php
                                                $fecha = strtotime($all_listt['fecha_publicacion']);
                                                $dia = date("d",$fecha);
                                                switch(date("m",$fecha)){
                                                    case 1:
                                                        $mes = "enero";
                                                        break;
                                                    case 2:
                                                        $mes = "febrero";
                                                        break;
                                                    case 3:
                                                        $mes = "marzo";
                                                        break;
                                                    case 4:
                                                        $mes = "abril";
                                                        break;
                                                    case 5:
                                                        $mes = "mayo";
                                                        break;
                                                    case 6:
                                                        $mes = "junio";
                                                        break;
                                                    case 7:
                                                        $mes = "julio";
                                                        break;
                                                    case 8:
                                                        $mes = "agosto";
                                                        break;
                                                    case 9:
                                                        $mes = "septiembre";
                                                        break;
                                                    case 10:
                                                        $mes = "octubre";
                                                        break;
                                                    case 11:
                                                        $mes = "noviembre";
                                                        break;
                                                    case 12:
                                                        $mes = "diciembre";
                                                        break;
                                                }
                                                $anio = date("Y",$fecha);
                                            ?>
                                            <p class="fecha-publicacion" style="font-size: 14px;">Publicado el <?php echo $dia; ?> de <?php echo $mes; ?> del <?php echo $anio; ?></p>
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
                            <div style="background-color: #fff;">
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
                                            <h2>$<?php echo number_format($all_listt['precio'], 0, ".", ".") ?> CLP</h2>
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
            }else{
            ?>
        <?php
            }
        }
    }
?>


