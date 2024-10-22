<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require("../theme/header_inicio.php");
?>
<script language="javascript">        
        function visibilidadDiv(id) {
            div = document.getElementById(id);
            document.getElementById("completo").value='';
            document.getElementById("simple").value='';
            document.getElementById("des").value='';
            document.getElementById("anio").value='';
            document.getElementById("porcentaje").value='';
            
            if (div.style.display == "block") {
                div.style.display = "none";
            } else {
                div.style.display = "block";
            }
        }
</script>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>DataTables example - Zero configuration</title>
	<link rel="stylesheet" type="text/css" href="../theme/css/jquery.dataTables.css">

	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="../theme/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable();
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
</style>
<script type="text/javascript">
function imprSelec(imprime)
{var ficha=document.getElementById(imprime);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>
<br><br><br><br>
    <center>
   <a href="javascript:imprSelec('imprime')"><img src="../theme/images/print.png" width="30" height="30"/ align="right"></a>
  <div id="imprime" style='overflow-y:auto;width:95%;'>
        <table><tr><td class="titulo">CLASIFICADOR DIRECTORIO Y FUNCIONARIOS</td></tr>            
            <tr><td class="subtitulo" style="text-align: center">Reporte General</td></tr>
        </table><br>
        
        <div id="nuevo" style="display: none;" class="estilo_subdiv">        
          
            <br>
        </div>
        <br>
        <div style='overflow-y:auto;width:100%;'>
           <!-- <table width="90%" height="55" style="border:1px;" align="center">
            <tr bgcolor='#CCCFF1'>
            <th class="colEnc">N°</th>
			<th class="colEnc">Código Departamento</th>
			<th class="colEnc">Nombre de Departamento</th>
			<th class="colEnc">Código Área</th>
			<th class="colEnc">Nombre de Área</th>
			<th class="colEnc">Código de cargo</th>
			<th class="colEnc">C.I.</th>			
            <th class="colEnc">Nombre</th>
			<th class="colEnc">Cargo</th>
			<th class="colEnc">Dirección</th>
			<th class="colEnc">Teléfono</th>
			<th class="colEnc">Estado</th>
            <th class="colEnc">Código de Ubicación</th>
            </tr> -->
            <?php ob_start(); ?>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>N°</th>
						<th>Codigo de Departament</th>
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
				</thead>
				<tbody>
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
            <tr><th><?php echo $i; ?></th>
             <th><?php echo $fila["cd_cnt_dpto"]; ?></th>
			 <th><?php echo $fila["nom_dpto"]; ?></th>
             <th><?php echo $fila["cd_cnt_area"]; ?></th>
			 <th><?php echo $fila["nom_area"]; ?></th>
            <th><?php echo $fila["cd_ubicacion"]; ?></th>
			 <th><?php echo $fila["ci_personal"]; ?></th>
            <th><?php echo $fila["nom_personal"]; echo ' '; echo $fila["paterno_personal"]; echo ' '; echo $fila["materno_personal"];?></th>
            <th><?php echo $fila["cargo_personal"]; ?></th>       
            <th><?php echo $fila["dir_personal"]; ?></th>
			<th><?php echo $fila["fn_personal"]; ?></th>
           <th><?php echo $fila["estado"]; ?></th>     
			<th><?php echo $fila["cd_cnt_dpto"]; echo '.'; echo $fila["cd_cnt_area"]; echo '.'; echo $fila["cd_ubicacion"]; ?></th>         
        </tr>
<?php
         }
 }
 $db = null;
?>       </tbody>
    </table>
            <p><a class="button" href="listado_personalpdf.php">Reporte PDF</a></p>
        </div>       
        <br>
</div>
    </center>

<?php
require("../theme/footer_inicio.php");
}
else
header('Location: ../index.php');
?>
