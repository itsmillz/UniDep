<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Propiedad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main-container">
        <header class="main-header">
            <div class="img-logo">
                <a href="../index.php"><img src="../imagenes/UniDep.jpg" alt=""></a>
            </div>
        </header>
        <div class="contain">
            <?php if(!empty($statusMsg)){ ?>
                <p class="status-msg"><?php echo $statusMsg; ?></p>
            <?php } ?>
            <h1 class="h1">Registro de las características de su propiedad</h1>
            <form name="form-work" class="was-validated formulario" action="insert_propiedad.php" method="post" enctype="multipart/form-data">
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="sector">Dirección propiedad: </label>
                    <input id= "direccion" class=" form-control" type="text" placeholder="Ingrese sector de su propiedad" name="sector" required autocomplete="off">
                    <p id="mensaje"></p>
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="precio">Precio propiedad: </label>
                    <input class="form-control" type="number" placeholder="Ingrese el precio de arriendo" name="precio" min="0" max="999999" required>
                    <div class="invalid-feedback">Ingrese un precio mayor a cero</div> 
                </div>
                <br>
                <!-- opciones multiples para elegir tipo de alojamiento -->
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="propiedad">Tipo de alojamiento: </label>
                    <select class="form-control" required name="tipo" id="">
                        <option value="">Seleccione el tipo de alojamiento/propiedad</option>
                        <option value="Departamento">Departamento</option>
                        <option value="Casa">Casa</option>
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
                    <input class="form-control" type="number" placeholder=" Ingrese cantidad de baño/s que posee su propiedad" name="baño" required min="0" max="99">
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="habitacion">Habitaciones de su propiedad: </label>
                    <input class="form-control" type="number" placeholder=" Ingrese la cantidad de habitaciones que posee su propiedad" name="habitacion" required min="0" max="99">
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="superficie">Cantidad de superficie propiedad: </label>
                    <input class="form-control" type="number" placeholder=" Indique metros cuadrados aproximados" name="superficie" required min="0" max="9999">
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
                    </div
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
                    <input class="form-control" type="number" placeholder="Ingrese precio de gastos comunes" name="gastos_comunes" required min="0" max="99999">
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="form-label" for="descripcion">Breve descripción del alojamiento: </label>
                    <textarea maxlength="280" name="descripcion" class="form-control"  placeholder="Describa algunos detalles del alojamiento" required ></textarea>                       
                    <br>
                    <h2 style="font-size: 1rem;">Carácteres restantes: </h2><h3 style="font-size: 1rem; margin-top:-27px; margin-left:148px"> 280</h3>
                </div>
                <p class="estilo_universidades">Seleccione universidad:</p>
                <?php include("../db_connection/connection.php");?> 
                <div class="col-12 mb-2 mt-2">
                    <?php
                        $sql = "select * from universidad order by nombre_universidad";
                        $resultado = mysqli_query($conn, $sql);
                        $filas = mysqli_num_rows($resultado);
                        if($filas){
                            while($universidad = $resultado->fetch_row()){ ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="check"value="<?php $universidad[0];?>" id="flexCheckChecked">
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
                    <input class="btn btn-success w-75 m-auto" type="submit" name="submit" value="Continuar" id="boton">
                    <input class="btn btn w-75 m-auto" type="reset" value="Reiniciar el formulario">
                </div>
            </form>
        </div>
    </div>
    <script src="../js/contador_caracteres.js"></script>
    <script src="../js/validar_direccion.js"></script>
</body>
</html>
