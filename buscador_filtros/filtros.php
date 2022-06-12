<?php
    include("../conexion_bd/conexion.php");
    if ($_POST['desde'] == '' && $_POST['hasta'] == '' && $_POST['banos'] == '' && $_POST['habitaciones'] == '' && $_POST['amoblado'] == '') {
        $sql = "SELECT * FROM propiedad";
    }else{
        $sql = "SELECT * FROM propiedad";
        echo "<h1>ENTRO</h1>";
        if ($_POST['desde'] != '') {
            $sql .= " AND precio_arriendo >= '".$_POST['desde']."' ";
        }
        if ($_POST['hasta'] != '') {
            $sql .= " AND precio_arriendo <= '".$_POST['hasta']."' ";
        }
        if ($_POST['banos'] != '') {
            echo "<h1>cantidad baños: ".$_POST['banos']."</h1>";
            $sql .= " AND cantidad_banos = '".$_POST['banos']."' ";
        }
        if ($_POST['habitaciones'] != '') {
            echo '';
            $sql .= " AND cantidad_habitaciones = '".$_POST['habitaciones']."' ";
        }
        if ($_POST['amoblado'] != '') {
            $sql .= " AND amoblado = '".$_POST['amoblado']."' ";
        }
    }
    echo $sql;
    $sql_final = $conn->query($sql);
    $numero_resultados = mysqli_num_rows($sql_final);
?>
<p><?php echo $numero_resultados ?> Resultados encontrados</p>
<?php while($rowSql = $sql_final->fetch_assoc()) {?>
    <h2><?php echo $rowSql['sector_propiedad'] ?></h2>
<?php } ?>