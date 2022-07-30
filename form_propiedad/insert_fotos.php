<!DOCTYPE html>
<html>

<head>
	<title>Subir Fotos Propiedad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/style.css">
	<script src="../js/jquery-3.6.0.min.js"></script>
</head>

<body>
	<?php
		$id='';
		if($_GET['id']){
			$id = $_GET['id'];
		}
	?>
	<header class="main-header">
		<div class="img-logo">
			<a href="../index.php"><img src="../imagenes/UniDep.jpg" alt=""></a>
		</div>
	</header>
	<div class="container">
		<p><a href=""></a></p>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 70px;">
			<div class="col-12" style="background-color: white; border-radius: 7px;">
				<div class="margin-top:">

					<h4 class="fotos_indexform">Seleccione las fotos de su propiedad: </h4>
					<form method="post" enctype="multipart/form-data" action="../form_propiedad/file-upload.php">
					<label>Seleccione, si lo desea, las imágenes que necesite: </label>
						<div class="w-100 d-flex">
							<input type="file" name="image[]" multiple="" style="padding: 0.375rem 0.75rem;" required="" class="form-control">
							<input type="submit" name="submit" value="Subir Fotos" style="border:2px; background-color: #3F9D25" class="border boton_fotos btn btn-light text-white">	
						</div>
					</form>



					<?php
						include '../db_connection/connection.php';
						$consulta = 'select * from multiple_images where id_propiedad ='.$id;
						$resultado = mysqli_query($conn, $consulta);
						$filas = mysqli_num_rows($resultado);
						if($filas){ ?>


					<div class="outer-wrapper">
    				<div class="table-wrapper">
					<!-- <div class="row"> -->
					<table class="col-xs-7 table-bordered table-striped table-condensed table-fixed w-100">
						<thead>
							<!-- <th class="col">id</th> -->
							<th class="col titulo-tabla">Imagen</th>
							<!-- <th class="col">id Propiedad</th> -->
							<th class="col titulo-eliminar">¿Desea eliminar?</th>
						</thead>
						<tbody>
							<?php
							while($imagen = $resultado -> fetch_row()){ ?>
							<tr>
								<td class="list_image">
									<?php echo '<img src="images/'.$imagen[1]. '" width="200px" alt=""> ' ?>
								</td>
								<td class="list_button">
									<?php echo "<a class='btn btn-danger' href='crud/delete.php?id=".$imagen[0]."&id_propiedad=".$id."'>Eliminar</a>"; ?>
								</td>
							</tr>
							<?php
							}?>
						</tbody>
					</table>
					<!-- </div> -->
					</div>
					</div>

					<?php
						}else{ ?>
					<br>
					<p class="w-50 alert alert-danger mt-2 m-auto border-0">¡Oh, vaya!... parece que todavía no has subido ninguna imagen :(</p>
					<?php
						} ?>
					
					<h1 class="fotos_indexform">Seleccione al menos una universidad cercana a su propiedad:</h1>
					
					<form name="form-work" id="form" class="was-validated formulario w-100" action="../form_propiedad/file-upload.php" method="post" enctype="multipart/form-data">
						
					<?php include("../db_connection/connection.php");?> 
					<div class="col-12 mb-2 mt-2">
						<?php
							$sql = "select * from universidad order by nombre_universidad";
							$resultado = mysqli_query($conn, $sql);
							$filas = mysqli_num_rows($resultado);
							if($filas){
								
								while($universidad = $resultado->fetch_assoc()){ ?>
									<div class="form-check">
										<input class="" type="checkbox" name="universidades[]" value="<?php echo $universidad["id_universidad"]?>" >
										<label class="">
											<?php echo $universidad["nombre_universidad"]?>
										</label>
									</div>
									
								<?php
								}
							}
						?>
						<div style="width:100%; display:flex; justify-content:center; margin-top:15px;">
							<input id="boton" style="cursor:pointer" class="color_boton w3-panel w-75 m-auto text-black pt-1 pb-1 rounded" type="submit"
							name="submituniversidades" value="Enviar Publicación" style="margin: auto">
						</div>
						
						<!-- <input type="checkbox" id="ucsc" name="ucsc" value="ucsc">
						<label>Universidad Católica de la Santísima Concepción</label><br>

						<input type="checkbox" id="uss" name="uss" value="uss">
						<label>Universidad San Sebastián</label><br>

						<input type="checkbox" id="udp" name="udp" value="udp">
						<label>Universidad Diego Portales</label><br>

						<input type="checkbox" id="upacifico" name="upacifico" value="upacifico">
						<label>Universidad del Pacífico</label><br>

						<input type="checkbox" id="utfsm" name="utfsm" value="utfsm">
						<label>Universidad Técnica Federico Santa María</label><br>

						<input type="checkbox" id="inacap" name="inacap" value="inacap">
						<label>INACAP - Universidad Tecnológica de Chile</label><br>

						<input type="checkbox" id="unab" name="unab" value="unab">
						<label>Universidad Andrés Bello</label><br>

						<input type="checkbox" id="ust" name="ust" value="ust">
						<label>Universidad Santo Tomás</label><br>

						<input type="checkbox" id="duocan" name="duocan" value="duocan">
						<label>Duoc UC: Sede San Andrés De Concepción</label><br>

						<input type="checkbox" id="duoc" name="duoc" value="duoc">
						<label>Instituto Profesional DUOC UC</label><br>

						<input type="checkbox" id="udd" name="udd" value="udd">
						<label>Universidad del Desarrollo</label><br>

						<input type="checkbox" id="udec" name="udec" value="udec">
						<label>Universidad de Concepción</label><br>

						<input type="checkbox" id="ubb" name="ubb" value="ubb">
						<label>Universidad del Bío-Bío</label><br>
						<br>
						-->
					</form> 
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
		 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
		 crossorigin="anonymous"></script>
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
</body>
<script src="../js/validar_checkbox.js"></script>
</html>