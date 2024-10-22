<?php
session_start();
if($_SESSION["usuario_nombre"])
{
require("../theme/header_inicio.php");
?>
<script language="javascript">
    function visibilidadDiv(id) {
        div = document.getElementById(id);
        document.getElementById("sus_v").value = '';
        document.getElementById("sus_c").value = '';
        document.getElementById("ufv_v").value = '';
        document.getElementById("ufv_c").value = '';
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
<form name="match_form" method="post" action="guardar.php?op=1">
    <center>
        <div class="estilo_div" >
		<div align="right"><a href="../mod_inicio/regsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/><strong>VOLVER</strong></a></div>
            <table><tr><td class="titulo">Tipo de Cambio</td></tr>            
                <tr><td class="subtitulo" style="text-align: center">Dolares y UFV</td></tr>
            </table><br>
            <button type="button" class="button" onclick="javascript: visibilidadDiv('nuevo');">Registar Tipo de Cambio (Dolares y UFV's)</button><br><br>

            <div id="nuevo" style="display: none;" class="estilo_subdiv">        
                <center>
                    <table>
                        <tr><td colspan="2" class="subtitulo" style="text-align: center">Registrar</td></tr>
                        <tr style="height: 10px"><td></td><td></td></tr>
                        <!--<tr><td>Fecha:</td><td><div class="date_input"><script class="inputs">DateInput('fecha', true, 'DD-MM-YYYY')</script> </div></td></tr>-->
                        <tr><td>Fecha:</td><td><input type="date" id="fecha" name="fecha" style="text-align: center"/></td></tr>
                        <tr><td>Dolar Compra:</td><td><input type="text" id="sus_v" name="sus_v" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheck(event, this)" required/></td></tr>
                        <tr><td>Dolar Venta:</td><td><input type="text" id="sus_c" name="sus_c" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheck(event, this)" required/></td></tr>
                        <tr><td>UFV Compra:</td><td><input type="text" id="ufv_v" name="ufv_v" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheckD(event, this)" required/></td></tr>
                        <tr><td>UFV Venta:</td><td><input type="text" id="ufv_c" name="ufv_c" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheckD(event, this)" required/></td></tr>
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
                        <th class="colEnc">FECHA</th>
                        <th class="colEnc">DOLAR VENTA</th>
                        <th class="colEnc">DOLAR COMPRA</th>
                        <th class="colEnc">UFV VENTA</th>
                        <th class="colEnc">UFV COMPRA</th>
                        <th class="colEnc">QUIEN REGISTRO</th>
                        <th class="colEnc" colspan="2">ACCIONES</th>
                    </tr> 
                    <?php
                    $resultado = "SELECT id_tc, fecha, sus_venta, sus_compra, ufv_venta, ufv_compra,nom_personal FROM csa.tipo_cambio t inner join (select u.id_usuario, nom_personal from csa.usuarios u, csa.personal p where u.id_personal=p.id_personal) p on p.id_usuario=t.user_registro WHERE t.estado=true order by fecha";
                    $resultado = $db->query($resultado);
                    $i = 0;
                    if ($resultado->rowCount() > 0) {

                        foreach ($resultado as $fila) {
                            $id = $fila[0];
                            $i = $i + 1;
                            ?>
                            <tr bgcolor="#F2F9FF"> 
                                <td align="center" class="colDat"><?php echo $fila["fecha"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["sus_venta"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["sus_compra"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["ufv_venta"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["ufv_compra"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["nom_personal"]; ?></td>
                                <td align="center" class="colDat"><a href="tipo_cambio.php?id=<?php echo $fila["id_tc"];?>"><img src="images/6.png" alt="" title="MODIFICAR" style="width: 20px; height: 20px"/></a></td>
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
    $resultado ="SELECT fecha, sus_venta, sus_compra, ufv_venta, ufv_compra, case estado when true then 1 else 0 end estado FROM csa.tipo_cambio where id_tc=$id";
    $resultado =$db->query($resultado);
    foreach($resultado as $fila){
        $fecha=$fila[0];
        $sus_venta=$fila[1];
        $sus_compra=$fila[2];
        $ufv_venta=$fila[3];
        $ufv_compra=$fila[4];
        $estado=$fila[5];
    }
?>
<form name="match_form" method="post" action="guardar.php?op=14&d=<?=$id?>">
    <center>
        <div class="estilo_div" >
            <table><tr><td class="titulo">Tipo de Cambio</td></tr>            
                <tr><td class="subtitulo" style="text-align: center">Dolares y UFV</td></tr>
            </table><br>

            <div id="nuevo" class="estilo_subdiv">        
                <center>
                    <table>
                        <tr><td colspan="2" class="subtitulo" style="text-align: center">Modificar</td></tr>
                        <tr style="height: 10px"><td></td><td></td></tr>
                        <!--<tr><td>Fecha:</td><td><div class="date_input"><script class="inputs">DateInput('fecha', true, 'DD-MM-YYYY')</script> </div></td></tr>-->
                        <tr><td>Fecha:</td><td><input type="date" id="fecha" name="fecha" value="<?=$fecha?>" style="text-align: center"/></td></tr>
                        <tr><td>Dolar Compra:</td><td><input type="text" id="sus_v" name="sus_v" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheck(event, this)" required value="<?=$sus_compra?>"/></td></tr>
                        <tr><td>Dolar Venta:</td><td><input type="text" id="sus_c" name="sus_c" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheck(event, this)" required value="<?=$sus_venta ?>"/></td></tr>
                        <tr><td>UFV Compra:</td><td><input type="text" id="ufv_v" name="ufv_v" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheckD(event, this)" required value="<?=$ufv_compra?>"/></td></tr>
                        <tr><td>UFV Venta:</td><td><input type="text" id="ufv_c" name="ufv_c" style="height: 20px; width:82%; text-align: center;" maxlength="10" class="inputs" onkeypress="return NumCheckD(event, this)" required value="<?=$ufv_venta?>"/></td></tr>
                    </table>
                </center>
                <br>
                <center>
                    <input type="submit" value="MODIFICAR" class="button">
                    <a href="tipo_cambio.php"><input id="cancelar" type="button" value="CANCELAR" class="button"></a>
                </center>

                <br>
            </div>      
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
