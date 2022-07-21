<?php
include '../db_connection/connection.php';
if(isset($_POST['submit'])){
	$extension=array('jpeg','jpg','png','gif');
	$rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
    if ($row = mysqli_fetch_row($rs)){
        $id = trim($row[0]);
		echo ("la id proveniente de la tabla imagen");
		echo $id;
	}
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);
		$finalimg='';
		if(in_array($ext,$extension)){
			if(!file_exists('images/'.$filename)){
				move_uploaded_file($filename_tmp, 'images/'.$filename);
				$finalimg=$filename;
			} else {
				$filename=str_replace('.','-',basename($filename,$ext));
				$newfilename=$filename.time().".".$ext;
				move_uploaded_file($filename_tmp, 'images/'.$newfilename);
				$finalimg=$newfilename;
			}
			$creattime=date('Y-m-d h:i:s');
			//insert
			$insertqry="insert into `multiple_images`(`image_name`, `image_createtime`,`id_propiedad`) values ('$finalimg','$creattime','$id')";
			mysqli_query($conn,$insertqry);
			header('Location: insert_fotos.php?id='.$id);
		}
	}




}
if(isset($_POST['submituniversidades'])){

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
		$rs = mysqli_query($conn, "select max(id_propiedad) from propiedad");
			if ($row = mysqli_fetch_row($rs)){
				$id = trim($row[0]);
				echo ("la id proveniente de la tabla imagen");
				echo $id;
			}

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

	header('Location:../index.php');
}


?>