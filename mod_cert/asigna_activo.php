<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();

$estado=true;
$fecha=date("Y-m-d");
$id_pers=$_POST["id_persona"];
$observaciones=$_POST["observaciones"];
$cons ="SELECT MAX(numero+1) as total FROM csa.asignacion_activos";
$res =$db->query($cons);
if($res->rowCount()>0){
	 	foreach($res as $filas){
			$numero = $filas["total"];	
         }
}

$asignados=$_POST['asignados'];
if($_POST['asignados'] != "")
{
		 if(is_array($_POST['asignados']))
         {
       		 while(list($key,$asignados) = each($_POST['asignados'])) 
        	{
			if($numero>0){
			$sql = "INSERT INTO csa.asignacion_activos(id_regact,id_personal,fecha_asignacion,Observaciones,estado,numero) VALUES('$asignados','$id_pers','$fecha','$observaciones','$estado','$numero');";
			}
			else{
			$sql = "INSERT INTO csa.asignacion_activos(id_regact,id_personal,fecha_asignacion,Observaciones,estado,numero) VALUES('$asignados','$id_pers','$fecha','$observaciones','$estado',1);";
			}
		$sql2="UPDATE csa.registro_individual SET estado_asignacion=1 where id_regind=$asignados";
		$datos = $db->query($sql);
		$datos = $db->query($sql2);
			}
   		 }
}
/////////////////////////////////
/*if(@$_POST["btnasignar"])
{
    $estado=true;
    $fecha=date("Y-m-d");
    $id_pers=$_POST["id_persona"];
    $observaciones=$_POST["observaciones"];
	$cons ="SELECT MAX(numero+1) as total FROM csa.asignacion_activos";
	$res =$db->query($cons);
 	if($res->rowCount()>0){
	 	foreach($res as $filas){
			$numero = $filas["total"];	
         }
 	}
    foreach($_POST["asignados"] as $asignar)
    {
        $sql = "INSERT INTO csa.asignacion_activos(id_regact,id_personal,fecha_asignacion,Observaciones,estado,numero)	VALUES('$asignar[$id_regind]','$id_pers','$fecha','$observaciones','$estado','$numero');";
		$sql2="UPDATE csa.registro_individual SET estado_asignacion=1 where id_regind=$asignar[$id_regind]";
		$datos = $db->query($sql);
		$datos = $db->query($sql2);
    }
}*/
//////////////////////////////////
header("location:../mod_cert/asignacion.php")
?>
