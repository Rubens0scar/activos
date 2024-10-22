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

<form name="match_form" method="post" action="guardar_ind.php">
<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();
?>
    <center>
    <div class="estilo_div" >
        <table><tr><td class="titulo">Registro de compra de Activos</td></tr>            
            <tr><td class="subtitulo" style="text-align: center">De la institución</td></tr>
        </table><br>
        <!--<button type="button" class="button" onclick="javascript: visibilidadDiv('nuevo');">Registar Activo</button><br><br>-->
        
        <div id="nuevo" class="estilo_subdiv">
            <center>
               
            <table>
                <tr>
				<center><br>
                <input type="radio" name="activo" value="true"  checked="checked">
                activo
                &nbsp; 
                <input type="radio" name="activo" value="false"> 
                inactivo
                </center>
                    <td style="width: 48%"><div class="subdiv">
                            &nbsp;&nbsp;Informacion General:<br><br> 
                        <table>
                            <tr><td>Codigo:</td>
                                <td><input type="text" id="id_regact" name="id_regact" value="<?php echo $_REQUEST["id_regact"];?>" style="height: 20px; width:50%; text-align: center;" class="inputs" readonly>
                                  
                                </td>
                            </tr>
							
							<tr><td>Paginación:</td>
							<?php  $id_regact = $_REQUEST["id_regact"];
							$consultas="SELECT n_adjuntos, id_personal, extract(year from fecha_compra::date) as anio FROM csa.registro_activos where id_regact='$id_regact'";
							$resultados=$db->query($consultas);
							foreach($resultados as $filas){
							$n_adjuntos = $filas['n_adjuntos'];
							$id_personal = $filas['id_personal'];
							$anio_compra = $filas['anio'];
							
							$consultap="SELECT nom_personal FROM csa.personal where id_personal='$id_personal'";
							$resultadop=$db->query($consultap);
							foreach($resultadop as $filap){
							$nom_personal = $filap['nom_personal'];														
							
							$cantidad = "SELECT count(id_act) as correl, count(id_regact) as total FROM csa.registro_individual where id_regact='$id_regact' ;";
							/*$cant=1;
							$entero=1;*/
							$resultadoc=$db->query($cantidad);
							foreach($resultadoc as $filac){	
							/*if($cant == 1) {							
							$entero=$entero+1;
							$cant=$cant+1;
							}
							else 
							{ */
							$cant=$filac['total']+1;
							$entero=$filac['correl']+1;
							if($cant>$n_adjuntos)
							{
							echo "<script type=\"text/javascript\">"."window.alert('Se registraron todos los activos de esta adquisición gracias.');"."top.location = 'activos.php';"."</script>";
							$cant=1;
							$entero=1;
							}
							//}											
							}
						}
                        } ?>
                            <input type="hidden" id="n_adjuntos" name="n_adjuntos" value="<?php echo $n_adjuntos; ?>"> 
                                            
							<td><input type="text" id="paginacion" name="paginacion" style="height: 20px; width:82%; text-align: center;" maxlength="4" class="inputs" value="<?php echo $cant; echo '-'; echo $n_adjuntos;?>" readonly=""></td></tr>                                       
                           
						   <input type="hidden" id="correlativo" name="correlativo" style="height: 20px; width:82%; text-align: center;" maxlength="4" class="inputs" value="<?php echo $entero;?>" readonly="">                        
							
						   
							<tr><td>Activo:</td><td><select id="id_act" name="id_act" style="height: 20px; width: 82%; text-align: center;" class="inputs" required>
                                            <option value="">-SELECCIONAR-</option>
                                        <?php
                                        $consulta ="SELECT codigo, nombre FROM csa.activo where estado=true;";
                                        $resultado =$db->query($consulta);
                                        foreach($resultado as $fila){?>
                                            <option value="<?php echo $fila["codigo"];?>"><?php echo $fila["nombre"];?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                </td></tr>
                           
                            <tr><td>Gestion:</td><td><input type="text" id="gestion" name="gestion" style="height: 20px; width:82%; text-align: center;" maxlength="4" class="inputs" value="<?php echo $anio_compra; ?>" readonly/></td></tr>
							<tr><td>Recibido por:</td><td><input type="hidden" id="recibido" name="recibido" style="height: 20px; width:82%; text-align: center;" maxlength="4" class="inputs" value="<?php echo $id_personal;?>"><?php echo $nom_personal;?></td></tr> 
							 <tr><td>Descripcion Activo:</td><td><textarea id="descripcion_act" rows="2" cols="30" name="descripcion_act" class="inputs"></textarea></td></tr>
                        </table>
                        </div>
                    </td>
					
                    <td style="width: 10px"></td>
                    <td style="width: 49%"><div class="subdiv">
                            &nbsp;&nbsp;Informacion Detallada:<br><br>
                        <table>
                            <tr><td>Marca:</td><td><input type="text" id="marca" name="marca" style="height: 20px; width:82%; text-align: center;" class="inputs" required /></td></tr>
							<tr><td>Modelo:</td><td><input type="text" id="modelo" name="modelo" style="height: 20px; width:82%; text-align: center;" class="inputs" required /></td></tr>
							<tr><td>Serie:</td><td><input type="text" id="serie" name="serie" style="height: 20px; width:82%; text-align: center;" class="inputs" required /></td></tr>							
                            <tr><td>Costo Bs.</td><td><input type="text" id="costo" name="costo" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheckD(event,this)" required/></td></tr>
							 <tr><td>
                                Estado Activo:</td><td>
                                        <select id="estado_activo" name="estado_activo" style="height: 20px; width: 200px; text-align: center;" class="inputs" required>
                                            <option value="">-SELECCIONAR-</option>
                                        <?php
                                        $consulta ="SELECT id_estado, est_tec FROM csa.estado_activo where estado=true;";
                                        $resultado =$db->query($consulta);
                                        foreach($resultado as $fila){?>
                                            <option value="<?php echo $fila["id_estado"];?>"><?php echo $fila["est_tec"];?></option>
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
                <tr><td>Observaciones:</td><td><textarea id="observaciones" rows="2" cols="30" name="observaciones" class="inputs"></textarea></td></tr>
                        </table>
                    </td>
                    <td style="width: 33%"><div class="subdiv">
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
	    <th class="colEnc">Número</th>
            <th class="colEnc">Registro</th>
            <th class="colEnc">Activo</th>
            <th class="colEnc">Correlativo</th>
            <th class="colEnc">Gestion</th>
            <th class="colEnc">Recibido por</th>
            <th class="colEnc">Descripción</th>
            <th class="colEnc">Marca</th>
            <th class="colEnc">Modelo</th>
            <th class="colEnc">Serie</th>
            <th class="colEnc">Costo</th>
            <th class="colEnc">Observaciones</th>
            <th class="colEnc">Estado</th>
            <th class="colEnc" colspan="2">ACCIONES</th>
            </tr> 
<?php

 $consulta ="SELECT * FROM csa.registro_individual WHERE id_regact=$id_regact;";
 $resultado =$db->query($consulta);
 $i=0;
 if($resultado->rowCount()>0){
 
	 foreach($resultado as $fila){
		$id = $fila[0];
		$i=$i+1;		
?>
        <tr bgcolor="#F2F9FF">   
            <th scope="row" class="colDat"><?php echo $i;?></th>
            <td align="center" class="colDat"><?php echo $fila["id_regact"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["id_act"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["correlativo_cantidad"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["gestion"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["recibido"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["descripcion_act"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["marca"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["modelo"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["serie"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["costo"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["observaciones"]; ?></td>
            <td align="center" class="colDat"><?php echo $fila["estado_activo"]; ?></td>
            <td align="center" class="colDat">ELIMINAR</td>
			
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
