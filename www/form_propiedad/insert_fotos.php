<?php 
	session_start();
    $usuario = "";
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }else{
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
			<div class="col-12" style="background-color: white; border-radius: 7px; margin-bottom: 100px;">
				<div class="margin-top:">
					<h4 class="fotos_indexform">Seleccione las fotos de su propiedad: </h4>
					<div id="prompt"></div>
					<div class="contenedor-imagenes">
					<div class="card card-foto">
						<svg
							width="50"
							height="50"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							>
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z"
								fill="rgb(95, 95, 95)"
							/>
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7Z"
								fill="rgb(95, 95, 95)"
							/>
						</svg>
						<form method="POST" enctype="multipart/form-data" action="file-upload.php" id="form-imagen" class="form-imagen">
							<div> 
								<input class="input-imagen" type= "file" name="imagen" id="validacion_imagenes" onchange="verificarFoto()" required>
								<input type= "hidden" name= "id" value =<?php echo $id;?>>
							</div>
						</form>
					</div>
					<?php
					include '../db_connection/connection.php';
					$total = 0;
					$consulta = 'select * from multiple_images where id_propiedad ='.$id;
					$resultado = $conn->query($consulta);
					$total = mysqli_num_rows($resultado);
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
				</div>
				<a class="boton-filtro completar-info" style="color:white; user-select: none; " id="completar" onclick="verificarEnviar(<?php echo $total; ?>)">Publicar propiedad</a>
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
<script src="../js/validacion_imagen.js"></script>
</html>