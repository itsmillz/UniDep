<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Propiedad</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body>
    <!-- <div> -->
    <header id="main-header">
        <div class="img-container">
            <img src="Imagenes/UniDep.jpg" alt="">
        </div>
        <nav class="navegacion">
            <ul class="ul">
                <img src="Imagenes/perfil-del-usuario.png" alt="">
                <li><a href=""><button>Publicar propiedad</button></a></li>
            </ul>
        </nav>
    </header>
    <!-- </div> -->

<!-- 
    <div>
        <h2>Propiedad:</h2>
        <form action="ejemplo.php" method="get">
            <p>Sector Propiedad: <input style="border-radius:5px ;" type="text" name="Sector" size="20" placeholder="Indique sector"></p>
            <p>Precio Arriendo: <input style="border-radius:5px ;" type="number" name="Precio" placeholder="Indique Precio"></p>
            <p>Tipo de Propiedad:
                <p>Departamento <input style="border-radius:5px ;" type="radio" name="Depto" value="Depto"></p>   
                <p>Casa <input style="border-radius:5px ;" type="radio" name="casa" value="Casa"></p>
            </p>
        <h2>Características de la propiedad:</h2>
            <p>Cantidad de baños: <input style="border-radius:5px ;" type="number" name="Sector" size="20" placeholder="Indique cantidad de baños"></p>
            <p>Cantidad de habitaciones: <input style="border-radius:5px ;" type="number" name="Precio" placeholder="Indique Precio"></p>
            <p>¿Desea una propiedad amoblada?:
                <p>Sí <input style="border-radius:5px ;" type="radio" name="Depto" value="Depto"></p>   
                <p>No <input style="border-radius:5px ;" type="radio" name="casa" value="Casa"></p>
            </p>
            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar todo">
            </p>
            
        </form>
    </div> -->


    <div>
        <form>
        <section class="form-registro">
            <p>Registro de las características de su propiedad</p>
            <input class="carac" type="text" placeholder="Por favor, ingrese sector de su propiedad">
            <input class="carac" type="number"  placeholder="Por favor, ingrese el precio de arriendo">
            <input class="carac" type="text"  placeholder="Por favor, indique si su propiedad es casa o departamento">
            <input class="carac" type="number" placeholder="Por favor, ingrese cantidad de baño/s que posee su propiedad">
            <input class="carac" type="text" placeholder="Por favor, ingrese la cantidad de habitaciones que posee su propiedad">
            <input class="carac" type="text"  placeholder="Por favor, indique si su propiedad esta amoblada o no">
            <input class="carac" type="text"  placeholder="Por favor, indique la cantidad de metros cuadrados de su propiedad">
            <input class="carac" type="text" placeholder="¿Tiene estacionamiento? Responda con Si/No">
            <input class="carac" type="text" name="nombres" id="sector" placeholder="¿Tiene servicio de aseo? Responda con Si/No">
            <p>Revise que todos los datos son correctos</p>
                <input class="boton" type="submit" value="Publicar Propiedad">
          </section>

        </form>
    </div>

</body>

</html>