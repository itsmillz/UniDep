<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Propiedad</title>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../Estilos/estilos.css">
        <link rel="stylesheet" href="form.css">
        <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
        <!-- <script src="js/formulario.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        

</head>

<body>
    <div class="main-container">
        <header class="main-header" id="main-header" >
            <div class="img-container">
                <img src="../imagenes/UniDep.jpg" alt="">
            </div>
            <nav class="navegacion">
                <ul class="ul">
                    <img src="../imagenes/perfil-del-usuario.png" alt="">
                    <li><a href="prueba.php"><button>Publicar propiedad</button></a></li>
                </ul>
            </nav>
        </header>
    
        <div class="contain">
            <?php if(!empty($statusMsg)){ ?>
                <p class="status-msg"><?php echo $statusMsg; ?></p>
            <?php } ?>
            <!-- <p>Registro de las características de su propiedad</p> -->
            <h1 class="h1">Registro de las características de su propiedad</h1>
            <form name="form-work" class="was-validated formulario " action="../crud_propiedad/insert_propiedad.php" method="post" enctype="multipart/form-data">
                <!-- <section class="form-registro" style="margin-top: 176px"> -->
                    
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="sector">Sector propiedad: </label>
                        <input class=" form-control" type="text" placeholder="Ingrese sector de su propiedad" name="sector" required>
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="precio">Precio propiedad: </label>
                        <input class="form-control" type="number" placeholder="Ingrese el precio de arriendo" name="precio"
                            required>
                    </div>
                    <br>

                    <!-- opciones multiples para elegir tipo de alojamiento -->
                    <div class="col-12 mb-2 mt-2">
                        
                        <label class="form-label" for="propiedad">Tipo de alojamiento: </label>
                        <select class="form-control" required name="tipo" id="">
                                <option value="">Seleccione el tipo de alojamiento/propiedad</option>
                                <option value="Departamento">Departamento</option>
                                <option value="Casa">Casa</option>
                                <option value="Habitación">Habitación</option>
                                <option value="Pensión">Pensión</option>
                        </select>
                    </div>

                    <!-- Alternativa diferente de multiples opciones de alojamiento (usar en caso de que la anterior falle) -->


                    <!-- <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="amoblada">Tipo de alojamiento: </label>    
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="tipo" value="Departamento" >Departamento
                            <label class="form-check-label" for="radio1"></label>
                            
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="tipo" value="Casa">Casa
                            <label class="form-check-label" for="radio2"></label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="tipo" value="Habitacióon" >Habitación
                            <label class="form-check-label" for="radio1"></label>
                            
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="tipo" value="Pensión" >Pensión
                            <label class="form-check-label" for="radio1"></label>
                            
                        </div>
                    
                    </div> -->
                    
                    <!-- (HASTA AQUÍ) Alternativa diferente de multiples opciones de alojamiento (usar en caso de que la anterior falle) -->


                    <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="baño">Baños de su propiedad: </label>
                        <input class="form-control" type="number"
                            placeholder=" Ingrese cantidad de baño/s que posee su propiedad" name="baño" required>
                    </div>
                    <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="habitacion">Habitaciones de su propiedad: </label>
                        <input class="form-control" type="number" placeholder=" Ingrese la cantidad de habitaciones que posee su propiedad" name="habitacion" required>
                    </div>
                    <br>
                    
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="superficie">Cantidad de superficie propiedad: </label>
                        <input class="form-control" type="number" placeholder=" Indique metros cuadrados aproximados" name="superficie" required>
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="amoblada">¿Propiedad amoblada?: </label>
                    
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="amoblado" value="Sí" > Sí
                            <label class="form-check-label" for="radio1"></label>
                            
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="amoblado" value="No">No
                            <label class="form-check-label" for="radio2"></label>
                        </div>
                    <br>
                    </div>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="superficie">¿Tiene estacionamiento?: </label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="estacionamiento" value="Sí" > Sí
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="estacionamiento" value="No">No
                            <label class="form-check-label" for="radio2"></label>

                        </div>
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="servicio_aseo">¿Tiene servicio de aseo?: </label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="servicio_aseo" value="Sí" > Sí
                            <label class="form-check-label" for="radio1"></label>
                            
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="servicio_aseo" value="No">No
                            <label class="form-check-label" for="radio2"></label>
                        </div>
                    </div>
                <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="gastos_comunes">Gastos comunes: </label>
                        <input class="form-control" type="number" placeholder="Ingrese precio de gastos comunes" name="gastos_comunes" required>
                    </div>
                    <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="descripcion">Breve descripción del alojamiento: </label>
                        <textarea maxlength="200" name="descripcion" class="form-control"  placeholder="Describa algunos detalles del alojamiento" required ></textarea>                       
                        <!-- <div class="invalid-feedback">Descripción breve</div>  -->
                        <br>
                        <h2 style="font-size: 1rem;">Carácteres restantes: </h2><h3 style="font-size: 1rem; margin-top:-27px; margin-left:148px"> 200</h3>
                    </div>






                    
                    <p class="estilo_universidades">Seleccione universidad:</p>
                    <?php include("../conexion_bd/conexion.php");?> 
                    <div class="col-12 mb-2 mt-2">
                        <?php
                        
                            $sql = "select * from universidad order by nombre_universidad";
                            $resultado = mysqli_query($conn, $sql);
                            $filas = mysqli_num_rows($resultado);
                            if($filas){
                                while($universidad = $resultado->fetch_row()){
                        ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check"value="<?php $universidad[0];?>"
                                id="flexCheckChecked">
                            <!-- <label class="form-check-label" for="flexCheckChecked"> -->    
                            <label class="form-check-label">
                                <?php echo $universidad[1]?>
                            </label>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <br><br><p class="alert alert-warning text-center ">Revise que todos los datos sean correctos</p>
                    <div class="w-100 row">
                    <input class="btn btn-success w-75 m-auto" type="submit" name="submit" value="Continuar">
                    <input class="btn btn w-75 m-auto" type="reset" value="Reiniciar el formulario">
                    </div>
            </form>
        </div>
    </div>
    <script src="contador_caracteres.js"></script>
</body>
</html>
