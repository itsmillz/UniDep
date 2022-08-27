<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniDep</title>
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
            <a class="volver-atras" href="../index.php">
                <p>&#171; volver hacía atras</p>
            </a>

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
                            <img src="../imagenes/depto.png" alt="">
                        </div>
                        <div class="info-principal">
                            <h1 class="direccion-detail"><?php echo $fila['sector'] ?></h1>
                            <p class="precio-detail">&#36;<?php echo $fila['precio'] ?> CLP <span>+ &#36;<?php echo $fila['gastos_comunes'] ?> CLP (gastos comunes)</span></p>
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
                        </div>
                    </div>
            <?php } ?>
            <!-- Contenido relacionado -->
        </main>
    </div>
</body>
</html>
<?php ?>