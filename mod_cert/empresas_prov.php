<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require("../theme/header_inicio.php");
?>
<script language="javascript">        
        function visibilidadDiv(id) {
            div = document.getElementById(id);
            document.getElementById("empresa").value='';
            document.getElementById("nit").value='';
            document.getElementById("direccion").value='';
            document.getElementById("fono").value='';
            document.getElementById("correo").value='';
            document.getElementById("contacto").value='';
            
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
<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();
if(!isset($_REQUEST["id"])){
?>
<form name="match_form" method="post" action="guardar.php?op=4">
    <center>
    <div class="estilo_div" >
	<div align="right"><a href="../mod_inicio/regsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/><strong>VOLVER</strong></a></div>
        <table><tr><td class="titulo">Empresas Proveedoras</td></tr>            
            <tr><td class="subtitulo" style="text-align: center">De la institución</td></tr>
        </table><br>
        <button type="button" class="button" onclick="javascript: visibilidadDiv('nuevo');">Registar Empresa</button><br><br>
        
        <div id="nuevo" style="display: none;" class="estilo_subdiv">        
            <center>
            <table>
                <tr><td colspan="2" class="subtitulo" style="text-align: center">Registrar</td></tr>
                <tr style="height: 10px"><td></td><td></td></tr>                
                <tr><td>Nombre Empresa: </td><td><input type="text" id="empresa" name="empresa" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required/></td></tr>
                <tr><td>NIT: </td><td><input type="text" id="nit" name="nit" style="height: 20px; width:82%; text-align: center;" maxlength="20" onkeypress="return soloNumeros(event)" class="inputs" required/></td></tr>
                <tr><td>Dirección: </td><td><input type="text" id="direccion" name="direccion" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required/></td></tr>
                <tr><td>Telefonos: </td><td><input type="text" id="fono" name="fono" style="height: 20px; width:82%; text-align: center;" maxlength="16" class="inputs" onkeypress="return soloNumerosg(event)" required/></td></tr>
                <tr><td>Correo: </td><td><input type="text" id="correo" name="correo" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required/></td></tr>
                <tr><td>Contacto: </td><td><input type="text" id="contacto" name="contacto" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required/></td></tr>
                <tr><td>&nbsp;</td><td><input type="radio" name="activo" value="true"  checked="checked"> Activo<br><input type="radio" name="activo" value="false"> Inactivo</td></tr>
            </table>
            </center>
            <br>
            <center>
                <input type="submit" value="GUARDAR" class="button">
                <input id="cancelar" type="button" value="cancelar" class="button" onclick="javascript: visibilidadDiv('nuevo');">
            </center>
            
            <br>
        </div>
        <br>
        <div style='overflow-y:auto;width:95%;'>
            <table width="90%" height="55" style="border:1px;" align="center">
            <tr bgcolor='#CCCFF1'>
	    <th class="colEnc">ID</th>
            <th class="colEnc">Nombre Empresa</th>
            <th class="colEnc">NIT</th>
            <th class="colEnc">Dirección</th>
            <th class="colEnc">Telefonos</th>
            <th class="colEnc">Correo</th>
            <th class="colEnc">Contacto</th>
            <th class="colEnc">Estado</th>
            <th class="colEnc" colspan="2">ACCIONES</th>
            </tr> 
<?php
 $consulta ="SELECT id_emp, empresa, nit, direccion, telefonos, correo, contacto, case estado when 'true' then 'ACTIVO' else 'NO ACTIVO' end estado FROM csa.empresas order by id_emp";
 $resultado =$db->query($consulta);
 $i=0;
 if($resultado->rowCount()>0){
 
	 foreach($resultado as $fila){
		$id = $fila[0];
		$i=$i+1;		
?>
            <tr bgcolor="#F2F9FF">   
            <th scope="row" class="colDat"><?php echo $fila["id_emp"];?></th>
            <td align="center" class="colDat"><?php echo $fila["empresa"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["nit"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["direccion"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["telefonos"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["correo"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["contacto"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
            <td align="center" class="colDat"><a href="empresas_prov.php?id=<?php echo $fila["id_emp"];?>"><img src="images/6.png" alt="" title="MODIFICAR" style="width: 20px; height: 20px"/></a></td>
            <!--<td align="center" class="colDat">MODIFICAR</td>-->
        </tr>
<?php
         }
 }
?>       
    </table>
        </div>       
        <br>
    </div>
    </center>
<?php
} else {
    $id=$_REQUEST["id"];
    $resultado ="SELECT empresa, nit, direccion, telefonos, correo, contacto, case estado when true then 1 else 0 end estado FROM csa.empresas WHERE id_emp=$id;";
    $resultado =$db->query($resultado);
    foreach($resultado as $fila){
        $empresa=$fila[0];
        $nit=$fila[1];
        $direccion=$fila[2];
        $telefonos=$fila[3];
        $correo=$fila[4];
        $contacto=$fila[5];
        $estado=$fila[6];
    }
?>
<form name="match_form" method="post" action="guardar.php?op=15&d=<?=$id?>">
    <center>
    <div class="estilo_div" >
        <table><tr><td class="titulo">Empresas Proveedoras</td></tr>            
            <tr><td class="subtitulo" style="text-align: center">De la institución</td></tr>
        </table><br>
        
        <div id="nuevo" class="estilo_subdiv">        
            <center>
            <table>
                <tr><td colspan="2" class="subtitulo" style="text-align: center">Modificar</td></tr>
                <tr style="height: 10px"><td></td><td></td></tr>                
                <tr><td>Nombre Empresa: </td><td><input type="text" id="empresa" name="empresa" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required value="<?=$empresa?>"/></td></tr>
                <tr><td>NIT: </td><td><input type="text" id="nit" name="nit" style="height: 20px; width:82%; text-align: center;" maxlength="20" onkeypress="return soloNumeros(event)" class="inputs" required value="<?=$nit?>"/></td></tr>
                <tr><td>Dirección: </td><td><input type="text" id="direccion" name="direccion" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required value="<?=$direccion?>"/></td></tr>
                <tr><td>Telefonos: </td><td><input type="text" id="fono" name="fono" style="height: 20px; width:82%; text-align: center;" maxlength="16" class="inputs" onkeypress="return soloNumerosg(event)" required value="<?=$telefonos?>"/></td></tr>
                <tr><td>Correo: </td><td><input type="text" id="correo" name="correo" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required value="<?=$correo?>"/></td></tr>
                <tr><td>Contacto: </td><td><input type="text" id="contacto" name="contacto" style="height: 20px; width:82%; text-align: center;" maxlength="60" class="inputs" required value="<?=$contacto?>"/></td></tr>
                <tr><td>&nbsp;</td><td><input type="radio" name="activo" value="true" <?=$estado==1?'checked':''?>> Activo<br><input type="radio" name="activo" value="false" <?=$estado==0?'checked':''?>> Inactivo</td></tr>
            </table>
            </center>
            <br>
            <center>
                <input type="submit" value="MODIFICAR" class="button">
                <a href="empresas_prov.php"><input id="cancelar" type="button" value="CANCELAR" class="button"></a>
            </center>
            
            <br>
        </div>
        <br>
              
        <br>
    </div>
    </center>
<?php
}
?>
</form>
<?php
$db = null;
require("../theme/footer_inicio.php");
}
else
header('Location: ../index.php');    
?>
