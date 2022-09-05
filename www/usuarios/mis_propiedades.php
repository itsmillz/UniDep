<?php 
    session_start();
    $usuario = "";
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }else{
		header("Location: ../index.php");
	}
?>

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
            <div class="contenedor-nav" style="width:100%;">
            <?php 
                if ($usuario) {
            ?>
                <nav class="navegacion">
                    <a class="boton-principal-add" style="margin:0" href="../form_propiedad/formulario.php">Publicar propiedad<a href="form_propiedad/formulario.php"></a></a>
                    <p>@<?php echo $usuario; ?></p>
                    <a class="boton-principal-logout" href='salir.php'><svg
                        width="25"
                        height="23"
                        viewBox="0 0 23 23"
                        fill="white"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z"
                            fill="white"
                        />
                        <path
                            d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z"
                            fill="white"
                        />
                        </svg>
                    </a>
                </nav>
            <?php } ?>
            </div>
        </header>
        <div class="segundo-container">
            <div class="contenedor-titulos">
                <h1>Revisa el estado de tus propiedades</h1>
            </div>
        </div>
        <main class="contenedor-principal">
            <section class="contenedor-arriendos">
                <?php
                    include ('../db_connection/connection.php');
                    $sql = "SELECT DISTINCT * FROM propiedad WHERE prop_rut = '$usuario' ORDER BY id_propiedad DESC";
                    $mis_propiedades = $conn->query($sql);
                    $total = mysqli_num_rows($mis_propiedades);
                ?>
                <div class="detalles-principal">
                    <div class="volver-inicio-atras">
                        <a class="volver-atras" href="../index.php" style="margin-right: 8px;">&#171; Inicio</a>
                        <a class="volver-atras" href="<?=$_SERVER["HTTP_REFERER"]?>">&#171; volver atrás</a>
                    </div>
                    <p class='cantidad-total' style="margin-left:20px;">Cantidad de arriendos <?php echo $total ?></p>
                </div>
                <?php
                    if ($total > 0){
                        while ($all_listt = $mis_propiedades->fetch_assoc()) {
                        ?>
                            <div class="contenedor-estados">
                                <div class="titulo-estado">
                                    <h2>Estado de la propiedad</h2>
                                    <?php if ($all_listt['estado']) {$fondo_estado = '#9e9ea7';?>
                                        <div class="cont-estado">
                                            <figure class="estado1"></figure>
                                            <p>Arrendado</p>
                                        </div>
                                    <?php }else{ $fondo_estado = '#80b918'?>
                                        <div class="cont-estado">
                                            <figure class="estado2"></figure>
                                            <p>No arrendado</p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <a href="<?php echo '../buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo" style="margin: 25px 0; background-color: <?php echo $fondo_estado; ?>;">
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
                                                                    echo "<img class='svg-caracteristicas' src='../imagenes/caracteristicas/school-outline.svg'></img>";
                                                                    echo "<p> ".$uni['nombre_universidad']." </p>";
                                                                echo "</li>";
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <h2 class="direccion-titulo" style="color: white; text-shadow: 5px 5px 5px gba(20, 0, 0, 0.174);"><?php echo $all_listt['sector'] ?></h2>
                                                <div class="contenedor-descripcion">
                                                    <p style="color: white; text-shadow: 5px 5px 5px gba(20, 0, 0, 0.174);"><?php echo $all_listt['descripcion'] ?></p>
                                                </div>
                                            </div>
                                            <!-- Información secundaria: precio, caracteristicas -->
                                            <div class="contenido-secundario">
                                                <hr class="separador-primario-secundario">
                                                <div class="contenedor-caracteristica">
                                                    <h2 style="color: white; text-shadow: 5px 5px 5px gba(20, 0, 0, 0.174);">$<?php echo number_format($all_listt['precio'], 0, ".", ".") ?> CLP</h2>
                                                    <div class="contenido-caracteristica">
                                                        <section class="caracteristica">
                                                            <img src="../imagenes/caracteristicas/bano.png" alt="">
                                                            <p><?php echo $all_listt['bano'] ?> baños</p>
                                                        </section>
                                                        <section class="caracteristica">
                                                            <img src="../imagenes/caracteristicas/bed-outline.svg" alt="">
                                                            <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                                        </section>
                                                        <section class="caracteristica">
                                                            <img src="../imagenes/caracteristicas/zona.png" alt="">
                                                            <p><?php echo $all_listt['superficie'] ?> m<sup>2</sup></p>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </a>
                                <a href="<?php echo '../buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo-movil">
                                <div style="background-color: <?php echo $fondo_estado ?>;">
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
                                                                echo "<img class='svg-caracteristicas' src='../imagenes/caracteristicas/school-outline.svg'></img>";
                                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                                            echo "</li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                            <h2 class="direccion-titulo" style="color:#ffff"><?php echo $all_listt['sector'] ?></h2>
                                            <div class="contenedor-descripcion">
                                                <p style="color:#ffff"><?php echo $all_listt['descripcion'] ?></p>
                                            </div>
                                    </div>
                                    <div class="contenido-arriendo">
                                        <!-- Información secundaria: precio, caracteristicas -->
                                        <div class="contenido-secundario">
                                            <hr class="separador-primario-secundario">
                                            <div class="contenedor-caracteristica">
                                                <h2 style="color:#ffff">$<?php echo number_format($all_listt['precio'], 0, ".", ".") ?> CLP</h2>
                                                <div class="contenido-caracteristica">
                                                    <section class="caracteristica">
                                                        <img src="../imagenes/caracteristicas/bano.png" alt="">
                                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                                    </section>
                                                    <section class="caracteristica">
                                                        <img src="../imagenes/caracteristicas/bed-outline.svg" alt="">
                                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <div class="contenedor-acciones" style="margin: 15px 0;">
                                    <a href="<?php echo 'estados_propiedad/eliminar.php?id='.$all_listt['id_propiedad'].''?>" class="boton-principal-eliminar"><svg
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z"
                                            fill="white"
                                        />
                                        <path d="M9 9H11V17H9V9Z" fill="white" />
                                        <path d="M13 9H15V17H13V9Z" fill="white" />
                                        </svg>
                                    </a>
                                    <a href="<?php echo 'estados_propiedad/arrendar.php?id='.$all_listt['id_propiedad'].''?>" class="boton-arrendar" >Arrendado</a>
                                    <a href="<?php echo 'estados_propiedad/no-arrendar.php?id='.$all_listt['id_propiedad'].''?>" class="boton-arrendar">No arrendada</a>
                                </div>
                            </div>
                        <?php
                        }
                ?>
                <?php }else{ ?>
                <p class="no-encontrado" style="text-align: center;">No se encontraron propiedades &#128532;</p>
                <?php } ?>
            </section>
        </main>
    </div>
</body>
</html>
<?php ?>
