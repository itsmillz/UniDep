<?php
	session_start();
	$usuario = "";
	if (isset($_SESSION['usuario'])) {
		$usuario = $_SESSION['usuario'];
	}else{
		header("Location: ../index.php");
	}
	ob_start();
	include ("../db_connection/connection.php");
	$id = $_POST["id"];

	$check = getimagesize($_FILES["imagen"]["tmp_name"]);
	if($check !== false){
		$image = $_FILES['imagen']['tmp_name']; //[imagen] es el nombre que le pusimos en el name en HTML en el formulario, y [tmp_name] recuperamos el nombre que tiene la imagen
		$imageContent =  addslashes(file_get_contents($image)); //extraerlo en bits
		$sql = "insert into multiple_images values (null, '$imageContent', $id)";
		$conn->query($sql);
	}
	echo "AKHSDHAHJDJHASS";
	header("Location: insert_fotos.php?id=$id");
?>