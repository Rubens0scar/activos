<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();
if(@$_POST["btnasignar"])
{
    $estado=true;
    $fecha=date("Y-m-d");
    $id_pers=$_POST["id_persona"];
    $observaciones=$_POST["observaciones"];
	
	$cons ="SELECT MAX(numero+1) as total FROM csa.devolucion_activos";
$res =$db->query($cons);
if($res->rowCount()>0){
	 	foreach($res as $filas){
			$numero = $filas["total"];	
         }
}

    foreach($_POST["asignados"] as $asignar)
    {
		if($numero>0){
        $sql = "INSERT INTO csa.devolucion_activos(id_regact,id_personal,fecha_devolucion,observaciones,estado,numero) VALUES('$asignar','$id_pers','$fecha','$observaciones','$estado','$numero');";
		}
		else{
		$sql = "INSERT INTO csa.devolucion_activos(id_regact,id_personal,fecha_devolucion,observaciones,estado,numero) VALUES('$asignar','$id_pers','$fecha','$observaciones','$estado',1);";
		}
        $sql2 = "update csa.asignacion_activos set estado=false where id_regact='$asignar' and id_personal='$id_pers' ;";
        $datos2=$db->query($sql2);
        $datos = $db->query($sql);
    }
    }
header("location:../mod_cert/devolucion.php")
?>
