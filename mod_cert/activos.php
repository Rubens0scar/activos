<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require("../theme/header_inicio.php");
?>
<script language="javascript">
    $(document).ready(function() {   
        $("#costo").change(function(){
            var a = $("#costo").val();
            var cr=(13*a)/100;
            var costo_sin_cr = a-cr;
            $("#cr").val(cr);
            $("#costo_sin_cr").val(costo_sin_cr);
        });
        
    });
        function visibilidadDiv(id) {
            div = document.getElementById(id);
            /*document.getElementById("empresa").value='';
            document.getElementById("nit").value='';
            document.getElementById("direccion").value='';
            document.getElementById("fono").value='';
            document.getElementById("correo").value='';
            document.getElementById("contacto").value='';*/
            
            if (div.style.display == "block") {
                div.style.display = "none";
            } else {
                div.style.display = "block";
            }
        }
        
        function changeAction()
        {
            document.miformulario.action = "cBuscar.php"
            document.miformulario.submit()
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
        width:95%;
    }
    
    .subdiv{
        border:solid 3px #ccc;
        /*border-radius:15px;*/
        width:100%;
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
<form name="match_form" method="post" action="guardar.php?op=7">
<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();
?>
    <center>
    <div class="estilo_div" >
        <table><tr>
          <td class="titulo">Registro de ACTIVOS</td>
        </tr>            
            <tr>
              <td class="subtitulo" style="text-align: center">De la COOPERATIVA </td>
            </tr>
        </table><br>
       
        
        <div id="nuevo" class="estilo_subdiv">
            <center>
            	<br>
                <table align="left">
				<tr><td>Estado del Activo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="activo" value="true"  checked="checked">
                Activo
                &nbsp; 
                <input type="radio" name="activo" value="false"> 
                Inactivo </td></tr>
                
				                <br>
                <tr><td>Antiguedad del Activo:&nbsp;&nbsp;&nbsp;<input type="radio" name="antiguedad" value="NUEVO"  checked="checked">
                Nuevo
                &nbsp; 
                <input type="radio" name="antiguedad" value="ANTIGUO"> 
                Antiguo </td></tr>
               <tr>
                    <td style="width: 48%"><div class="subdiv">
                            &nbsp;&nbsp;Informacion del Producto:<br><br> 
                        <table>
                            <tr><td>Proveedor:</td>
                                <td>
                                    <select id="id_emp" name="id_emp" style="height: 20px; width:100%; text-align: center;" class="inputs" required>
                                        <option value=""></option>
                                    <?php 
                                    $consulta ="SELECT id_emp, empresa FROM csa.empresas where estado=true;";
                                    $resultado =$db->query($consulta);
                                    foreach($resultado as $fila){?>
                                        <option value="<?php echo $fila["id_emp"];?>"><?php echo $fila["empresa"];?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr><td>Descripcion Item:</td><td><textarea id="descripcion" rows="2" cols="30" name="descripcion" class="inputs"></textarea></td></tr>
                            <tr><td>Nº Adjuntos:</td><td><input type="text" id="cantidad" name="cantidad" style="height: 20px; width:82%; text-align: center;" maxlength="4" class="inputs" onkeypress="return soloNumerosg(event)" required/></td></tr>
                                
                        </table>
                        </div>
                    </td>
                    <td style="width: 10px"></td>
                    <td style="width: 49%"><div class="subdiv">
                            &nbsp;&nbsp;Informacion Contable:<br><br>
                        <table>
                            <tr><td>Fecha Actual:</td><td><input type="text" id="fecha_registro" name="fecha_registro" style="height: 20px; width:82%; text-align: center;" class="inputs" required value='<?php echo  date('d/m/Y') ?>'  /></td></tr>
							
							<tr><td>Fecha de Compra:</td><td><div class="date_input"><script>DateInput('fecha_compra', true,'DD-MM-YYYY') </script> </div></td></tr>
                            <tr><td>Nª CBTE:</td><td><input type="text" id="cbte" name="cbte" style="height: 20px; width:82%; text-align: center;" maxlength="8" class="inputs" onkeypress="return soloNumerosg(event)" required/></td></tr>
                            <tr><td>Grupo de trabajo:</td>
                                <td>
                                    <select id="id_gam" name="id_gam" style="height: 20px; width: 250px; text-align: center;" class="inputs" required>
                                        <option value=""></option>
                                    <?php 
                                    $consulta ="SELECT id_gam, descripcion FROM csa.gam where estado=true;";
                                    $resultado =$db->query($consulta);
                                    foreach($resultado as $fila){?>
                                        <option value="<?php echo $fila["id_gam"];?>"><?php echo $fila["descripcion"];?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </td></tr>
                        </table>
                        </div>
                    </td>
                    <td style="width: 1px"></td>
                </tr>
            </table>
            </center>
            <br><br>
            <table>
                <tr>
                    <td style="width: 33%">
                        <table>
                            <tr><td>Nº Factura:</td><td><input type="text" id="factura" name="factura" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return soloNumerosg(event)" required/></td></tr>
                            <tr><td>Costo Bs.</td><td><input type="text" id="costo" name="costo" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheckD(event,this)" required/></td></tr>
                            <tr><td style="width: 116px">CR Fiscal 13%:</td><td><input type="text" id="cr" name="cr" style="height: 20px; width:82%; text-align: center;" class="inputs" readonly="true" /></td></tr>
                            <tr><td>Menos 13%:</td><td><input type="text" id="costo_sin_cr" name="costo_sin_cr" style="height: 20px; width:82%; text-align: center;" class="inputs" readonly="true"/></td></tr>
                        </table>
                    </td>
                    <td style="width: 33%"><div class="subdiv">
                        <table>
                            <tr><td>
                                        Fecha Tipo de Cambio:
                                        <select id="id_tc" name="id_tc" style="height: 20px; width: 200px; text-align: center;" class="inputs" required>
                                            <option value=""></option>
                                        <?php
                                        $consulta ="SELECT id_tc, fecha FROM csa.tipo_cambio where estado=true order by fecha desc;";
                                        $resultado =$db->query($consulta);
                                        foreach($resultado as $fila){?>
                                            <option value="<?php echo $fila["id_tc"];?>"><?php echo $fila["fecha"];?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>  
                                </td>
                            </tr>
                            
                        </table></div> 
                    </td>
                    <td style="width: 33%">
                        <div class="subdiv">
                            <table>                       
                                <tr><td>
                                Recibido por:
                                        <select id="id_personal" name="id_personal" style="height: 20px; width: 90%; text-align: center;" class="inputs" required>
                                            <option value=""></option>
                                        <?php
                                        $consulta ="SELECT id_personal, nom_personal FROM csa.personal where estado=true;";
                                        $resultado =$db->query($consulta);
                                        foreach($resultado as $fila){?>
                                            <option value="<?php echo $fila["id_personal"];?>"><?php echo $fila["nom_personal"];?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                </td></tr>
                            </table>
                        </div>
                    </td>
                    <td style="width: 1px"></td>
                </tr>
            </table>
            <br>
            <center>
                <input type="submit" value="GUARDAR" class="button">
                <!--<input id="cancelar" type="button" value="Cancelar" class="button" onclick="javascript: visibilidadDiv('nuevo');">-->
            </center>
            
            <br>
        </div>
        <br>
        <div style='overflow-y:auto;width:95%;'>
            <table width="90%" height="55" style="border:1px;" align="center">
            <tr bgcolor='#CCCFF1'>
	    <th class="colEnc">ID</th>
            <th class="colEnc">Recibido por</th>
            <th class="colEnc">Fecha Compra</th>
            <th class="colEnc">Descripcion</th>
            <th class="colEnc">Nº Adjuntos</th>
            <th class="colEnc">factura</th>
            <th class="colEnc">Costo</th>
            <th class="colEnc">CRF 13%</th>
            <th class="colEnc">Costo sin CRF</th>
            <th class="colEnc">Acrónimo</th>
            <th class="colEnc">N CBT</th>
            <th class="colEnc">$us Venta</th>
            <th class="colEnc">$us Compra</th>
            <th class="colEnc">UFV Venta</th>
            <th class="colEnc">UFV Compra</th>
            <th class="colEnc">Estado</th>
            <th class="colEnc" colspan="2">Opciones</th>
            </tr> 
<?php

 $consulta ="SELECT ra.id_regact, p.nom_personal, ra.fecha_compra, ra.descripcion, ra.n_adjuntos, ra.factura, ra.costo, ra.c_cred_fiscal, ra.s_cred_fiscal, gam.gc_cnta_sp, ra.n_cbt, 
case ra.estado when true then 'ACTIVO' else 'INACTIVO' end estado, tc.sus_venta,tc.sus_compra,tc.ufv_venta,tc.ufv_compra 
FROM csa.registro_activos ra  
inner join csa.gam gam on gam.id_gam=ra.id_cam
inner join csa.tipo_cambio tc on tc.id_tc=ra.id_tc 
inner join csa.personal p on p.id_personal=ra.id_personal 
order by ra.id_regact";
 $resultado =$db->query($consulta);
 $i=0;
 if($resultado->rowCount()>0){
 
	 foreach($resultado as $fila){
		$id = $fila[0];
		$i=$i+1;		
?>
        <tr bgcolor="#F2F9FF">   
            <th scope="row" class="colDat"><?php echo $fila["id_regact"];?></th>
            <td align="center" class="colDat"><?php echo $fila["nom_personal"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["fecha_compra"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["descripcion"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["n_adjuntos"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["factura"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["costo"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["c_cred_fiscal"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["s_cred_fiscal"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["gc_cnta_sp"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["n_cbt"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["sus_venta"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["sus_compra"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["ufv_venta"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["ufv_compra"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
            <td align="center" class="colDat"><?php echo "<a href='registro_ind.php?id_regact=".$fila["id_regact"]."'title='registrar'>REGISTRO INDIVIDUAL</a>";  ?></td><td align="center" class="colDat"><?php echo "<a href='../mod_inicio/reportes.php?id_regact=".$fila["id_regact"]."&op=77'title='registrar'>DETALLE COMPRA</a>";  ?></td>
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
</form>
<?php
require("../theme/footer_inicio.php");
}
else
header('Location: ../index.php');    
?>
