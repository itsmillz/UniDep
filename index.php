<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniDep</title>
    <link rel="stylesheet" href="style/reset.css">
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
                <a href="index.php"><img src="imagenes/UniDep.jpg" alt=""></a>
            </div>
            <?php 
                if ($usuario) {
            ?>
                <!-- <h2>Hola $usuario</h2>; -->
                <nav class="navegacion">
                    <p>@<?php echo $usuario; ?></p>
                    <a href='usuarios/salir.php'>Salir</a>
                    <a class="boton-principal-add" href="form_propiedad/formulario.php">Publicar propiedad<a href="form_propiedad/formulario.php"></a></a>
                </nav>
                <div>
                    <a href="usuarios/mis_propiedades.php">mis propiedades</a>
                </div>
            <?php } ?>
        </header>

        <div class="segundo-container">
            <div class="contenedor-titulos">
                <h1>¡Estudia cómodo y seguro!</h1>
                <h2>Encuentra el alojamiento que necesitas en el lugar que necesitas</h2>
            </div>
            <div class="grupo-buscador">
                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                <input onkeyup="buscar_ahora($('#buscar').val());" type="search" class="buscador" name="buscar" id="buscar" value="" placeholder="Ingrese su universidad para mostrar arriendos cercanos" pattern="[a-zA-Z-]{47}" maxlength="47" minlength="0" autocomplete="off">
            </div>
        </div>
        <!--Incluimos el fichero de la conexión a la BD-->
        <?php include_once ('db_connection/connection.php') ?>
        <div class="login">
            <form action="usuarios/usuario.php" method="POST">
                <input type="text" name="rut" id="rut" autocomplete="off">
                <input type="submit" name="submit" value="Iniciar sesion">
            </form>
        </div>
        <main class="contenedor-principal">
            <!-- Sección mostrada en el Desktop -->
            <section class="contenedor-filtros">
                <form action="" method="POST" action="index.php">
                    <h3 class="titulo-filtro">Filtros</h3>
                    <p class="titulo-filtro-individual">Precio</p>
                    <div class="grupo-filtrado">
                        <input placeholder="Desde" type="number" name="desde" value="<?php echo $_POST['desde']; ?>" class="input-general primerinput" min="0" max="1500000" pattern="[0-9]{7}" autocomplete="off">
                        <input placeholder="Hasta" type="number" name="hasta" value="<?php echo $_POST['hasta']; ?>" class="input-general" min="0" max="1500000" pattern="[0-9]{7}" autocomplete="off">
                    </div>
                    <p class="titulo-filtro-individual">Habitaciones</p>
                    <div class="grupo-filtrado">
                        <input placeholder="Cantidad de habitaciones" type="number" name="desde" value="<?php echo $_POST['habitaciones']; ?>" class="input-general" min="0" max="99" pattern="[0-9]{1}" autocomplete="off">
                    </div>
                    <p class="titulo-filtro-individual">Baños</p>
                    <div class="grupo-filtrado">
                        <input placeholder="Cantidad de baños" type="number" name="desde" value="<?php echo $_POST['banos']; ?>" class="input-general" min="0" max="99" pattern="[0-9]{1}" autocomplete="off">
                    </div>
                    <p class="titulo-filtro-individual">Gastos comunes</p>
                    <div class="grupo-filtrado">
                        <input placeholder="Desde" type="number" name="gastoscomunesdesde" value="<?php echo $_POST['gastoscomunesdesde']; ?>" class="input-general primerinput" min="0" max="150000" pattern="[0-9]{6}" autocomplete="off">
                        <input placeholder="Hasta" type="number" name="gastoscomuneshasta" value="<?php echo $_POST['gastoscomuneshasta']; ?>" class="input-general" min="0" min="0" max="150000" pattern="[0-9]{6}" autocomplete="off">
                    </div>
                    <p class="titulo-filtro-individual">Propiedad amoblada</p>
                    <div class="grupo-filtrado">
                        <select class="input-general select" name="amoblada" id="amoblada">
                                <option value="" selected>Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                        </select>
                    </div>
                    <p class="titulo-filtro-individual">Tipo de propiedad</p>
                    <div class="grupo-filtrado">
                        <select class="input-general select" name="tipo" id="tipo">
                                <option value="" selected>Seleccionar</option>
                                <option value="casa">Casa</option>
                                <option value="departamento">Departamento</option>
                        </select>
                    </div>
                    <input class="boton-filtro" type="submit" value="Buscar">
                </form>
            </section>
            <section class="contenedor-arriendos">
                <div id="datos_buscador">
                    
                </div>
                <div id="datos_filtros">
                    <?php include('buscador_filtros_listado/filtros.php') ?>
                </div>
                <div id="todos_datos">
                    <?php include('buscador_filtros_listado/listado_propiedades.php'); ?>
                </div>
            </section>
        </main>
    </div>

    <!-- Sección nav mostrada en el movil -->
    <section class="navegador-movil">
        <div class="contenedor-buscador-movil">
            <input class="buscador-movil" onkeyup="buscar_ahora($('#buscar-movil').val());" type="search" name="buscar" id="buscar-movil" value="" placeholder="Ingrese su universidad para mostrar arriendos cercanos" pattern="[a-zA-Z-]{47}" maxlength="47" minlength="0" autocomplete="off">
        </div>
        <div class="contenedor-filtro-movil">
            <button id="filtros-btn"><img src="imagenes/caracteristicas/filter.svg" alt=""></button>
            <div class="contenedor-oscuro">
                <section class="contenedor-filtros-movil">
                            <form action="" method="POST" action="index.php">
                                <h3 class="titulo-filtro">Filtros</h3>
                                <p class="titulo-filtro-individual">Precio</p>
                                <div class="grupo-filtrado">
                                    <input placeholder="Desde" type="number" name="desde" value="<?php echo $_POST['desde']; ?>" class="input-general primerinput" min="0" max="1500000" pattern="[0-9]{7}" autocomplete="off">
                                    <input placeholder="Hasta" type="number" name="hasta" value="<?php echo $_POST['hasta']; ?>" class="input-general" min="0" max="1500000" pattern="[0-9]{7}" autocomplete="off">
                                </div>
                                <p class="titulo-filtro-individual">Habitaciones</p>
                                <div class="grupo-filtrado">
                                    <input placeholder="Cantidad de habitaciones" type="number" name="desde" value="<?php echo $_POST['habitaciones']; ?>" class="input-general" min="0" max="99" pattern="[0-9]{1}" autocomplete="off">
                                </div>
                                <p class="titulo-filtro-individual">Baños</p>
                                <div class="grupo-filtrado">
                                    <input placeholder="Cantidad de baños" type="number" name="desde" value="<?php echo $_POST['banos']; ?>" class="input-general" min="0" max="99" pattern="[0-9]{1}" autocomplete="off">
                                </div>
                                <p class="titulo-filtro-individual">Gastos comunes</p>
                                <div class="grupo-filtrado">
                                    <input placeholder="Desde" type="number" name="gastoscomunesdesde" value="<?php echo $_POST['gastoscomunesdesde']; ?>" class="input-general primerinput" min="0" max="150000" pattern="[0-9]{6}" autocomplete="off">
                                    <input placeholder="Hasta" type="number" name="gastoscomuneshasta" value="<?php echo $_POST['gastoscomuneshasta']; ?>" class="input-general" min="0" min="0" max="150000" pattern="[0-9]{6}" autocomplete="off">
                                </div>
                                <p class="titulo-filtro-individual">Propiedad amoblada</p>
                                <div class="grupo-filtrado">
                                    <select class="input-general select" name="amoblada" id="amoblada">
                                            <option value="" selected>Seleccionar</option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                    </select>
                                </div>
                                <p class="titulo-filtro-individual">Tipo de propiedad</p>
                                <div class="grupo-filtrado">
                                    <select class="input-general select" name="tipo" id="tipo">
                                            <option value="" selected>Seleccionar</option>
                                            <option value="casa">Casa</option>
                                            <option value="departamento">Departamento</option>
                                    </select>
                                </div>
                                <input class="boton-filtro" type="submit" value="Buscar">
                            </form>
                </section>
            </div>
        </div>
    </section>
    <!-- SCRIPT -->
    <script type="text/javascript" src="js/buscador.js"></script>
    <script>
        console.log("valor: ",document.getElementById("buscar").value);
    </script>
    <script type="text/javascript" src="js/caracteristicas_especiales.js"></script>
</body>
</html>


