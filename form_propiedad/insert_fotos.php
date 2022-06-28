<!DOCTYPE html>
<html>
<head>
	<title>Subir Fotos Propiedad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
							<input type="file" name="image[]" class="form-control" multiple style="padding: 0.375rem 0.75rem;" required />
						</div>
						<input type="submit" name="submit" value="Enviar" class="btn btn-primary" style="margin-left: 1019px; margin-bottom: 15px; width: 89px; text-align: center; margin-top: -85px; height: 36px;">
					</form>
					<?php
						include '../db_connection/connection.php';
						$consulta = 'select * from multiple_images where id_propiedad ='.$id;
						$resultado = mysqli_query($conn, $consulta);
						$filas = mysqli_num_rows($resultado);
						if($filas){ ?>
						<table class="table table-hover">
							<thead>
								<th>id</th>
								<th>Nombre imagen</th>
								<th>id Propiedad</th>
								<th>acciones</th>
							</thead>
							<tbody>
							<?php
							while($imagen = $resultado -> fetch_row()){ ?>
								<tr>
									<td> <?php echo $imagen[0] ?> </td>
									<td> <?php echo '<img src="images/'.$imagen[1]. '" width="200px" alt=""> ' ?> </td>
									<td> <?php echo $imagen[4] ?> </td>
									<td> <?php echo "<a class='btn btn-danger' href='crud/delete.php?id=".$imagen[0]."&id_propiedad=".$id."'>Eliminar</a>"; ?> </td>
								</tr>
								<?php
							}?>
						</tbody>
						</table>
						<?php
						}else{ ?>
							<br>
							<p class="w-50 alert alert-danger mt-2 m-auto">No hay imagen/es disponible/s</p><br><br><br>
						<?php     
						} ?>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>