<?php
    ob_start();
        include("db_connection/connection.php");

        // Escapamos y limipiamos los datos recibidos.
        $desde = preg_replace('/[[A-Z]\[a-z]\-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['desde']));
        $hasta = preg_replace('/[[A-Z]\[a-z]\-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['hasta']));
        $banos = preg_replace('/[[A-Z]\[a-z]\-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['banos']));
        $habitaciones = preg_replace('/[[A-Z]\[a-z]\-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['habitaciones']));
        $amoblada = preg_replace('/[-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['amoblada']));
        $tipo = preg_replace('/[-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['tipo']));
        $gastoscomunesdesde = preg_replace('/[[A-Z]\[a-z]\-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['gastoscomunesdesde']));
        $gastoscomuneshasta = preg_replace('/[[A-Z]\[a-z]\-\+\*\=\&\%\#\$\@\.\;\" "]+/', '', mysqli_real_escape_string($conn, $_POST['gastoscomuneshasta']));

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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND precio <= '".$_POST['hasta']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND bano = '".$_POST['banos']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio >= '".$_POST['desde']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND bano = '".$_POST['banos']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND precio <= '".$_POST['hasta']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND bano = '".$_POST['banos']."'";
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
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND habitacion = '".$_POST['habitaciones']."'";
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['amoblada'] != '') {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND amoblada = '".$_POST['amoblada']."'";
                                            }
                                        }
                                    }
                                }else {
                                    if ($_POST['tipo'] != '') {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND tipo = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND tipo = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND tipo = '".$_POST['tipo']."'";
                                            }
                                        }
                                    }else {
                                        if ($_POST['gastoscomunesdesde'] != '') {
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                            }
                                        }else{
                                            if ($_POST['gastoscomuneshasta'] != '') {
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                            }else{
                                                $sql = "SELECT * FROM propiedad WHERE estado = '0'";
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
                echo "<p class='no-encontrado' style='margin-bottom:7px;color:rgb(95, 95, 95);width:900px;'>Se encontraron <span style='color:#4361ee;'>".$numero_resultados."</span> propiedades</p>";
        }
        if ($sql != "") { 
            $BAN = 0;
            while($all_listt = $sql_final->fetch_assoc()) { 
        ?>
            <a href="<?php echo 'buscador_filtros_listado/detalles_propiedad.php?id='.$all_listt['id_propiedad'].'' ?>" class="contenedor-arriendo">
                        <div class="imagen-arriendo">
                            <?php 
                                $consulta = 'SELECT * FROM multiple_images WHERE id_propiedad ='.$all_listt['id_propiedad'];
                                $resultado = $conn->query($consulta);
                                    while($uni = $resultado->fetch_assoc()){
                                    echo '<img width="400px" height="auto" src="data:image/jpg;base64,'.base64_encode($uni['imagen']).'"/>';
                                    break;
                                } 
                            ?>
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
                                    <div class="contenedor-fecha" style="margin: 8px 0;">
                                        <img width="16px" height="16px" style="margin-right: 2px;" src="../imagenes/caracteristicas/fecha.svg" alt="">
                                        <?php
                                            $fecha = strtotime($all_listt['fecha_publicacion']);
                                            $dia = date("d",$fecha);
                                            switch(date("m",$fecha)){
                                                case 1:
                                                    $mes = "enero";
                                                    break;
                                                case 2:
                                                    $mes = "febrero";
                                                    break;
                                                case 3:
                                                    $mes = "marzo";
                                                    break;
                                                case 4:
                                                    $mes = "abril";
                                                    break;
                                                case 5:
                                                    $mes = "mayo";
                                                    break;
                                                case 6:
                                                    $mes = "junio";
                                                    break;
                                                case 7:
                                                    $mes = "julio";
                                                    break;
                                                case 8:
                                                    $mes = "agosto";
                                                    break;
                                                case 9:
                                                    $mes = "septiembre";
                                                    break;
                                                case 10:
                                                    $mes = "octubre";
                                                    break;
                                                case 11:
                                                    $mes = "noviembre";
                                                    break;
                                                case 12:
                                                    $mes = "diciembre";
                                                    break;
                                            }
                                            $anio = date("Y",$fecha);
                                        ?>
                                        <p class="fecha-publicacion" style="font-size: 14px;">Publicado el <?php echo $dia; ?> de <?php echo $mes; ?> del <?php echo $anio; ?></p>
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
                                        <h2>$<?php echo number_format($all_listt['precio'], 0, ".", ".") ?> CLP</h2>
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
                        <div style="background-color: #fff;">
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
                                        <h2>$<?php echo number_format($all_listt['precio'], 0, ".", ".") ?> CLP</h2>
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
    ob_end_flush();
?>

