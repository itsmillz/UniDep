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
            <!-- Estilos del menu de escritorio -->
            <?php if ($usuario) {?>
            <nav class="navegacion">
                <a class="boton-principal-add" href="usuarios/mis_propiedades.php">Mis propiedades</a>
                <a class="boton-principal-add" href="form_propiedad/formulario.php" style="margin-right: 0;">Publicar propiedad<a href="form_propiedad/formulario.php"></a></a>
                <div class="user-content">
                    <p>@<?php echo $usuario; ?></p>
                    <a class="boton-principal-logout" href='usuarios/salir.php'><svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z"
                            fill="currentColor"
                        />
                        <path
                            d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z"
                            fill="currentColor"
                        />
                        </svg>
                    </a>
                </div>
            </nav>
            <?php }else{ ?>
            <div class="login">
                <form action="usuarios/usuario.php" method="POST" class="cont-login">
                    <input class="input-general primerinput" type="text" name="rut" id="rut" oninput="checkRut(this)" autocomplete="off">
                    <input class="boton-principal-add" style="border:none;" type="submit" name="submit" value="Iniciar sesion">
                </form>
            </div>
            <?php } ?>
            <!-- Boton menu movil -->
            <div class="contenedor-burger">
                <button  class="menu-button" data-estado="cerrado" id="burger-button">
                    <svg
                        width="40"
                        height="40"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                        d="M2 6C2 5.44772 2.44772 5 3 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H3C2.44772 7 2 6.55228 2 6Z"
                        fill="currentColor"
                        />
                        <path
                        d="M2 12.0322C2 11.4799 2.44772 11.0322 3 11.0322H21C21.5523 11.0322 22 11.4799 22 12.0322C22 12.5845 21.5523 13.0322 21 13.0322H3C2.44772 13.0322 2 12.5845 2 12.0322Z"
                        fill="currentColor"
                        />
                        <path
                        d="M3 17.0645C2.44772 17.0645 2 17.5122 2 18.0645C2 18.6167 2.44772 19.0645 3 19.0645H21C21.5523 19.0645 22 18.6167 22 18.0645C22 17.5122 21.5523 17.0645 21 17.0645H3Z"
                        fill="currentColor"
                        />
                    </svg>
                </button>
            </div>

        </header>

        <!-- Estilos del menu movil -->
        <div class="menu-opciones" style="<?php if($usuario) echo 'background-color:white;background-image:none;max-height:100%;;'?>" id="menu-opciones">
            <?php if($usuario){ ?>
                <p class="user">@<?php echo $usuario; ?></p>
                <a href="form_propiedad/formulario.php">Publicar propiedad</a>
                <a href="usuarios/mis_propiedades.php">Mis propiedades</a>
                <a href="usuarios/salir.php">Salir</a>
            <?php }else{ ?>
                <div class="contenedor-login">
                    <div class="login-section">
                        <h2 class="titulo-login">Ingrese su rut</h2>
                        <form action="usuarios/usuario.php" method="POST" class="cont-login">
                            <input class="rut-input input-general" type="text" name="rut" id="rut" oninput="checkRut(this)" autocomplete="off">
                            <input style="border:none;" class="boton-principal-add boton-login-movil" type="submit" name="submit" value="Iniciar sesion">
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>


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
        <main class="contenedor-principal">
            <?php 
                $sql= "SELECT COUNT(*) AS `verificar` FROM propiedad";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                if ($data['verificar'] > 0) {
            ?>
                <!-- Sección mostrada en el Desktop -->
                <section class="contenedor-filtros">
                    <form action="" method="POST" action="index.php" id="form-filtro">
                        <h3 class="titulo-filtro">Filtros</h3>
                        <p class="titulo-filtro-individual">Precio</p>
                        <div class="grupo-filtrado">
                            <input placeholder="Desde" type="number" name="desde" id="desde" value="<?php echo $_POST['desde']; ?>" class="input-general primerinput" min="0" max="1500000" pattern="[0-9]{7}" autocomplete="off">
                            <input placeholder="Hasta" type="number" name="hasta" id="hasta" value="<?php echo $_POST['hasta']; ?>" class="input-general" min="" max="1500000" pattern="[0-9]{7}" autocomplete="off">
                        </div>
                        <p id="mensaje-precio" class="alertas-mensajes" style="margin:7px 0;"></p>
                        <p class="titulo-filtro-individual">Habitaciones</p>
                        <div class="grupo-filtrado">
                            <input placeholder="Cantidad de habitaciones" type="number" name="habitaciones" value="<?php echo $_POST['habitaciones']; ?>" class="input-general" min="0" max="99" pattern="[0-9]{1}" autocomplete="off">
                        </div>
                        <p class="titulo-filtro-individual">Baños</p>
                        <div class="grupo-filtrado">
                            <input placeholder="Cantidad de baños" type="number" name="banos" value="<?php echo $_POST['banos']; ?>" class="input-general" min="0" max="99" pattern="[0-9]{1}" autocomplete="off">
                        </div>
                        <p class="titulo-filtro-individual">Gastos comunes</p>
                        <div class="grupo-filtrado">
                            <input placeholder="Desde" type="number" name="gastoscomunesdesde" id="gastoscomunesdesde" value="<?php echo $_POST['gastoscomunesdesde']; ?>" class="input-general primerinput" min="0" max="150000" pattern="[0-9]{6}" autocomplete="off">
                            <input placeholder="Hasta" type="number" name="gastoscomuneshasta" id="gastoscomuneshasta" value="<?php echo $_POST['gastoscomuneshasta']; ?>" class="input-general" min="0" min="0" max="150000" pattern="[0-9]{6}" autocomplete="off">
                        </div>
                        <p id="mensaje-gasto" class="alertas-mensajes" style="margin:7px 0;"></p>
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
            <?php }else{ ?>
                <p class="no-encontrado">No se encontraron propiedades &#128532;</p>
            <?php } ?>
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
    <script src="js/menu.js"></script>
</body>
</html>


