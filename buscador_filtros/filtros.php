<?php
        include("db_connection/connection.php");

        // Escapamos y limipiamos los datos recibidos.
        $desde = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['desde']))));
        $hasta = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['hasta']))));
        $banos = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['banos']))));
        $habitaciones = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['habitaciones']))));
        $amoblada = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['amoblada']))));
        $tipo = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['tipo']))));
        $gastoscomunesdesde = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['gastoscomunesdesde']))));
        $gastoscomuneshasta = strip_tags(htmlspecialchars(trim(mysqli_real_escape_string($conn, $POST_['gastoscomuneshasta']))));

        // Guardamos nuevamente los valores.
        $POST_['desde'] = $desde;
        $POST_['hasta'] = $hasta;
        $POST_['banos'] = $banos;
        $POST_['habitaciones'] = $habitaciones;
        $POST_['amoblada'] = $amoblada;
        $POST_['tipo'] = $tipo;
        $POST_['gastoscomunesdesde'] = $gastoscomunesdesde;
        $POST_['gastoscomuneshasta'] = $gastoscomuneshasta;

        // Aplicamos los filtros según corresponda.
        if ($_POST['desde'] == '' && $_POST['hasta'] == '' && $_POST['banos'] == '' && $_POST['habitaciones'] == '' && $_POST['amoblada'] == '') {
            $sql = "";
        }else{
            if ($_POST['desde'] != '') {
                if ($_POST['hasta'] != '') {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio >= '".$_POST['desde']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else {
                if ($_POST['hasta'] != '') {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio <= '".$_POST['hasta']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE bano = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE habitacion = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblada'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblada = '".$_POST['amoblada']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE tipo = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($sql != "") {
            $sql_final = $conn->query($sql);
            $numero_resultados = mysqli_num_rows($sql_final);
        }
?>
<?php if ($sql != "") { $BAN = 0;?>
    <?php while($rowSql = $sql_final->fetch_assoc()) { ?>
                <div class="contenedor-arriendo">
                    <div class="imagen-arriendo">
                        <img src="imagenes/depto.png" alt="">
                    </div>
                    <div class="contenido-arriendo">
                        <div class="contenido-principal">
                            <div class="universidad-calificacion">
                                <?php
                                    // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                    $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$rowSql['id_propiedad']."";
                                    $res = $conn->query($sql_universidad);
                                    echo "<div class='listado_universidad'>";
                                    while($uni = $res->fetch_assoc()){
                                        echo "<p> ".$uni['nombre_universidad']." </p>";
                                    }
                                    echo "</div>";
                                ?>
                                <div class="calificacion">
                                                <img src="imagenes/estrella.png" alt="">
                                                <p><strong>4.6</strong></p>
                                </div>
                            </div>
                            <h2><?php echo $rowSql['sector'] ?></h2>
                            <p class="descripcion-arriendo"><?php echo $rowSql['descripcion'] ?></p>
                        </div>
                        <hr>
                        <div class="contenido-secundario">
                            <p class="precio-arriendo">$<?php echo number_format($rowSql['precio'],0,",","."); ?> CLP</p>
                            <div class="caracteristicas-arriendo">
                                <div class="caracteristica-arriendo">
                                    <img style="margin-right: 6px;" src="imagenes/cama.png" alt="">
                                    <p><?php echo $rowSql['habitacion'] ?> dorm</p>
                                </div>
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/bano.png" alt="">
                                    <p><?php echo $rowSql['bano'] ?> baños</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php } 
}
?>

