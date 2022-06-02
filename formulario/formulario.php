<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Propiedad</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>

<body>
    <!-- <div> -->
    
    <header id="main-header">
        <div class="img-container">
            <img src="imagenes/UniDep.jpg" alt="">
        </div>
        <nav class="navegacion">
            <ul class="ul">
                <img src="imagenes/perfil-del-usuario.png" alt="">
                <li><a href="prueba.php"><button>Publicar propiedad</button></a></li>
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
        <form class="was-validated">
        <section class="form-registro">
            <p>Registro de las características de su propiedad</p>
            <div class="col-12 mb-2 mt-2">
            <label class="form-label" for="sector">Sector Propiedad</label>
            <input class=" form-control" type="text" placeholder="Por favor, ingrese sector de su propiedad" name="sector" required>
            <div class="invalid-feedback">Por favor, ingrese sector de su propiedad.</div>
            </div>

            <div class="col-12 mb-2 mt-2">
            <label class="form-label" for="sector">Precio Propiedad</label>





            <input class="carac" type="number"  placeholder="Por favor, ingrese el precio de arriendo">
            <input class="carac" type="text"  placeholder="Por favor, indique si su propiedad es casa o departamento">
            <input class="carac" type="number" placeholder="Por favor, ingrese cantidad de baño/s que posee su propiedad">
            <input class="carac" type="text" placeholder="Por favor, ingrese la cantidad de habitaciones que posee su propiedad">
            <input class="carac" type="text"  placeholder="Por favor, indique si su propiedad esta amoblada o no">
            <input class="carac" type="text"  placeholder="Por favor, indique la cantidad de metros cuadrados de su propiedad">
            <input class="carac" type="text" placeholder="¿Tiene estacionamiento? Responda con Si/No">
            <input class="carac" type="text" name="nombres" id="sector" placeholder="¿Tiene servicio de aseo? Responda con Si/No">
            
            <p>Seleccione universidad:</p>
            <?php include("../conexion_bd/conexion.php");?>
            <div class="col-12 mb-2 mt-2">
            
                <?php
                    
                    $sql = "select * from UNIVERSIDAD order by nombre_universidad";
                    $resultado = mysqli_query($conn, $sql);
                    $filas = mysqli_num_rows($resultado);
                    if($filas){
                        while($universidad = $resultado->fetch_row()){
                            ?>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?php $universidad[0];?>" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                            <?php echo $universidad[1] ?>
                        </label>
            </div>
                            <?php
                        }
                    }
                ?>
            
            </div>





            <p>Revise que todos los datos sean correctos</p>
                <input class="boton" type="submit" value="Publicar Propiedad">
          </section>
 






        </form>
    </div>

</body>

</html>