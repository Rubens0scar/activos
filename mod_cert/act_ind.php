<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require("../theme/header_inicio.php");
?>
<script language="javascript">
    function visibilidadDiv(id) {
        div = document.getElementById(id);
        document.getElementById("nombre").value = '';
        document.getElementById("id_subg").value = '';

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

if (!isset($_REQUEST["id"])) {
    ?>
    <form name="match_form" method="post" action="guardar.php?op=9">
        <center>
            <div class="estilo_div" >
			<div align="right"><a href="../mod_inicio/regsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/><strong>VOLVER</strong></a></div>
                <table><tr><td class="titulo">CLASIFICADOR DE ACTIVOS</td></tr> 
                </table><br>
                <button type="button" class="button" onclick="javascript: visibilidadDiv('nuevo');">Registar Activo</button><br><br>

                <div id="nuevo" style="display: none;" class="estilo_subdiv">        
                    <center>
                        <table>
                            <tr><td colspan="2" class="subtitulo" style="text-align: center">Registrar</td></tr>
                            <tr style="height: 10px"><td></td><td></td></tr>
                            <!--<tr><td>Fecha:</td><td><div class="date_input"><script class="inputs">DateInput('fecha', true, 'DD-MM-YYYY')</script> </div></td></tr> -->
                            <tr><td>Fecha:</td><td><input type="date" id="fecha" name="fecha" value="<?=date("d")."/".date("m")."/".date("Y");?>" style="text-align: center"/></td>
                            <tr><td>Grupo Contable:</td>
                                <td>
                                    <select id="id_gam" name="id_gam" style="height: 20px; width: 82%; text-align: center;" class="inputs" required>
                                        <option value="">-SELECCIONAR-</option>
                                        <?php
                                        $consulta = "SELECT id_gam, descripcion, gc_cnta_cm, gc_cnta_sp  FROM csa.gam where estado=true;";
                                        $resultado = $db->query($consulta);
                                        foreach ($resultado as $fila) {
                                            ?>
                                            <option value="<?php echo $fila["id_gam"]; ?>"><?php echo $fila["descripcion"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td></tr> 
                            <tr><td>Codigo Sub Grupo: </td><td><input type="text" id="id_subg" name="id_subg" style="height: 20px; width:82%; text-align: center;" maxlength="50" class="inputs" onkeypress="return NumCheck(event, this)" required/></td></tr> 
                            <tr><td>Descripción: </td><td><input type="text" id="nombre" name="nombre" style="height: 20px; width:82%; text-align: center;" maxlength="50" class="inputs" required/></td></tr>               
                            <tr><td>Vigencia de Activo: </td><td><input type="radio" name="activo" value="true"> Activo<br><input type="radio" name="activo" value="false"> Inactivo</td></tr>
                        </table>
                    </center>
                    <br>
                    <center>
                        <input type="submit" value="GUARDAR" class="button">
                        <input id="cancelar" type="button" value="Cancelar" class="button" onclick="javascript: visibilidadDiv('nuevo');">
                    </center>

                    <br>
                </div>
                <br>
                <div style='overflow-y:auto;width:95%;'>
                    <table width="90%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">Acrónimo</th>
                            <th class="colEnc">Grupo Contable</th>
                            <th class="colEnc">Código Sub Grupo</th>
                            <th class="colEnc">Descripción Sub Grupo</th>
                            <th class="colEnc">Código Compuesto</th>
                            <th class="colEnc">Fecha</th>
                            <th class="colEnc">Vigencia</th>
                            <th class="colEnc" colspan="2">ACCIONES</th>
                        </tr> 
                        <?php
                        include_once '../mod_configuracion/clases/conexion.php';
                        $db = Core::Conectar();
                        $resultado = "SELECT a.codigo, ga.gc_cnta_sp, ga.descripcion, a.id_subg, a.nombre, a.fecha_reg, a.od_clas_am, case a.estado when true then 'ACTIVO' else 'NO ACTIVO' end estado FROM csa.activo a, csa.gam ga WHERE a.id_gam=ga.id_gam";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">
                                    <td align="center" class="colDat"><?php echo $fila["gc_cnta_sp"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["descripcion"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["id_subg"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["nombre"]; ?></td>			
                                    <td align="center" class="colDat"><?php
                                        echo $fila["od_clas_am"];
                                        echo '-';
                                        echo $fila["id_subg"];
                                        ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["fecha_reg"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                    <td align="center" class="colDat"><a href="act_ind.php?id=<?php echo $fila["codigo"]; ?>"><img src="images/6.png" alt="" title="MODIFICAR" style="width: 20px; height: 20px"/></a></td>
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
        $resultado ="SELECT fecha_reg, id_gam, id_subg, nombre, case estado when true then 1 else 0 end estado FROM csa.activo where codigo=$id;";
        
        $resultado =$db->query($resultado);
        foreach($resultado as $fila){
            $fecha_reg=$fila[0];
            $id_gam=$fila[1];
            $id_subg=$fila[2];
            $nombre=$fila[3];
            $estado=$fila[4];
        }
        ?>   
    <form name="match_form" method="post" action="guardar.php?op=12&d=<?=$id;?>">
        <center>
        <div id="nuevo" class="estilo_subdiv">        
            <center>
                <table>
                    <tr><td colspan="2" class="subtitulo" style="text-align: center">Modificar</td></tr>
                    <tr style="height: 10px"><td></td><td></td></tr>
                    <tr><td>Fecha:</td><td><input type="date" id="fecha" name="fecha" value="<?=date("d")."/".date("m")."/".date("Y");?>" style="text-align: center"/></td>
                        <!--<td><div class="date_input"><script class="inputs">DateInput('fecha', true, 'DD-MM-YYYY')</script> </div></td></tr> -->
                    <tr><td>Grupo Contable:</td>
                        <td>
                            <select id="id_gam" name="id_gam" style="height: 20px; width: 82%; text-align: center;" class="inputs" required>
                                <option value="">-SELECCIONAR-</option>
                                <?php
                                $consulta = "SELECT id_gam, descripcion, gc_cnta_cm, gc_cnta_sp  FROM csa.gam where estado=true;";
                                $resultado = $db->query($consulta);
                                foreach ($resultado as $fila) {
                                    $p="";
                                    if($fila["id_gam"]==$id_gam) $p="selected";
                                    ?>
                                    <option value="<?php echo $fila["id_gam"]; ?>" <?=$p;?>><?php echo $fila["descripcion"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td></tr> 
                    <tr><td>Codigo Sub Grupo: </td><td><input type="text" id="id_subg" name="id_subg" style="height: 20px; width:82%; text-align: center;" maxlength="50" class="inputs" onkeypress="return NumCheck(event, this)" required value="<?=$id_subg?>"/></td></tr> 
                    <tr><td>Descripción: </td><td><input type="text" id="nombre" name="nombre" style="height: 20px; width:82%; text-align: center;" maxlength="50" class="inputs" required value="<?=$nombre?>"/></td></tr>               
                    <tr><td>Vigencia de Activo: </td><td><input type="radio" name="activo" value="true" <?= $estado==1?'checked':'';?>> Activo<br><input type="radio" name="activo" value="false" <?= $estado==0?'checked':'';?>> Inactivo</td></tr>
                </table>
            </center>
            <br>
            <center>
                <input type="submit" value="MODIFICAR" class="button">
                <a href="act_ind.php"><input id="cancelar_mod" name="cancelar_mod" type="button" value="CANCELAR" class="button"></a>
            </center>

            <br>
        </div>
        </center>               
    <?php }
?>
</form>
<?php
$db = null;
require("../theme/footer_inicio.php");
}
else
header('Location: ../index.php');    
?>
