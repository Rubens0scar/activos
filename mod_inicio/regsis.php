
<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require_once("../mod_configuracion/clases/conexion.php");
require_once("../theme/header_inicio.php");
?>
<?php
?>
<!-- Content Center -->
<div id="centercontent" align="center">
<br />
<div class="titulo">Registros del Sistema</div>
<table width="200"  align="center" border="0" style="margin-top:50px; margin-bottom:50px;">
    <tr align="center">
		<td><a href="../mod_cert/departamentos.php"><img src="../theme/images/con1.jpg" width="250" height="180"/><strong>DEPARTAMENTOS</strong></a></td>
		<td><a href="../mod_cert/area.php"><img src="../theme/images/act (5).jpg" width="250" height="180" /><strong>AREAS</strong></a></td>
		<td><a href="../mod_cert/act_ind.php"><img src="../theme/images/imagenes22.jpg" width="250" height="180" /><strong>CLASIFICADOR DE ACTIVOS</strong></a></td>
	</tr><tr><td></td></tr>
	<tr align="center">
		<td><a href="../mod_cert/empresas_prov.php"><img src="../theme/images/act (3).jpg" width="250" height="180" /><strong>EMPRESAS PROVEEDORAS</strong></a></td>
		<td><a href="../mod_cert/tipo_cambio.php"><img src="../theme/images/cambio.png" width="250" height="180" /><strong>TIPO DE CAMBIO</strong></a></td>
		<!--<td><a href="../mod_cert/tipo_material.php"><img src="../theme/images/act (1).jpg" width="250" height="180" /><strong>TIPO DE MATERIAL</strong></a></td>-->
		<td><a href="../mod_cert/motivo_baja.php"><img src="../theme/images/act (4).jpg" width="250" height="180" /><strong>MOTIVO DE BAJA</strong></a></td>
	</tr>  
	</tr><tr><td></td></tr>
	<tr align="center">
		
		<td><a href="../mod_cert/gam.php"><img src="../theme/images/act (2).jpg" width="250" height="180" /><strong>GRUPO CONTABLE</strong></a></td>
	</tr>    
</table>

</div>

<?php
require("../theme/footer_inicio.php");
}
else
header('Location: ../index.php');    
?>
