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
    <?php while($all_listt = $sql_final->fetch_assoc()) { ?>
        <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo">
                <div class="imagen-arriendo">
                        <img src="imagenes/depto.png" alt="">
                </div>
                <div class="contenido-arriendo">
                        <!-- Información principal: universidades, dirección, descripción -->
                        <div class="contenido-principal">
                            <div class="universidades">
                                <ul>
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        while($uni = $res->fetch_assoc()){
                                            echo "<li class='listado_universidad'>";
                                                echo "<img class='svg-caracteristicas' src='imagenes/caracteristicas/school-outline.svg'></img>";
                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                            echo "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <h2 class="direccion-titulo"><?php echo $all_listt['sector'] ?></h2>
                            <div class="contenedor-descripcion">
                                <p><?php echo $all_listt['descripcion'] ?></p>
                            </div>
                        </div>
                        <!-- Información secundaria: precio, caracteristicas -->
                        <div class="contenido-secundario">
                            <hr class="separador-primario-secundario">
                            <div class="contenedor-caracteristica">
                                <h2>$<?php echo $all_listt['precio'] ?> CLP</h2>
                                <div class="contenido-caracteristica">
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/zona.png" alt="">
                                        <p><?php echo $all_listt['superficie'] ?> m<sup>2</sup></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                </div>
        </a>
        <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo-movil">
                <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),url('imagenes/depto.png');background-size:cover;background-position: center;">
                    <!-- Información principal: universidades, dirección, descripción -->
                    <div class="contenido-principal">
                            <div class="universidades">
                                <ul>
                                    <?php
                                        // Extraemos todas las universidades vinculadas a esa propiedad en especifico.
                                        $sql_universidad = "SELECT DISTINCT nombre_universidad FROM tiene_2 INNER JOIN universidad ON universidad.id_universidad=tiene_2.id_universidad WHERE tiene_2.id_propiedad = ".$all_listt['id_propiedad']."";
                                        $res = $conn->query($sql_universidad);
                                        while($uni = $res->fetch_assoc()){
                                            echo "<li class='listado_universidad'>";
                                                echo "<img class='svg-caracteristicas' src='imagenes/caracteristicas/school-outline.svg'></img>";
                                                echo "<p> ".$uni['nombre_universidad']." </p>";
                                            echo "</li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <h2 class="direccion-titulo"><?php echo $all_listt['sector'] ?></h2>
                            <div class="contenedor-descripcion">
                                <p><?php echo $all_listt['descripcion'] ?></p>
                            </div>
                    </div>
                    <div class="contenido-arriendo">
                        <!-- Información secundaria: precio, caracteristicas -->
                        <div class="contenido-secundario">
                            <hr class="separador-primario-secundario">
                            <div class="contenedor-caracteristica">
                                <h2>$<?php echo $all_listt['precio'] ?> CLP</h2>
                                <div class="contenido-caracteristica">
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bano.png" alt="">
                                        <p><?php echo $all_listt['bano'] ?> baños</p>
                                    </section>
                                    <section class="caracteristica">
                                        <img src="imagenes/caracteristicas/bed-outline.svg" alt="">
                                        <p><?php echo $all_listt['habitacion'] ?> habitaciones</p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </a>
    <?php } 
}
?>

