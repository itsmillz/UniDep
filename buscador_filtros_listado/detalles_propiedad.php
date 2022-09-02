<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
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
                <a class="volver-atras" href="../index.php" style="margin-right: 8px;">&#171; incio</a>
                <a class="volver-atras" href="<?=$_SERVER["HTTP_REFERER"]?>">&#171; volver atras</a>
            </div>

            <!-- Información de la propiedad -->
            <?php
                include '../db_connection/connection.php';
                $id = $_GET['id'];
                $sql = "SELECT * FROM propiedad WHERE `id_propiedad`=".$id."";
                $propiedad = $conn->query($sql);
                while($fila = $propiedad->fetch_assoc()) {
            ?>
                    <div class="contenedor-detail">
                        <div class="contenedor-fecha">
                            <img src="../imagenes/caracteristicas/fecha.svg" alt="">
                            <p class="fecha-publicacion">Publicado el 22 de agosto del 2022</p>
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
                                        <p>9 5434 5455</p>
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
                                <h2>Imagenes</h2>
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
                                            <?php if ($usuario && $usuario == $fila['prop_rut']) { ?>
                                                <a class="card-button"href="<?php echo 'crud/delete.php?id='.$imagen["image_id"].'&id_propiedad='.$id.'' ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="white"/><path d="M9 9H11V17H9V9Z" fill="white" /><path d="M13 9H15V17H13V9Z" fill="white" /></svg></a>
                                            <?php } ?>
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