
           
            <?php ob_start(); ?>

 <br><br><center><table style="margin: 0 auto;"><tr><th class="titulo">CLASIFICADOR DIRECTORIO Y FUNCIONARIOS</th></tr>            
            <tr><td class="subtitulo" style="text-align: center">Reporte General</td></tr>
     </table></center><br><br>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
			<table  border="0.1" style="text-align:center; font-size:10px">

					<tr>
						<th>N°</th>
						<th>Codigo de Departamento</th>
						<th>Nombre de Departamento</th>
						<th>Codigo de Area</th>
						<th>Nombre del Area</th>
						<th>Codigo de Cargo</th>
						<th>C. I.</th>
						<th>Nombre</th>
						<th>Cargo</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Estado</th>
                                                <th>Codigo de Ubicacion</th>
					</tr>

<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();


 $consulta ="SELECT d.id_dpto, cd_cnt_dpto, d.nom_dpto, a.cd_cnt_area, a.nom_area, p.cd_ubicacion, p.ci_personal, p.nom_personal,  p.paterno_personal,  p.materno_personal, p.cargo_personal, p.dir_personal, p.fn_personal, p.estado, p.cd_ubi3 
FROM csa.personal p, csa.departamento d, csa.area a 
WHERE p.estado=true and d.cd_cnt_dpto=a.id_dpto and a.id_area=p.id_area
order by a.id_area";
 $resultado =$db->query($consulta);
 $i=0;
 if($resultado->rowCount()>0){
 
	 foreach($resultado as $fila){
		$id = $fila[0];
		$i=$i+1;		
?>
            <tr>
                <td><?php echo $i; ?></td>
             <td><?php echo $fila["cd_cnt_dpto"]; ?></td>
            <td><?php echo $fila["nom_dpto"]; ?></td>
             <td><?php echo $fila["cd_cnt_area"]; ?></td>
			 <td><?php echo $fila["nom_area"]; ?></td>
            <td><?php echo $fila["cd_ubicacion"]; ?></td>
			 <td><?php echo $fila["ci_personal"]; ?></td>
            <td><?php echo $fila["nom_personal"]; echo ' '; echo $fila["paterno_personal"]; echo ' '; echo $fila["materno_personal"];?></td>
            <td><?php echo $fila["cargo_personal"]; ?>    </td>
            <td><?php echo $fila["dir_personal"]; ?></td>
			<td><?php echo $fila["fn_personal"]; ?></td>
           <td><?php echo $fila["estado"]; ?></td>     
			<td><?php echo $fila["cd_cnt_dpto"]; echo '.'; echo $fila["cd_cnt_area"]; echo '.'; echo $fila["cd_ubicacion"]; ?>         </td>
        </tr>
<?php
         }
 }
 $db = null;
?>      
    </table>
            <?php
require_once("../dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->set_paper("letter", $orientation = "landscape");
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Reporte_Personal".date('Y-m-d').'.pdf';
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>