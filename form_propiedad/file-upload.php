<?php
include ("../db_connection/connection.php");

	// echo "sidssdds";
	
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
		// echo $id;
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if($check !== false){
            $image = $_FILES['imagen']['tmp_name']; //[imagen] es el nombre que le pusimos en el name en HTML en el formulario, y [tmp_name] recuperamos el nombre que tiene la imagen
            $imageContent =  addslashes(file_get_contents($image)); //extraerlo en bits
			
        }
        $sql = "insert into multiple_images values (null, '$imageContent', $id)";
		$conn->query($sql);
		// echo $sql;      

        header("Location: insert_fotos.php?id=$id");
		
    }





// if(isset($_POST['submit'])){
// 	$extension=array('jpeg','jpg','png', 'webp');
// 	$rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
//     if ($row = mysqli_fetch_row($rs)){
//         $id = trim($row[0]);
// 		// echo ("la id proveniente de la tabla imagen");
// 		// echo $id;
		
// 		echo ("Por favor, retroceda y suba las imágenes con los formatos siguientes : jpeg, jpg, png, gif o webp");
// 		header("Location:".$_SERVER[HTTP_REFERER]."");
// 		echo '<script language="javascript">alert("Por favor, retroceda y suba las imágenes con los formatos siguientes: jpeg, jpg, png, gif o webp");</script>';
// 	}
		
// 		foreach ($_FILES['image']['tmp_name'] as $key => $value) {
// 			$filename=$_FILES['image']['name'][$key];
// 			$filename_tmp=$_FILES['image']['tmp_name'][$key];
// 			echo '<br>';
// 			$ext=pathinfo($filename,PATHINFO_EXTENSION);
// 			$finalimg='';
// 			if(in_array($ext,$extension)){
// 				if(!file_exists('images/'.$filename)){
// 					move_uploaded_file($filename_tmp, 'images/'.$filename);
// 					$finalimg=$filename;
// 				} else {
// 					$filename=str_replace('.','-',basename($filename,$ext));
// 					$newfilename=$filename.time().".".$ext;
// 					move_uploaded_file($filename_tmp, 'images/'.$newfilename);
// 					$finalimg=$newfilename;
// 				}
// 				$creattime=date('Y-m-d h:i:s');
// 				//insert
// 				$insertqry="insert into `multiple_images`(`image_name`, `image_createtime`,`id_propiedad`) values ('$finalimg','$creattime','$id')";
// 				mysqli_query($conn,$insertqry);
// 				header('Location: insert_fotos.php?id='.$id);
// 			}
// 		}
	
	
// 	//recorremos con un for el array de las imágenes para despues subirlas a la base de datos
	




// }
//print_r($_POST["submituniversidades"]);
if(!empty($_POST["universidades"])){
		
	    /*
		$ucsc="";
		$uss="";
		$udp="";
		$upacifico="";
		$utfsm="";
		$incacap="";
		$unab="";
		$ust="";
		$duocan="";
		$duoc="";
		$udd="";
		$udec="";
		$ubb="";
		*/
		$id_propiedad = "";
		$rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
			if ($row = mysqli_fetch_row($rs)){
				$id_propiedad = trim($row[0]);
				
			}
			echo "id propiedad = $id_propiedad";
			foreach($_POST["universidades"] as $id_universidad){
				$SQL = "insert into tiene_2 values ($id_universidad , $id_propiedad)";
				// echo $SQL;
				$conn -> query($SQL);
				
			}
/*
if(isset($_POST['ucsc'])){
	$ucsc = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (1, $id)";
	$conn->query($ucsc);
	}

if(isset($_POST['uss'])){
	$uss = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (2, $id)";
	$conn->query($uss);
	}

if(isset($_POST['udp'])){
	$udp = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (3, $id)";
	$conn->query($udp);
	}
		
if(isset($_POST['upacifico'])){
	$upacifico = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (4, $id)";
	$conn->query($upacifico);
	}

if(isset($_POST['utfsm'])){
	$utfsm= "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (5, $id)";
	$conn->query($utfsm);
	}
				
if(isset($_POST['inacap'])){
	$inacap = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (6, $id)";
	$conn->query($inacap);
	}

if(isset($_POST['unab'])){
	$unab = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (7, $id)";
	$conn->query($unab);
	}
						
if(isset($_POST['ust'])){
	$ust = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (8, $id)";
	$conn->query($ust);
}

if(isset($_POST['duocan'])){
	$duocan = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (9, $id)";
	$conn -> query($duocan);
	}
								
if(isset($_POST['duoc'])){
	$duoc = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (10, $id)";
	$conn->query($duoc);
	}

if(isset($_POST['udd'])){
	$udd = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (11, $id)";
	$conn->query($udd);
	}

if(isset($_POST['udec'])){
	$udec = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (12, $id)";
	$conn->query($udec);
	}
	
if(isset($_POST['ubb'])){
	$ubb = "insert into `tiene_2` (`id_universidad`, `id_propiedad`) values (13 , $id )";
	$conn->query($ubb);
}
*/
	header('Location:../index.php');
}


?>