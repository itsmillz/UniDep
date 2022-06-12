<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniDep</title>
    <link rel="stylesheet" href="style/style.css">
    <!-- IMPORTANTE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<?php
    if(!isset($_POST['desde'])){$_POST['desde'] = '';}
    if(!isset($_POST['hasta'])){$_POST['hasta'] = '';}
    if(!isset($_POST['banos'])){$_POST['banos'] = '';}
    if(!isset($_POST['habitaciones'])){$_POST['habitaciones'] = '';}
    if(!isset($_POST['amoblado'])){$_POST['amoblado'] = '';}
?>
    <div class="main-container">
        <header id="main-header">
            <div class="img-container">
                <img src="imagenes/UniDep.jpg" alt="">
            </div>
            <nav class="navegacion">
                <ul class="ul">
                    <img src="imagenes/perfil-del-usuario.png" alt="">
                    <li><a href=""><button>Publicar propiedad</button></a></li>
                </ul>
            </nav>
        </header>

        <div class="segundo-container">
            <h1><strong>¡Estudia cómodo y seguro!</strong></h1>
            <h2 class="texto">Encuentra el alojamiento que necesitas en el lugar que necesitas</h2>
            <div class="contenedor-principal-buscador">
                <div class="contenedor-secundario-buscador">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(102, 102, 102);" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="#626262"/></svg>
                    <input onkeyup="buscar_ahora($('#buscar').val());" type="search" name="buscar" id="buscar" placeholder="Ingrese su universidad para mostrar arriendos cercanos">
                </div>
            </div>
        </div>
        <!--Incluimos el fichero de la conexión a la BD-->
        <?php include_once ('conexion_bd/conexion.php') ?>

        <main class="contenedor-principal">
            <section class="contenedor-filtros">
                <form action="" method="POST" action="index.php">
                    <h3>Filtros</h3>
                    <section class="filtro-precio">
                        <label for="precio" class="titulo-filtro">Precio</label>
                        <div class="filtro-precio-interior">
                            <div class="precio-desde">
                                <input type="number" name="desde" value="<?php echo $_POST["desde"]; ?>" placeholder="Desde">
                            </div>
                            <div class="precio-hasta">
                                <input type="number" name="hasta" value="<?php echo $_POST["hasta"]; ?>" placeholder="Hasta">
                            </div>
                        </div>
                    </section>
                    <section class="filtro-general-input">
                        <label for="banos" class="titulo-filtro">Baños</label>
                        <input type="number" name="banos" value="<?php echo $_POST["banos"]; ?>">
                    </section>
                    <section class="filtro-general-input">
                        <label for="habitaciones" class="titulo-filtro">Habitaciones</label>
                        <input type="number" name="habitaciones" value="<?php echo $_POST["habitaciones"]; ?>">
                    </section>
                    <section class="filtro-amoblado">
                        <label class="amoblado">Amoblado
                            <input name="amoblado" type="checkbox" value="<?php echo $_POST["amoblado"]; ?>">
                            <span class="checkmark"></span>
                        </label>
                    </section>
                    <input class="boton-filtro" type="submit" value="buscar">
                </form>
            </section>
            <section class="contenedor-arriendos">
                <div id="datos_filtros">
                    <?php include('buscador_filtros/filtros.php') ?>
                </div>
                <div id="datos_buscador">
                    
                </div>
            </section>
        </main>

    </div>
    <!-- SCRIPT -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>


