<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();
if(@$_POST["btntransferir"])
{
    $estadotrue=true;
    $fecha=date("Y-m-d");
	
    $id_pers1=$_POST["id_transfiere"];
    $id_pers2=$_POST["id_transfierea"];
    $observaciones=$_POST["observaciones"];
    foreach($_POST["asignados"] as $asignar)
    {
        $sql = "INSERT INTO csa.asignacion_activos(id_regact,id_personal,fecha_asignacion,Observaciones,estado) VALUES('$asignar','$id_pers2','$fecha','$observaciones','$estadotrue');";
        $sql2 = "update csa.asignacion_activos set estado=false where id_regact='$asignar' and id_personal='$id_pers1' ;";
        $sql3 = "INSERT INTO csa.devolucion_activos(id_regact,id_personal,fecha_devolucion,Observaciones,estado) VALUES('$asignar','$id_pers1','$fecha','$observaciones','$estadotrue');";
        $sql4 = "INSERT INTO csa.transferencia_activos(id_regact,id_personal,fecha_transferencia,observaciones,estado) VALUES('$asignar','$id_pers1','$fecha','$observaciones','$estadotrue');";
        $datos = $db->query($sql);
        $datos2 = $db->query($sql2);
        $datos3 = $db->query($sql3);
        $datos4 = $db->query($sql4);
    }
    }
header("location:../mod_cert/asignacion.php")
?>
