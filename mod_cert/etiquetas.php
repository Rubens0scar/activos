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
    <div class="estilo_div" >
        <table><tr><td class="titulo">ETIQUETADO DE ACTIVOS</td></tr>            
            <tr><td class="subtitulo" style="text-align: center">Etiquetado de la Institución</td></tr>
        </table><br>
        
        <div id="nuevo" style="display: none;" class="estilo_subdiv">        
          
            <br>
        </div>
        <br>
        <div style='overflow-y:auto;width:95%;'>
           
<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();


 $consulta ="SELECT a.id_subg, ri.id_act, ri.gestion, a.od_clas_am
FROM csa.registro_activos ra 
inner join csa.registro_individual ri on ri.id_regact=ra.id_regact 
inner join csa.activo a on a.codigo=ri.id_act
order by ra.id_regact";
 $resultado =$db->query($consulta);
 $i=0;
 if($resultado->rowCount()>0){
 
	 foreach($resultado as $fila){
	 
?>
 <table width="90%" height="55" style="border:1px;" align="center">
            
            <tr bgcolor="#F2F9FF">   
            <td align="center" class="colDat"><?php echo $fila["od_clas_am"]; echo'-'; echo $fila["id_subg"]; echo'-'; echo $fila["id_act"]; echo'-'; echo $fila["gestion"];?></td>          
        </tr>
<?php
}
        
 }
 $db = null;
?>       
    </table>
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
