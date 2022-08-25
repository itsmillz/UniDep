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
    if(!isset($_POST['amoblada'])){$_POST['amoblada'] = '';}
    if(!isset($_POST['tipo'])){$_POST['tipo'] = '';}
    if(!isset($_POST['gastoscomunesdesde'])){$_POST['gastoscomunesdesde'] = '';}
    if(!isset($_POST['gastoscomuneshasta'])){$_POST['gastoscomuneshasta'] = '';}
    $BAN = 1;
?>

    <div class="main-container">
        <header class="main-header">
            <div class="img-logo">
                <a href=""><img src="imagenes/UniDep.jpg" alt=""></a>
            </div>
            <nav class="navegacion">
                <a href="form_propiedad/formulario.php">Publicar propiedad</a>
            </nav>
        </header>

        <div class="segundo-container">
            <h1><strong>¡Estudia cómodo y seguro!</strong></h1>
            <h2 class="texto">Encuentra el alojamiento que necesitas en el lugar que necesitas</h2>
            <div class="contenedor-principal-buscador">
                <div class="contenedor-secundario-buscador">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(102, 102, 102);" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="#626262"/></svg>
                    <input onkeyup="buscar_ahora($('#buscar').val());" type="search" name="buscar" id="buscar" value="" placeholder="Ingrese su universidad para mostrar arriendos cercanos" pattern="[a-zA-Z-]{47}" maxlength="47" minlength="0">
                </div>
            </div>
        </div>
        <!--Incluimos el fichero de la conexión a la BD-->
        <?php include_once ('db_connection/connection.php') ?>

        <main class="contenedor-principal">
            <div class="buscador-filtrado">
                <div class="contenedor-responsive-buscador">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(102, 102, 102);" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="#626262"/></svg>
                    <input onkeyup="buscar_ahora($('#buscar-res').val());" type="search" name="buscar" id="buscar-res" value="" placeholder="Ingrese su universidad para mostrar arriendos cercanos" pattern="[a-zA-Z-]{47}" maxlength="47" minlength="0">
                </div>
                <div class="container-responsive-filter">
                    <button class="filter-button" id="show-proyecto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <p>Filtrar</p>
                    </button>
                </div>
            </div>
            <section class="modal">
                <div class="modal__container">
                    <h2>Filtrar</h2>
                    <form action="" method="POST" action="index.php">
                        <section class="filtro-precio">
                            <label for="precio" class="titulo-filtro">Precio</label>
                            <div class="filtro-precio-interior">
                                <div class="precio-desde">
                                    <input type="number" name="desde" value="<?php echo $_POST["desde"]; ?>" placeholder="Desde" min="0" max="1500000" pattern="[0-9]{7}" title="Ingrese un precio valido.">
                                </div>
                                <div class="precio-hasta">
                                    <input type="number" name="hasta" value="<?php echo $_POST["hasta"]; ?>" placeholder="Hasta" min="0" max="1500000" pattern="[0-9]{7}" title="Ingrese un precio valido.">
                                </div>
                            </div>
                        </section>
                        <section class="filtro-general-input">
                            <label for="banos" class="titulo-filtro">Baños</label>
                            <input type="number" name="banos" value="<?php echo $_POST["banos"]; ?>" placeholder="Cantidad de baños" title="No puede contener mas de 100 baños.">
                        </section>
                        <section class="filtro-general-input">
                            <label for="habitaciones" class="titulo-filtro">Dormitorios</label>
                            <input type="number" name="habitaciones" value="<?php echo $_POST["habitaciones"]; ?>" placeholder="Cantidad de dormitorios" min="0" max="99" pattern="[0-8]{1}">
                        </section>
                        <section class="filtro-select">
                            <label class="titulo-filtro">Amoblada</label>
                            <select name="amoblada" id="amoblada">
                                    <option value="" selected>Seleccionar</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                            </select>
                        </section>
                        <section class="filtro-select">
                            <label class="titulo-filtro">Tipo</label>
                            <select name="tipo" id="tipo">
                                    <option value="" selected>Seleccionar</option>
                                    <option value="casa">Casa</option>
                                    <option value="departamento">Departamento</option>
                                </select>
                        </section>
                        <section class="filtro-precio">
                            <label for="gastos-comunes" class="titulo-filtro">Gastos Comunes</label>
                            <div class="filtro-precio-interior">
                                <div class="precio-desde">
                                    <input type="number" name="gastoscomunesdesde" value="<?php echo $_POST["gastoscomunesdesde"]; ?>" placeholder="Desde" min="0" max="150000" pattern="[0-9]{6}">
                                </div>
                                <div class="precio-hasta">
                                    <input type="number" name="gastoscomuneshasta" value="<?php echo $_POST["gastoscomuneshasta"]; ?>" placeholder="Hasta" min="0" max="150000" pattern="[0-9]{6}">
                                </div>
                            </div>
                        </section>
                        <input class="boton-filtro" type="submit" value="buscar">
                    </form>
                </div>
            </section>
            <section class="contenedor-filtros">
                <form action="" method="POST" action="index.php">
                    <h3>Filtros</h3>
                    <section class="filtro-precio">
                        <label for="precio" class="titulo-filtro">Precio</label>
                        <div class="filtro-precio-interior">
                            <div class="precio-desde">
                                <input type="number" name="desde" value="<?php echo $_POST["desde"]; ?>" placeholder="Desde" min="0" max="1500000" pattern="[0-9]{7}" title="Ingrese un precio valido.">
                            </div>
                            <div class="precio-hasta">
                                <input type="number" name="hasta" value="<?php echo $_POST["hasta"]; ?>" placeholder="Hasta" min="0" max="1500000" pattern="[0-9]{7}" title="Ingrese un precio valido.">
                            </div>
                        </div>
                    </section>
                    <section class="filtro-general-input">
                        <label for="banos" class="titulo-filtro">Baños</label>
                        <input type="number" name="banos" value="<?php echo $_POST["banos"]; ?>" placeholder="Cantidad de baños" min="0" max="99" pattern="[0-9]{1}">
                    </section>
                    <section class="filtro-general-input">
                        <label for="habitaciones" class="titulo-filtro">Dormitorios</label>
                        <input type="number" name="habitaciones" value="<?php echo $_POST["habitaciones"]; ?>" placeholder="Cantidad de dormitorios" min="0" max="99" pattern="[0-9]{1}">
                    </section>
                    <section class="filtro-select">
                        <label class="titulo-filtro">Amoblada</label>
                        <select name="amoblada" id="amoblada">
                                <option value="" selected>Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                        </select>
                    </section>
                    <section class="filtro-select">
                        <label class="titulo-filtro">Tipo</label>
                        <select name="tipo" id="tipo">
                                <option value="" selected>Seleccionar</option>
                                <option value="casa">Casa</option>
                                <option value="departamento">Departamento</option>
                            </select>
                    </section>
                    <section class="filtro-precio">
                        <label for="gastos-comunes" class="titulo-filtro">Gastos Comunes</label>
                        <div class="filtro-precio-interior">
                            <div class="precio-desde">
                                <input type="number" name="gastoscomunesdesde" value="<?php echo $_POST["gastoscomunesdesde"]; ?>" placeholder="Desde" min="0" max="150000" pattern="[0-9]{6}">
                            </div>
                            <div class="precio-hasta">
                                <input type="number" name="gastoscomuneshasta" value="<?php echo $_POST["gastoscomuneshasta"]; ?>" placeholder="Hasta" min="0" max="150000" pattern="[0-9]{6}">
                            </div>
                        </div>
                    </section>
                    <input class="boton-filtro" type="submit" value="buscar">
                </form>
            </section>
            <section class="contenedor-arriendos">
                <div id="datos_buscador">
                    
                </div>
                <div id="datos_filtros">
                    <?php include('buscador_filtros/filtros.php') ?>
                </div>
                <div id="todos_datos">
                    <?php include('buscador_filtros/listado_propiedades.php'); ?>
                </div>
            </section>
        </main>
    </div>
    <!-- SCRIPT -->
    <script type="text/javascript" src="js/buscador.js"></script>
    <script>
        console.log("valor: ",document.getElementById("buscar").value);
    </script>
    <script type="text/javascript" src="js/caracteristicas_especiales.js"></script>
</body>
</html>


