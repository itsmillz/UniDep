<?php
        include("../db_connection/connection.php");
        if ($_POST['desde'] == '' && $_POST['hasta'] == '' && $_POST['banos'] == '' && $_POST['habitaciones'] == '' && $_POST['amoblado'] == '') {
            $sql = "";
        }else{
            if ($_POST['desde'] != '') {
                if ($_POST['hasta'] != '') {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND precio_arriendo <= '".$_POST['hasta']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_banos = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo >= '".$_POST['desde']."'";
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
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_banos = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE precio_arriendo <= '".$_POST['hasta']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else {
                    if ($_POST['banos'] != '') {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_banos = '".$_POST['banos']."'";
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($_POST['habitaciones'] != '') {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE cantidad_habitaciones = '".$_POST['habitaciones']."'";
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($_POST['amoblado'] != '') {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND tipo_propiedad = '".$_POST['tipo']."'";
                                        }
                                    }
                                }else {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE amoblado = '".$_POST['amoblado']."'";
                                        }
                                    }
                                }
                            }else {
                                if ($_POST['tipo'] != '') {
                                    if ($_POST['gastoscomunesdesde'] != '') {
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes >= '".$_POST['gastoscomunesdesde']."'";
                                        }
                                    }else{
                                        if ($_POST['gastoscomuneshasta'] != '') {
                                            $sql = "SELECT * FROM propiedad WHERE tipo_propiedad = '".$_POST['tipo']."' AND gastos_comunes <= '".$_POST['gastoscomuneshasta']."' ";
                                        }else{
                                            $sql = "SELECT * FROM propiedad WHERE tipo_propiedad = '".$_POST['tipo']."'";
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
                            <h2><?php echo $rowSql['sector_propiedad'] ?></h2>
                            <p class="descripcion-arriendo"><?php echo $rowSql['descripcion'] ?></p>
                        </div>
                        <hr>
                        <div class="contenido-secundario">
                            <p class="precio-arriendo">$<?php echo $rowSql['precio_arriendo'] ?> CLP</p>
                            <div class="caracteristicas-arriendo">
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/wifi.png" alt="">
                                    <p><?php echo $rowSql['cantidad_habitaciones'] ?> dorm</p>
                                </div>
                                <div class="caracteristica-arriendo">
                                    <img src="imagenes/wifi.png" alt="">
                                    <p><?php echo $rowSql['cantidad_banos'] ?> baños</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php } 
}
?>

