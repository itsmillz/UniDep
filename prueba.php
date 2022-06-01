<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniDep</title>
    <link rel="stylesheet" href="Estilos/estilos.css">
</head>
<body>
    
<div class="main-container">
        <header id="main-header">
            <div class="img-container">
                <img src="imagenes/UniDep.jpg" alt="">
            </div>
            <nav class="navegacion">
                <ul class="ul">
                    <!-- <li><a href=""> <button class="button">Inicio</button></a></li> -->
                    <!-- <li><a href=""><button class="button">Registro</button></a></li> -->
                    <img src="imagenes/perfil-del-usuario.png" alt="">
                    <li><a href=""><button>Publicar propiedad</button></a></li>
                </ul>
            </nav>
        </header>

        <div class="segundo-container">
            <h1>
                <strong>¡Estudia cómodo y seguro!</strong>
            </h1>
            <h2 class="texto">Encuentra el alojamiento que necesitas en el lugar que necesitas</h2>

            <div class="flexsearch">
                <div class="flexsearch--wrapper">
                    <form class="flexsearch--form" action="#" method="post">
                        <div class="flexsearch--input-wrapper">
                            <input class="flexsearch--input" type="search"
                                placeholder="Universidad: (Por favor, ingrese su universidad)">
                        </div>
                        <!-- <input type="submit" value="Filtrar por:"/> -->
                        <input class="flexsearch--submit" type="submit" value="&#10140;" />
                        <input class="flexsearch--submit2" type="submit"  value="&#9779;" />
                        
                    </form>
                </div>
            </div>
        </div>

        <main class="contenedor-principal">
            <section class="contenedor-filtros">
                ...
            </section>
            <section class="contenedor-arriendos">
                <div class="contenedor-arriendo">
                    <div class="imagen-arriendo">
                        <img src="imagenes/depto.png" alt="">
                    </div>
                    <div class="contenido-arriendo">
                        <div class="contenido-principal">
                            <div class="universidad-calificacion">
                                <p>Lorem ipsum dolor sit.</p>
                                <div class="calificacion">
                                    <img src="imagenes/estrella.png" alt="">
                                    <p><strong>4.6</strong></p>
                                </div>
                            </div>
                            <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                            <p class="descripcion-arriendo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo mollitia doloremque laborum natus reiciendis obcaecati!</p>
                        </div>
                        <hr>
                        <div class="contenido-secundario">
                            <p class="precio-arriendo">$300.000 CLP</p>
                            <div class="caracteristicas-arriendo">
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/wifi.png" alt="">
                                    <p>1 dorm</p>
                                </div>
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/wifi.png" alt="">
                                    <p>1 dorm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>
</html>