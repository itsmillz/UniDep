<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
	if (!$usuario) {
		header("Location: ../index.php");
	}
?>
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
<body onLoad="limpiarform">
    <div class="main-container">
        <header class="main-header">
            <div class="img-logo">
                <a href="../index.php"><img src="../imagenes/UniDep.jpg" alt=""></a>
            </div>
        </header>
        <div class="segundo-container">
            <div class="contenedor-titulos">
                <h1>Registra las características de tu propiedad</h1>
            </div>
        </div>
        <div class="contain">
            <!-- Boton de volver hacía atras -->
            <?php if(!empty($statusMsg)){ ?>
                <p class="status-msg"><?php echo $statusMsg; ?></p>
            <?php } ?>
            <form name="form-work" class="was-validated formulario" action="insert_propiedad.php" id="formulario" method="post" enctype="multipart/form-data">
                <div class="cont-volver">
                    <div class="volver-inicio-atras" style="width: 100%">
                        <a class="volver-atras" style="text-decoration: none; margin-right: 8px;" href="../index.php" style="margin-right: 8px;">&#171; Inicio</a>
                        <a class="volver-atras" style="text-decoration: none;" href="<?=$_SERVER["HTTP_REFERER"]?>"> &#171; volver atrás</a>
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="sector">Dirección propiedad: </label>
                    <input id="direccion" class="input-general" type="text" placeholder="Ingrese sector de su propiedad" name="sector" required autocomplete="off">
                    <p id="mensaje" class="alertas-mensajes"></p>
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="precio">Precio propiedad: </label>
                    <input class="input-general" id="precio" type="number" placeholder="Ingrese el precio de arriendo" name="precio" min="0" max="999999" required>
                    <div class="invalid-feedback alertas-mensajes">Ingrese un precio mayor a cero y menor a 1 millón</div> 
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="telefono">Teléfono: </label>
                    <input class="input-general" id="numero" maxlength="12" minlength="9" type="text" placeholder="+56900000000" name="telefono" required>
                    <div class="invalid-feedback alertas-mensajes">Ingrese un telefono valido</div> 
                </div>
                <p id="mensajeNumero" class="alertas-mensajes"></p>
                <br>
                <!-- opciones multiples para elegir tipo de alojamiento -->
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="propiedad">Tipo de alojamiento: </label>
                    <select class="input-general select" required name="tipo" id="select_tipo">
                        <option value="" selected>Seleccione el tipo de alojamiento/propiedad</option>
                        <option value="Departamento">Departamento</option>
                        <option value="Casa">Casa</option>
                    </select>
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="baño">Baños de su propiedad: </label>
                    <input class="input-general" type="number" placeholder=" Ingrese cantidad de baño/s que posee su propiedad" name="baño" required min="0" max="99">
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="habitacion">Habitaciones de su propiedad: </label>
                    <input class="input-general" type="number" placeholder=" Ingrese la cantidad de habitaciones que posee su propiedad" name="habitacion" required min="0" max="99">
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="superficie">Cantidad de superficie propiedad: </label>
                    <input class="input-general" type="number" placeholder=" Indique metros cuadrados aproximados" name="superficie" required min="0" max="9999">
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="amoblada">¿Propiedad amoblada?: </label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" required="required" name="amoblado" value="Sí" > 
                        <label class="titulo-filtro-individual" style="color:black;" for="radio1">Sí</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="amoblado" value="No">
                        <label class="titulo-filtro-individual" style="color:black;" for="radio2">No</label>
                    </div>
            </br>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="superficie">¿Tiene estacionamiento?: </label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" required="required" name="estacionamiento" value="Sí" >
                        <label class="titulo-filtro-individual" style="color:black;" for="radio1">Sí</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="estacionamiento" value="No">
                        <label class="titulo-filtro-individual" style="color:black;" for="radio2">No</label>
                    </div>
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="servicio_aseo">¿Tiene servicio de aseo?: </label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" required="required" name="servicio_aseo" value="Sí" >
                        <label class="titulo-filtro-individual" style="color:black;" for="radio1">Sí</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="servicio_aseo" value="No">
                        <label class="titulo-filtro-individual" style="color:black;" for="radio2">No</label>
                    </div>
                </div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="gastos_comunes">Gastos comunes: </label>
                    <input class="input-general" type="number" placeholder="Ingrese precio de gastos comunes" name="gastos_comunes" required min="0" max="99999">
                </div>
                <br>
				<div class="col-12 mb-2 mt-2">
                <label class="titulo-filtro-individual" for="gastos_comunes">Seleccione las universidades cercanas: </label>
					<?php
                        include("../db_connection/connection.php");
						$sql = "select * from universidad order by nombre_universidad";
						$resultado = mysqli_query($conn, $sql);
						$filas = mysqli_num_rows($resultado);
						if($filas){
							while($universidad = $resultado->fetch_assoc()){ ?>
								<div class="form-check" style="padding: 0;">
									<input class="" type="checkbox" name="universidades[]" value="<?php echo $universidad["id_universidad"]?>" >
									<label class="alertas-mensajes" style="color: black;">
										<?php echo $universidad["nombre_universidad"]?>
									</label>
								</div>
							<?php
							}
						}
					?>
				</div>
                <br>
                <div class="col-12 mb-2 mt-2">
                    <label class="titulo-filtro-individual" for="descripcion">Breve descripción del alojamiento: </label>
                    <textarea maxlength="280" name="descripcion" class="input-general textarea" placeholder="Describa algunos detalles del alojamiento" required ></textarea>                       
                    <br>
                    <div>
                    <h2 id="h2" class="alertas-mensajes"></h2><h3 class="alertas-mensajes" style="font-size: 1rem; margin-top:-27px; margin-left:164px">280</h3>
                </div>
                <br><br><p class="alert alert-warning text-center titulo-filtro-individual">Revise que todos los datos sean correctos</p>
                <div class="w-100 row">
                    <input class="btn w-75 m-auto boton-principal-add" name="enviarFormulario" onclick="seguridadNumero()" value="Continuar" id="boton">
                    <input class="btn btn w-75 m-auto titulo-filtro-individual" type="reset" value="Reiniciar el formulario">
                </div>
            </form>
        </div>
    </div>
    <script src="../js/contador_caracteres.js"></script>
    <script src="../js/validar_direccion.js"></script>
    <script src="../js/caracteristicas_especiales.js"></script>
    <script>
        function limpiarForm(){
            document.form-work.reset();
        }
    </script>
</body>
</html>
