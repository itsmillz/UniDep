<?php 
    session_start();
    $usuario = "";
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link rel="stylesheet" href="../style/style.css">
    <!-- IMPORTANTE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>
<body>
    <div class="main-container">
        <header class="main-header">
            <div class="img-logo">
                    <a href="../index.php"><img src="../imagenes/UniDep.jpg" alt=""></a>
            </div>
        </header>
        <main class="main-detail">
            <!-- Boton de volver hacía atras -->
            <div class="volver-inicio-atras" style="width: 100%">
                <a class="volver-atras" href="../index.php" style="margin-right: 8px;">&#171; Inicio</a>
                <a class="volver-atras" href="<?=$_SERVER["HTTP_REFERER"]?>">&#171; volver atrás</a>
            </div>

            <!-- Información de la propiedad -->
            <?php
                include '../db_connection/connection.php';
                setlocale(LC_ALL, 'es_ES');
                $id = $_GET['id'];
                $sql = "SELECT * FROM propiedad WHERE `id_propiedad`=".$id."";
                $propiedad = $conn->query($sql);
                while($fila = $propiedad->fetch_assoc()) {
            ?>
                    <div class="contenedor-detail">
                        <div class="contenedor-fecha">
                            <img src="../imagenes/caracteristicas/fecha.svg" alt="">
                            <?php
                                $fecha = strtotime($fila['fecha_publicacion']);
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
                            <p class="fecha-publicacion">Publicado el <?php echo $dia; ?> de <?php echo $mes; ?> del <?php echo $anio; ?></p>
                        </div>
                        <div class="imagen-propiedad">
                            <?php 
                                $consulta = 'SELECT * FROM multiple_images WHERE id_propiedad ='.$fila['id_propiedad'];
                                $resultado = $conn->query($consulta);
                                    while($uni = $resultado->fetch_assoc()){
                                    echo '<img width="100%" height="100%" src="data:image/jpg;base64,'.base64_encode($uni['imagen']).'"/>';
                                    break;
                                } 
                            ?>
                        </div>
                        <div class="info-principal">
                            <h1 class="direccion-detail"><?php echo $fila['sector'] ?></h1>
                            <p class="precio-detail">&#36;<?php echo number_format($fila['precio'], 0, ".", ".") ?> CLP <span>+ &#36;<?php echo number_format($fila['gastos_comunes'], 0, ".", ".") ?> CLP (gastos comunes)</span></p>
                            <div class="info-desc-contacto">
                                <p><?php echo $fila['descripcion'] ?></p>
                            </div>
                            <hr class="separador-detail">
                            <div class="informacion">
                                <h2>Información de contacto</h2>
                                <div class="info-card">
                                    <section class="card-info">
                                        <img src="../imagenes/caracteristicas/telefono.svg" alt="">
                                        <p><?php echo $fila['telefono'] ?></p>
                                    </section>
                                </div>
                            </div>
                            <div class="informacion">
                                <h2>Características</h2>
                                <div class="info-card">
                                    <section class="card-info">
                                        <img src="../imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $fila['bano'] ?> baños</p>
                                    </section>
                                    <section class="card-info">
                                        <img src="../imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $fila['habitacion'] ?> habitaciones</p>
                                    </section>
                                    <section class="card-info">
                                        <img src="../imagenes/caracteristicas/zona.png" alt="">
                                        <p><?php echo $fila['superficie'] ?>m<sup>2</sup></p>
                                    </section>
                                    <?php if($fila['gastos_comunes'] == 'Sí'){ ?>
                                    <section class="card-info">
                                        <img src="../imagenes/caracteristicas/money.png" alt="">
                                        <p>$<?php echo number_format($fila['gastos_comunes'], 0, ".", ".") ?> CLP</p>
                                    </section>
                                    <?php } ?>
                                    <?php if($fila['servicio_aseo'] == 'Sí'){ ?>
                                        <section class="card-info">
                                            <img src="../imagenes/caracteristicas/limpieza.png" alt="">
                                            <p>Servicio de limpieza</p>
                                        </section>
                                    <?php } ?>
                                    <?php if($fila['estacionamiento'] == 'Sí'){ ?>
                                        <section class="card-info">
                                            <img src="../imagenes/caracteristicas/estacionamiento.png" alt="">
                                            <p>Estacionamiento</p>
                                        </section>
                                    <?php } ?>
                                    <?php if($fila['amoblada'] == 'Sí'){ ?>
                                        <section class="card-info">
                                            <img src="../imagenes/caracteristicas/amoblada.png" alt="">
                                            <p>Amoblada</p>
                                        </section>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="informacion">
                                <h2>Universidades cercanas</h2>
                                <div class="info-card">
                                <?php
                                    // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                    $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$id."";
                                    $universidades = $conn->query($sql_universidad);
                                    while($universidad = $universidades->fetch_assoc()){
                                ?>
                                        <section class="card-info">
                                            <img src="../imagenes/caracteristicas/school-outline.svg"></img>
                                            <p><?php echo $universidad['nombre_universidad'] ?></p>
                                        </section>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="informacion">
                                <h2>Imágenes</h2>
                                <div class="contenedor-imagenes">
                                <?php
                                    include '../db_connection/connection.php';
                                    $consulta = 'select * from multiple_images where id_propiedad ='.$id;
                                    $resultado = $conn->query($consulta);
                                    while($imagen = $resultado->fetch_assoc()){ ?>
                                        <!-- Listado de fotos -->
                                        <div class="card">
                                            <div class="card-details">
                                                <button class="imagen"><?php echo '<img width="240" height="280px" src="data:image/jpg;base64,'.base64_encode($imagen['imagen'] ).'"/>';  ?></button>
                                            </div>
                                        </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
            <!-- Contenido relacionado -->
        </main>
    </div>
</body>
</html>
<?php ?>
