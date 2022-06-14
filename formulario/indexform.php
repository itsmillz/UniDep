<!DOCTYPE html>
<html>
<head>
	<title>Multiple Image Upload</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php
	$id='';
	if($_GET['id']){
		$id = $_GET['id'];
	}



	?>
<div class="container">
<div class="row">
<div class="col-12">
	<h4>Subir imagenes de la propiedad: </h4>
	<hr>
	<form method="post" enctype="multipart/form-data" action="../formulario/file-upload.php">
		<div class="form-group">
			<label>Selecciona todas las imagenes que necesites: </label>
			<input type="file" name="image[]" class="form-control" multiple />
		</div>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
	</form>
	<table class="table table-hover" >
		<thead>
			<th>id</th>
			<th>imagen</th>
			<th>acciones</th>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<!-- <td><img src="images/Alexis_Texas_2017.jpg" alt=""></td> -->
				<td><a href="" class="btn btn-danger">Eliminar</a></td>
			</tr>
			<?php
			include '../conexion_bd/conexion.php';
			$consulta = 'select * from multiple_images where id_propiedad ='.$id;
			$resultado = mysqli_query($conn, $consulta);
			$filas = mysqli_num_rows($resultado);
			if($filas){
				while($imagen = $resultado -> fetch_row()){
					?>
					<tr>
						<td> <?php echo $imagen[0] ?>     </td>
						<td><?php echo $imagen[1] ?></td>
						
						<td>  <?php echo '<img src="data:images/'.$imagen[1].' alt="">'  ?>     </td>
						<td> <?php echo $imagen[2] ?>     </td>
						<td> <?php echo $imagen[3] ?>     </td>  
					</tr>
					<?php 
					


				}
				
			}else{
				?>
				<p class="w-50 alert alert-danger  m-auto">No hay imagen/es disponible/s</p>
				<?php     
			}

			?>
		</tbody>
	</table>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>