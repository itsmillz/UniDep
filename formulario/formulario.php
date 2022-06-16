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
                        <input class=" form-control" type="text" placeholder="Ingrese sector de su propiedad" name="sector"
                            required>
                        <!-- <div class="invalid-feedback">Por favor, ingrese sector de su propiedad.</div> -->
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="precio">Precio propiedad: </label>
                        <input class="form-control" type="number" placeholder="Ingrese el precio de arriendo" name="precio"
                            required>
                        <!-- <div class="invalid-feedback">Ingrese precio.</div> -->
                    </div>
                    <br>


                    <div class="col-12 mb-2 mt-2">
                        
                        <label class="form-label" for="propiedad">Tipo propiedad: </label>
                        <!--
                        <input class="form-control" type="text" placeholder="Indique si su propiedad es casa o departamento" name="tipo"
                            name="tipo" required>
                        -->
                        <select class="form-control" required name="" id="">
                                <option value="">Seleccione un tipo de propiedad</option>
                                <option value="1">Habitación</option>
                                <option value="2">Casa</option>
                                <option value="3">Departamento</option>
                                <option value="4">Pensión</option>
                        </select>
                        <!-- <div class="invalid-feedback">Ingrese tipo de propiedad.</div> -->
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="baño">Baños de su propiedad: </label>
                        <input class="form-control" type="number"
                            placeholder=" Ingrese cantidad de baño/s que posee su propiedad" name="baño" required>
                        <!-- <div class="invalid-feedback">Ingrese cantidad de baños.</div> -->
                    </div>
                    <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="habitacion">Habitaciones de su propiedad: </label>
                        <input class="form-control" type="number"
                            placeholder=" Ingrese la cantidad de habitaciones que posee su propiedad" name="habitacion" required>
                        <!-- <div class="invalid-feedback">Ingrese cantidad de habitaciones.</div> -->
                    </div>
                    <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="amoblada">¿Propiedad amoblada?: </label>
                        <!--
                        <input class="form-control" type="boolean" placeholder=" Indique si es amoblada o no" name="amoblada" required>-->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="optradio" value="option1" > Si
                            <label class="form-check-label" for="radio1"></label>
                            
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">No
                            <label class="form-check-label" for="radio2"></label>
                            <!-- <div class="invalid-feedback">Por favor marque una opción</div> -->
                        </div>
                    
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="superficie">Cantidad de superficie propiedad: </label>
                        <input class="form-control" type="number" placeholder=" Indique metros cuadrados aproximados" name="superficie" required>
                        <!-- <div class="invalid-feedback">Indicar superficie propiedad</div> -->
                    </div>
                    <br>
                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="superficie">¿Tiene estacionamiento?: </label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="optradio" value="option1" > Si
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">No
                            <label class="form-check-label" for="radio2"></label>
                            <!-- <div style="left:0 ;" class="invalid-feedback">Por favor marque una opción</div> -->
                        </div>
                        <br>
                    </div>


                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="servicio_aseo">¿Tiene servicio de aseo?: </label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" required="required" name="optradio" value="option1" > Si
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">No
                            <label class="form-check-label" for="radio2"></label>
                            <!-- <div class="invalid-feedback">Por favor marque una opción</div> -->
                        </div>
                        <br>
                    </div>


                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="gastos_comunes">Gastos comunes: </label>
                        <input class="form-control" type="text" placeholder="Ingrese precio de gastos comunes" name="gastos_comunes" required>
                        <!-- <div class="invalid-feedback">Indicar los gastos comunes</div> -->
                    </div>
                    <br>

                    <div class="col-12 mb-2 mt-2">
                        <label class="form-label" for="descripcion">Describa la propiedad: </label>
                        <textarea name="descripcion" class="form-control"  placeholder=" Indique otras características si lo estima necesario" required ></textarea>
                        <!-- <div class="invalid-feedback">Descripción breve de su propiedad</div> -->
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
                            <label class="form-check-label" for="flexCheckChecked">
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
                        <input class="btn btn-success w-75 m-auto" type="submit" name="submit" value="Siguiente"> 
                    </div>
            </form>
        </div>
    </div>
</body>
</html>
