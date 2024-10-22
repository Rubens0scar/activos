<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require("../theme/header_inicio.php");
?>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Sistema Activos</title>
	<link rel="stylesheet" type="text/css" href="../theme/css/jquery.dataTables.css">

	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="../theme/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" class="init">
	

$(document).ready(function() {
	$('#resultado').DataTable();
} );


	</script>
<style>
    .button{
        border: 1px solid #DBE1EB;
        font-size: 14px;
        font-family: Arial, Verdana;
        padding-left: 7px;
        padding-right: 7px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        -o-border-radius: 4px;
        background: #4972B5;
        background: linear-gradient(left, #4972B5, #618ACB);
        background: -moz-linear-gradient(left, #4972B5, #618ACB);
        background: -webkit-linear-gradient(left, #4972B5, #618ACB);
        background: -o-linear-gradient(left, #4972B5, #618ACB);
        color: #FFFFFF;
    }

    .button:hover{
        background: #365D9D;
        background: linear-gradient(left, #365D9D, #436CAD);
        background: -moz-linear-gradient(left, #365D9D, #436CAD);
        background: -webkit-linear-gradient(left, #365D9D, #436CAD);
        background: -o-linear-gradient(left, #365D9D, #436CAD);
        color: #FFFFFF;
        border-color: #FBFFAD;
    }
    .estilo_div{
        border:solid 10px #ccc;
        border-radius:15px;
        box-shadow: 8px 8px 10px 0px #818181;
        width:850px;
    }
    .titulo{
        font-family: algerian;
        color: #001459;
	font-size: 180%;
    }
    .subtitulo{
        font-family: algerian;
	/*color: lightblue;*/
        color: #001459;
	font-size: 120%;
    }

    .estilo_subdiv{
        border:solid 3px #ccc;
        border-radius:15px;
        width:450px;
    }
    .inputs{
        float: none;
	padding: 0px;
	font-size: small;
        font-family: verdana;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
	border: 1px solid rgb(182, 182, 182);
	color: rgb(51,51,51);
    }
    
    .colEnc{
        display: table-cell;
        padding: 5px;
        font-family: monospace; 
        font-size: 14px;
        color: #063b82;
        background: #CED4D9;
    }
    .colDat{
        display: table-cell;
        padding: 5px;
        font-family: monospace; 
        font-size: 14px;
        color: #063b82;
    }
</style><br><br><br><br>
    <center>
  
        <table><tr><td class="titulo">ASIGNACIÓN DE ACTIVOS</td></tr></table>
        <form action="asigna_activo.php" method="post">
			<table id="resultado" class="display" width="90%" height="55" style="border:1px;" align="center">
				<thead>
					<tr bgcolor='#CCCFF1'>
						<th class="colEnc">N°</th>
						<th class="colEnc">Nombre del Activo</th>
						<th class="colEnc">Codigo</th>
						<th class="colEnc">Descripcion</th>
						<th class="colEnc">Marca</th>
						<th class="colEnc">Modelo</th>
						<th class="colEnc">Serie</th>
						<th class="colEnc">Estado</th>
						<th class="colEnc">Observaciones</th>
						<th class="colEnc">Asignacion</th>
					</tr>
				</thead>
				<tfoot>
					<tr bgcolor='#CCCFF1'>
						<th align="center" class="colDat">N°</th>
						<th align="center" class="colDat">Nombre del Activo</th>
						<th align="center" class="colDat">Codigo</th>
						<th align="center" class="colDat">Descripcion</th>
						<th align="center" class="colDat">Marca</th>
						<th align="center" class="colDat">Modelo</th>
						<th align="center" class="colDat">Serie</th>
						<th align="center" class="colDat">Estado</th>
						<th align="center" class="colDat">Observaciones</th>
						<th align="center" class="colDat">Asignacion</th>
					</tr>
				</tfoot>
				<tbody>
					
<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();

$cantidad = "SELECT id_act,count(id_act) AS total FROM csa.registro_individual group by id_act";
$res =$db->query($cantidad); 
$cant= $res->rowCount();
$id_act = $cant["id_act"];
$id_pers=$_GET["id_personal"];

 $consulta ="SELECT ga.gc_cnta_sp, ri.id_act, ri.id_regind, a.nombre, ri.gestion, ri.descripcion_act, ri.marca, ri.modelo, ri.serie, e.est_tec, ri.observaciones, ra.n_adjuntos
FROM csa.registro_individual ri, csa.activo a, csa.estado_activo e, csa.registro_activos ra, csa.gam ga
WHERE ri.estado=true and ri.id_act=a.codigo and ri.estado_activo=e.id_estado and ri.id_regact=ra.id_regact and ra.id_cam=ga.id_gam and ri.estado_asignacion=0 order by ri.id_regind";
 $resultado =$db->query($consulta);
 $i=0;
 if($resultado->rowCount()>0){
	 foreach($resultado as $fila){
	 
		$id = $fila[0];	
		$i=$i+1;		
?>
            <tr>
                <th align="center" class="colDat"><?php echo $i; ?></th>
            <th align="center" class="colDat"><?php echo $fila["nombre"]; ?></th>
            <th align="center" class="colDat"><?php echo "CSA-"; echo $fila["gc_cnta_sp"]; echo "-"; echo $fila["id_act"]; echo "-"; echo $fila["id_regind"]; echo "-"; echo $fila["gestion"]; ?></th>
            <th align="center" class="colDat"><?php echo $fila["descripcion_act"]; ?></th>
            <th align="center" class="colDat"><?php echo $fila["marca"]; ?></th>
            <th align="center" class="colDat"><?php echo $fila["modelo"]; ?></th>
			<th align="center" class="colDat"><?php echo $fila["serie"]; ?></th>
            <th align="center" class="colDat"><?php echo $fila["est_tec"]; ?></th> 
            <th align="center" class="colDat"><?php echo $fila["observaciones"]; ?></th> 
            <th align="center" class="colDat"><input type="checkbox" name="asignados[]" value="<?php echo $fila["id_regind"]; ?>">
					</th></tr>
				<?php
         }

 }
 $db = null;
?>   
</tbody>
    </table>
            <input type="hidden" name="id_persona" value="<?php echo $id_pers;?>" />
            <center>Observaciones</center>
            <textarea rows="10" cols="50" type="text" name="observaciones"></textarea>
            <br><input type="submit" name="btnasignar" value="Asignar"/>
        </form>       
    </center>

<?php
require("../theme/footer_inicio.php");
}
else
header('Location: ../index.php');
?>
