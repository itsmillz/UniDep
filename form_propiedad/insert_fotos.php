<!DOCTYPE html>
<html>

<head>
	<title>Subir Fotos Propiedad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/style.css">
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
		<div class="row" style="margin-top: 176px;">
			<div class="col-12" style="background-color: white; border-radius: 7px; margin-left: -35px ">
				<div class="margin-top:"><br><br>

					<h4 class="fotos_indexform">Selecciona las fotos de tu propiedad: </h4><br><br><br>
					<form method="post" enctype="multipart/form-data" action="../form_propiedad/file-upload.php">
						<div class="form-group">
							<label>Selecciona las imagenes que necesites: </label>
							<input type="file" name="image[]" class="form-control" multiple
								style="padding: 0.375rem 0.75rem;" required />
						</div>
						<input type="submit" name="submit" value="Subir Fotos" 
							style="margin-left: 1011px; margin-bottom: 44px; width: 100px; text-align: center; margin-top: -85px; height: 36px;
							background-color: #f4f4f4; border-radius: 3px">
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
					<table class="col-xs-7 table-bordered table-striped table-condensed table-fixed">
						<thead>
							<th class="col">id</th>
							<th class="col">Nombre imagen</th>
							<th class="col">id Propiedad</th>
							<th class="col">acciones</th>
						</thead>
						<tbody>
							<?php
							while($imagen = $resultado -> fetch_row()){ ?>
							<tr>
								<td>
									<?php echo $imagen[0] ?>
								</td>
								<td>
									<?php echo '<img src="images/'.$imagen[1]. '" width="200px" alt=""> ' ?>
								</td>
								<td>
									<?php echo $imagen[4] ?>
								</td>
								<td>
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
					<p class="w-50 alert alert-danger mt-2 m-auto">No hay imagen/es disponible/s</p><br><br><br>
					<?php     
						} ?>
					<br><br>
					<h1 class="fotos_indexform">Selecciona universidad/es vinculadas a tu propiedad:</h1>
					<br> <br>
					<form name="form-work" class="was-validated formulario w-100" action="../form_propiedad/file-upload.php" method="post" enctype="multipart/form-data">
						<input type="checkbox" id="ucsc" name="ucsc" value="ucsc">
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
						<a href="../index.php"><input id="boton" class="w3-panel w3-blue-grey w-100 m-auto" type="submit"
							name="submituniversidades" value="Enviar Publicación" style="margin: auto"></a>
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

</html>