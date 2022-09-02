<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
	if (!$usuario) {
		header("Location: ../index.php");
	}
?>
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
            <div class="contenedor-nav" style="width:100%;">
            <?php 
                if ($usuario) {
            ?>
                <nav class="navegacion">
                    <p style="margin:0;">@<?php echo $usuario; ?></p>
                    <a class="boton-principal-logout" href='salir.php'><svg
                        width="25"
                        height="23"
                        viewBox="0 0 23 23"
                        fill="white"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z"
                            fill="white"
                        />
                        <path
                            d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z"
                            fill="white"
                        />
                        </svg>
                    </a>
                </nav>
            <?php } ?>
        </div>
	</header>
	<div class="segundo-container">
            <div class="contenedor-titulos">
                <h1>Registra las características de tu propiedad</h1>
            </div>
    </div>
	<div class="container">
		<p><a href=""></a></p>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 70px;">
			<div class="col-12" style="background-color: white; border-radius: 7px;">
				<div class="margin-top:">

					<h4 class="fotos_indexform">Seleccione las fotos de su propiedad: </h4>
					<form method="POST" enctype="multipart/form-data" action="file-upload.php" class="form-cont-fotos">
						<label class="titulo-filtro-individual" style="margin-left: 5px;">Seleccione, si lo desea, las imágenes que necesite: </label>
						<div class="form-fotos"> 
							<input type= "file" name="imagen" id="validacion_imagenes" required="" class="input-general btn-fotos form-control select file-input">
							<input type= "hidden" name= "id" value =<?php echo $id;?>>
							<input type= "submit" name= "submit" id= "boton_upload" value= "Subir Fotos" class="boton-arrendar btn-fotos">
						</div>
					</form>
					<div id="prompt"></div>


					<div class="contenedor-imagenes">
					<?php
					include '../db_connection/connection.php';
					$consulta = 'select * from multiple_images where id_propiedad ='.$id;
					$resultado = $conn->query($consulta);
					while($imagen = $resultado->fetch_assoc()){ ?>
						<!-- Listado de fotos -->
						<div class="card">
							<div class="card-details">
								<button class="imagen"><?php echo '<img width="240" height="280px" src="data:image/jpg;base64,'.base64_encode($imagen['imagen'] ).'"/>';  ?></button>
							</div>
							<a class="card-button"href="<?php echo 'crud/delete.php?id='.$imagen["image_id"].'&id_propiedad='.$id.'' ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="white"/><path d="M9 9H11V17H9V9Z" fill="white" /><path d="M13 9H15V17H13V9Z" fill="white" /></svg></a>
						</div>
					<?php } ?>
					</div>
					
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
										<label class="alertas-mensajes">
											<?php echo $universidad["nombre_universidad"]?>
										</label>
									</div>
									
								<?php
								}
							}
						?>
						<div style="width:100%; display:flex; justify-content:center; margin-top:15px;">
							<input id="boton" style="cursor:pointer; width: 100%;" class="boton-arrendar btn-fotos" type="submit"
							name="submituniversidades" value="Enviar Publicación" style="margin: auto">
						</div>
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