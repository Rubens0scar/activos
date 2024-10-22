<?php
include_once '../mod_configuracion/clases/conexion.php';
session_start();
$db = Core::Conectar();
		$n_adjuntos = $_POST["n_adjuntos"];
        $id_regact = $_POST["id_regact"];
        $paginacion = $_POST["paginacion"];
        $id_act = $_POST["id_act"];
		$correlativo_cantidad = $_POST["correlativo"];
        $gestion = $_POST["gestion"];
        $recibido = $_POST["recibido"];
        $descripcion_act = $_POST["descripcion_act"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $serie = $_POST["serie"];
        $costo = $_POST["costo"];
        $estado_activo = $_POST["estado_activo"];
        $observaciones = $_POST["observaciones"];
        $estado = $_POST["activo"];
        try{

            $sql = "INSERT INTO csa.registro_individual(id_regact,paginacion,id_act,correlativo_cantidad,gestion,recibido,descripcion_act,marca,modelo,serie,costo,estado_activo,observaciones,estado,estado_asignacion) VALUES('$id_regact','$paginacion','$id_act','$correlativo_cantidad','$gestion','$recibido','$descripcion_act','$marca','$modelo','$serie','$costo','$estado_activo','$observaciones','$estado',0);";
            $datos = $db->query($sql);
	}
        catch(PDOException $ex)
        {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: ".$ex->getMessage()."<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
		  echo "<script type=\"text/javascript\">"."window.alert('Se registro correctamente.');"."top.location = 'registro_ind.php?id_personal=".$recibido."&id_regact=".$id_regact."';"."</script>";
    
?>