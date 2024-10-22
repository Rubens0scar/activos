
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de activos</title>
        <link rel="stylesheet" href="../theme/css/style.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="../theme/css/superfish.css" media="screen">
                <script type="text/javascript" src="../theme/js/jQuery.js"></script>
                <script type="text/javascript" src="../theme/slide/slide.js"></script>
                <!--<script type="text/javascript" src="../theme/js/funciones.js"></script>-->
                <script type="text/javascript" src="../theme/js/hoverIntent.js"></script>
                <script type="text/javascript" src="../theme/js/superfish.js"></script>
                <script type="text/javascript" src="../mod_cert/js/jquery-1.3.2.min.js"></script>
                <!-- <script type="text/javascript" src="../mod_cert/js/combos.js"></script>-->
                <!--<script src="../mod_cert/js/jquery-ui.js" type="text/javascript"></script>-->
                <script src="../mod_cert/js/calendarDateInput.js" type="text/javascript"></script>
                <script src="../mod_cert/js/fondo.js" type="text/javascript"></script>
                <script src="../mod_cert/js/jquery.datetimepicker.full.js" type="text/javascript"></script>
                <script src="../mod_usuarios/js/jquery-2.2.3.min.js" type="text/javascript"></script>
                </head>
                <?php
                ?>
                <body>
                    <table id="header" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="666">
                                            <div style="position:absolute; width:345px; top:43px; background:url(../theme/images/cn-bg.gif); left: 1px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="1"><img src="../theme/images/logo.jpg" alt="" width="61" height="61" class="logo"/></td>
                                                        <td class="company_name"><center>"SISTEMA DE INFORMACIÓN PARA EL CONTROL Y SEGUIMIENTO DE ACTIVOS FIJOS - SICSAF"</center></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="slogan">
                                                <div style="position:absolute; top:10px; left:550px; margin-left:-400px; width:681px; height:25px; font-size:25px; color:#000; font-family:'Courier New', Courier, monospace;">
                                                    <marquee direction="left" width="100%" scrollamount="7">
                                                        <span class="Estilo9"><?php echo "BIENVENID@ " . $_SESSION["nombres"] . " " . $_SESSION["apaterno"] . " AL SICSAF DEL RESTAURANTE SABOR GAUCHO"; ?></span>
                                                    </marquee></div>
                                            </div>
                                            <img src="../theme/images/con7.jpg" alt="" width="666" height="178"></td>	
											<td width="442">&nbsp;</td>										
                                        
                                    </tr>
                                </table></td>
                        </tr>
                    </table>

                    <!-- Menu -->
                    <div id="navigator">
                        <ul class="sf-menu">
                            <li class="current">
                                <a href="">Inicio</a>
                                <ul>
                                    <li>
                                        <a href="../mod_inicio/index.php">Principal</a>
                                    </li>
                                    <li>
                                        <a href="../mod_inicio/logout.php">Salir</a>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="">Gestión</a>
                                <ul>
                                    <li>
                                        <a href="#">Personal</a>
                                        <ul>
                                            <li><a href="../mod_usuarios/reg_personal.php">Registro de Personal</a></li>
                                            <li><a href="../mod_usuarios/reg_personal_1.php">Registro de Usuarios y Permisos</a></li>
                                        </ul>
                                    </li>		
                                    <li>
                                        <a href="#">Tablas del Sistema</a>
                                        <ul>
                                            <li><a href="../mod_cert/tipo_cambio.php">Tipo de Cambio de Dólares y UFVS</a></li>
                                            <li><a href="../mod_cert/departamentos.php">Registro de Departamento</a></li>
                                            <li><a href="../mod_cert/area.php">Registro de Área</a></li>
                                            <li><a href="../mod_cert/empresas_prov.php">Registro de Empresas</a></li>
                                            <li><a href="../mod_cert/motivo_baja.php">Registro de Motivo de Baja</a></li>
                                            <li><a href="../mod_cert/gam.php">Registro de Grupo Contable de Activos</a></li>
                                            <li><a href="../mod_cert/act_ind.php">Registro de Clasificador de Activos</a></li>							
                                        </ul>
                                    </li>					
                                </ul>			
                            </li>
                            <li>
                                <a href="#">Registro</a>
                                <ul>
                                    <li><a href="#">Registrar de Activo(s)</a>
                                        <ul>
                                            <li><a href="../mod_cert/activos.php">Registro de Activos</a></li>
                                            <li><a href="../mod_cert/asignacion.php">Formulario de Registro - Nuevo Activo Registrado</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Asignación</a>
                                        <ul>
                                            <li><a href="../mod_cert/asignacion.php">Registro de Asignación</a></li>
                                            <li><a href="../mod_cert/rep_asignacion.php">Formulario de Asignación - Activos puestos e custodia de un funcionario para su trabajo</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Devolución</a>
                                        <ul>
                                            <li><a href="../mod_cert/devolucion.php">Registrar de Devolución</a></li>
                                            <li><a href="../mod_cert/rep_devolucion.php">Formulario de Devolución - Activos devueltos por el funcionario</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Transferencia</a>
                                        <ul>
                                            <li><a href="../mod_cert/transf.php">Registrar de Transferencia</a></li>
                                            <li><a href="../mod_cert/rep_transferencia.php">Formulario de Transferencia - Activos puestos en custodia de otro funcionario</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Baja</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Reportes</a>
                                <ul>
                                    <li><a href="#">Tablas</a>
                                        <ul>
                                            <li><a href="../mod_inicio/reportes.php?op=5">Tipos de Cambio de Dólar y UFV</a></li>
                                            <li><a href="../mod_inicio/reportes.php?op=1">Departamentos</a></li>
                                            <li><a href="../mod_inicio/reportes.php?op=2">Áreas</a></li>
                                            <li><a href="../mod_cert/listado_personal.php">Personal</a></li>
                                            <li><a href="../mod_inicio/reportes.php?op=3">Clasificador Gral. de Activos Fijos</a></li>
                                            <li><a href="../mod_inicio/reportes.php?op=8">Grupos Contables</a></li>
                                            <li><a href="../mod_inicio/reportes.php?op=4">Empresas Proveedoras</a></li>
                                            <li><a href="../mod_inicio/reportes.php?op=7">Motivos Baja de Activos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Formulario</a>
                                        <ul>
                                            <li><a href="../mod_cert/listado_personal.php">Reitera cualquier formulario con el número de formularios</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Activos</a>
                                        <ul>
                                            <li><a href="../mod_cert/listado.php">Reporte General de Activos según Intérvalo de Fechas</a></li>
                                            <li><a href="../mod_cert/reportegam.php">Reporte Extendido de Activos según Intérvalo de Fechas y Grupo Contable</a></li>
                                            <li><a href="../mod_cert/reportecomfac.php">Reporte Extendido de Activos según Intérvalo de Fechas y Subgrupo</a></li>
                                            <li><a href="#">Reporte Extendido de Activos según Nombre del Funcionario</a></li>
                                            <li><a href="#">Historial de un Activo Fijo</a></li>
                                            <li><a href="#">Reporte Activos con Revalorización</a></li>
                                        </ul>
                                    </li>  
                                    <li><a href="../mod_cert/etiquetas.php">Etiquetas</a>
                                        
                                    </li>                          
                                </ul>
                            </li>
                            <li><a href="#">Ayuda</a>
                                <ul>
                                    <li><a href="#">Manual de Uso</a></li>
                                    <li><a href="#">Estructura del Sistema</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- Final del menu -->
