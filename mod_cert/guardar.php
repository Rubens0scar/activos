<?php

include_once '../mod_configuracion/clases/conexion.php';
session_start();
$db = Core::Conectar();

try {
    $opcion = $_REQUEST["op"];
    $id = $_SESSION["id"];

    if ($opcion == "1") {
        $fecha = strtoupper(trim($_POST["fecha"], ' '));
        $dolar_venta = $_POST["sus_v"];
        $dolar_compra = $_POST["sus_c"];
        $ufv_venta = $_POST["ufv_v"];
        $ufv_compra = $_POST["ufv_c"];
		$consulta = "SELECT MAX(id_tc+1) FROM csa.tipo_cambio";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.tipo_cambio(id_tc, fecha, sus_venta, sus_compra, ufv_venta, ufv_compra, user_registro, estado) VALUES ('$id_gam','$fecha',$dolar_venta,$dolar_compra,$ufv_venta,$ufv_compra,$id,true);";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'tipo_cambio.php';" . "</script>";
//	echo $usuario."<br>".$pas."-".$reppas."<br>".$nombre."<br>".$ap_pat."<br>".$ap_mat."<br>".$dir."<br>".$area;
        /*         * * close the database connection ** */
    }

    if ($opcion == "2") {
        $motivo = strtoupper(trim($_POST["motivo"], ' '));
		$consulta = "SELECT MAX(id_motivo+1) FROM csa.motivo_baja";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.motivo_baja(id_motivo, motivo, id_usuario, estado) VALUES('$id_gam','$motivo',$id,true);";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'motivo_baja.php';" . "</script>";
    }
///////////////////////////////////////////////////////////
    if ($opcion == "3") {
        $codigo = strtoupper(trim($_POST["codigo"], ' '));
        $nombre = strtoupper(trim($_POST["nombre"], ' '));
        $activo = strtoupper(trim($_POST["activo"], ' '));
		$consulta = "SELECT MAX(id_dpto+1) FROM csa.departamento";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.departamento(id_dpto, cd_cnt_dpto, nom_dpto, estado, id_usr) VALUES('$id_gam','$codigo','$nombre',$activo,$id);";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'departamentos.php';" . "</script>";
    }
///////////////////////////////////////////
    if ($opcion == "4") {
        $empresa = strtoupper(trim($_POST["empresa"], ' '));
        $nit = strtoupper(trim($_POST["nit"], ' '));
        $direccion = strtoupper(trim($_POST["direccion"], ' '));
        $telefonos = strtoupper(trim($_POST["fono"], ' '));
        $correo = strtoupper(trim($_POST["correo"], ' '));
        $contacto = strtoupper(trim($_POST["contacto"], ' '));
        $estado = strtoupper(trim($_POST["activo"], ' '));
		$consulta = "SELECT MAX(id_emp+1) FROM csa.empresas";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.empresas(id_emp, empresa, nit, direccion, telefonos, correo, contacto, estado) VALUES('$id_gam','$empresa','$nit','$direccion','$telefonos','$correo','$contacto',$estado);";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'empresas_prov.php';" . "</script>";
    }

    /*if ($opcion == "5") {
        $material = strtoupper(trim($_POST["material"], ' '));
        $estado = strtoupper(trim($_POST["estado"], ' '));
		
        try {
            $sql = "INSERT INTO csa.tipo_activo(act_mat, estado) VALUES('$material',$estado);";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'tipo_material.php';" . "</script>";
    }*/

    if ($opcion == "6") {
        $gc_cnta_cm = strtoupper(trim($_POST["completo"], ' '));
        $gc_cnta_sp = strtoupper(trim($_POST["simple"], ' '));
        $descripcion = strtoupper(trim($_POST["des"], ' '));
        $depvidut = strtoupper(trim($_POST["anio"], ' '));
        $depcoef = strtoupper(trim($_POST["porcentaje"], ' '));
        $fecha = date("Y-m-d");
        $estado = strtoupper(trim($_POST["activo"], ' '));
		$consulta = "SELECT MAX(id_gam+1) FROM csa.gam";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.gam(id_gam, gc_cnta_cm, gc_cnta_sp, descripcion, depvidut, depcoef, id_usr, fecha, estado) VALUES ('$id_gam','$gc_cnta_cm','$gc_cnta_sp','$descripcion','$depvidut','$depcoef',$id,'$fecha','$estado');";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'gam.php';" . "</script>";
    }
///////////////////////////////////////////////////////////
    if ($opcion == "7") {
        $antiguedad = $_POST["antiguedad"];
        $id_emp = $_POST["id_emp"];
        $descripcion = $_POST["descripcion"];
        $n_adjuntos = $_POST["cantidad"];
        $fecha_registro = $_POST["fecha_registro"];
        $fecha_compra = $_POST["fecha_compra"];
        $n_cbt = $_POST["cbte"];
        $id_cam = $_POST["id_gam"];
        $factura = $_POST["factura"];
        $costo = $_POST["costo"];
        $c_cred_fiscal = $_POST["cr"];
        $s_cred_fiscal = $_POST["costo_sin_cr"];
        $id_tc = $_POST["id_tc"];
        $id_personal = $_POST["id_personal"];
        $estado = $_POST["activo"];
		$consulta = "SELECT MAX(id_regact+1) FROM csa.registro_activos";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.registro_activos(id_regact,estado,antiguedad,id_emp,descripcion,n_adjuntos,fecha_registro, fecha_compra,n_cbt,id_cam,factura,costo,c_cred_fiscal,s_cred_fiscal,id_tc,id_personal) VALUES('$id_gam','$estado','$antiguedad','$id_emp','$descripcion','$n_adjuntos','$fecha_registro','$fecha_compra','$n_cbt','$id_cam','$factura','$costo','$c_cred_fiscal','$s_cred_fiscal','$id_tc','$id_personal');";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'activos.php';" . "</script>";
    }
    /////////////////////////////////////////
    if ($opcion == "8") {
        $codigo = strtoupper(trim($_POST["codigo"], ' '));
        $nombre = strtoupper(trim($_POST["nombre"], ' '));
        $id_dpto = strtoupper(trim($_POST["id_dpto"], ' '));
        $activo = strtoupper(trim($_POST["activo"], ' '));
        $cd_ubi1 = (($_POST["id_dpto"]) . '.' . ($_POST["codigo"]));
		$consulta = "SELECT MAX(id_area+1) FROM csa.area";
		$resultado =$db->query($consulta);
		if($resultado->rowCount()>0){ 
	 	foreach($resultado as $max){
		$id_gam=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.area(id_area, id_dpto, cd_cnt_area, nom_area, estado, cd_ubi1, id_usr) VALUES('$id_gam','$id_dpto','$codigo','$nombre','$activo','$cd_ubi1','$id');";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;  
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'area.php';" . "</script>";
    }
    ///////////////////////
    if ($opcion == "9") {
        $fecha_reg = $_POST["fecha"];
        $id_gam = $_POST["id_gam"];
        $id_subg = $_POST["id_subg"];
        $nombre = $_POST["nombre"];
        $activo = $_POST["activo"];
		$cons = "SELECT MAX(codigo+1) FROM csa.activo";
		$res =$db->query($cons);
		if($res->rowCount()>0){ 
	 	foreach($res as $max){
		$codigo=$max[0];
	 	}
		}
        $consulta = "SELECT id_gam, descripcion, gc_cnta_sp  FROM csa.gam where estado=true and id_gam=$id_gam;";
        $resultado = $db->query($consulta);
        foreach ($resultado as $fila) {
            $cod_gc_cnta = 'CSA-' . $fila["gc_cnta_sp"];
        }
        try {
            echo $fecha_reg;
            echo $id_gam;
            echo $id_subg;
            echo $nombre;
            echo $cod_gc_cnta;
            echo $activo;

            $sql = "INSERT INTO csa.activo(codigo,fecha_reg,id_gam,id_subg,nombre,od_clas_am,estado) VALUES('$codigo','$fecha_reg','$id_gam','$id_subg','$nombre','$cod_gc_cnta',$activo);";

            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'act_ind.php';" . "</script>";
    }
    //////////////////////////
    if ($opcion == "10") {
        $fecha_asignacion = $_POST["fecha_asignacion"];
        $id_regact = $_POST["id_regind"];
        $observaciones = $_POST["observaciones"];
        $id_personal = $_POST["id_persona"];
        $estado = $_POST["activo"];
		$cons = "SELECT MAX(id_asignacion+1) FROM csa.asignacion_activos";
		$res =$db->query($cons);
		if($res->rowCount()>0){ 
	 	foreach($res as $max){
		$codigo=$max[0];
	 	}
		}
        try {
            $sql = "INSERT INTO csa.asignacion_activos(id_asignacion,id_regact,id_personal,fecha_asignacion,observaciones,estado) VALUES('$codigo','$id_regact','$id_personal','$fecha_asignacion','$observaciones','$estado');";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se registro correctamente.');" . "top.location = 'asignacion.php';" . "</script>";
    }
    
    if($opcion=="11"){
        $id_dep = $_REQUEST["d"];
        $codigo = strtoupper(trim($_POST["codigo"],' '));
        $nombre = strtoupper(trim($_POST["nombre"],' '));
        $activo = strtoupper(trim($_POST["activo"],' '));
        
        try{
            $sql = "UPDATE csa.departamento SET cd_cnt_dpto='$codigo', nom_dpto='$nombre', estado=$activo, id_usr=$id WHERE id_dpto=$id_dep;";
            $datos = $db->query($sql);
	}
        catch(PDOException $ex)
        {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: ".$ex->getMessage()."<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">"."window.alert('Se modifico correctamente.');"."top.location = 'departamentos.php';"."</script>";
    }
    if ($opcion == "12") {
        $codigo_activo=$_REQUEST["d"];
        $fecha_reg = $_POST["fecha"];
        $id_gam = $_POST["id_gam"];
        $id_subg = $_POST["id_subg"];
        $nombre = $_POST["nombre"];
        $activo = $_POST["activo"];

        $consulta = "SELECT id_gam, descripcion, gc_cnta_sp  FROM csa.gam where estado=true and id_gam=$id_gam;";
        $resultado = $db->query($consulta);
        foreach ($resultado as $fila) {
            $cod_gc_cnta = 'CSA-' . $fila["gc_cnta_sp"];
        }
        try {
            echo $fecha_reg;
            echo $id_gam;
            echo $id_subg;
            echo $nombre;
            echo $cod_gc_cnta;
            echo $activo;

            $sql = "UPDATE csa.activo SET fecha_reg='$fecha_reg', id_gam='$id_gam', id_subg='$id_subg', nombre='$nombre', od_clas_am='$cod_gc_cnta', estado=$activo WHERE codigo=$codigo_activo;";

            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'act_ind.php';" . "</script>";
    }
    if ($opcion == "13") {
        $id_area = $_REQUEST["d"];
        $codigo = strtoupper(trim($_POST["codigo"], ' '));
        $nombre = strtoupper(trim($_POST["nombre"], ' '));
        $id_dpto = strtoupper(trim($_POST["id_dpto"], ' '));
        $activo = strtoupper(trim($_POST["activo"], ' '));
        $cd_ubi1 = (($_POST["id_dpto"]) . '.' . ($_POST["codigo"]));

        try {
            $sql = "UPDATE csa.area SET id_dpto=$id_dpto, cd_cnt_area=$codigo, nom_area='$nombre', estado=$activo, cd_ubi1=$cd_ubi1, id_usr=$id WHERE id_area=$id_area;";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;  
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'area.php';" . "</script>";
    }
    if ($opcion == "14") {
        $id_tipo=$_REQUEST["d"];
        $fecha = strtoupper(trim($_POST["fecha"], ' '));
        $dolar_venta = $_POST["sus_v"];
        $dolar_compra = $_POST["sus_c"];
        $ufv_venta = $_POST["ufv_v"];
        $ufv_compra = $_POST["ufv_c"];

        try {
            $sql = "UPDATE csa.tipo_cambio SET fecha='$fecha', sus_venta=$dolar_venta, sus_compra=$dolar_compra, ufv_venta=$ufv_venta, ufv_compra=$ufv_compra, user_registro=$id, estado=true WHERE id_tc=$id_tipo;";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'tipo_cambio.php';" . "</script>";
    }
    if ($opcion == "15") {
        $id_empresa = $_REQUEST["d"];
        $empresa = strtoupper(trim($_POST["empresa"], ' '));
        $nit = strtoupper(trim($_POST["nit"], ' '));
        $direccion = strtoupper(trim($_POST["direccion"], ' '));
        $telefonos = strtoupper(trim($_POST["fono"], ' '));
        $correo = strtoupper(trim($_POST["correo"], ' '));
        $contacto = strtoupper(trim($_POST["contacto"], ' '));
        $estado = strtoupper(trim($_POST["activo"], ' '));

        try {
            $sql = "UPDATE csa.empresas SET empresa='$empresa', nit='$nit', direccion='$direccion', telefonos='$telefonos', correo='$correo', contacto='$contacto', estado=$estado WHERE id_emp=$id_empresa;";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'empresas_prov.php';" . "</script>";
    }
    if ($opcion == "16") {
        $id_act = $_REQUEST["d"];
        $material = strtoupper(trim($_POST["material"], ' '));
        $estado = strtoupper(trim($_POST["estado"], ' '));

        try {
            $sql = "UPDATE csa.tipo_activo SET act_mat='$material', estado=$estado WHERE id_actmat=$id_act;";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'tipo_material.php';" . "</script>";
    }
    if ($opcion == "17") {
        $id_gam = $_REQUEST["d"];
        $gc_cnta_cm = strtoupper(trim($_POST["completo"], ' '));
        $gc_cnta_sp = strtoupper(trim($_POST["simple"], ' '));
        $descripcion = strtoupper(trim($_POST["des"], ' '));
        $depvidut = strtoupper(trim($_POST["anio"], ' '));
        $depcoef = strtoupper(trim($_POST["porcentaje"], ' '));
        $fecha = date("Y-m-d");
        $estado = strtoupper(trim($_POST["activo"], ' '));

        try {
            $sql = "UPDATE csa.gam SET gc_cnta_cm='$gc_cnta_cm', gc_cnta_sp='$gc_cnta_sp', descripcion='$descripcion', depvidut='$depvidut', depcoef='$depcoef', id_usr=$id, fecha='$fecha', estado=$estado WHERE id_gam=$id_gam;";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'gam.php';" . "</script>";
    }
    if ($opcion == "18") {
        $id_mot = $_REQUEST["d"];
        $motivo = strtoupper(trim($_POST["motivo"], ' '));
        $estado = strtoupper(trim($_POST["activo"], ' '));

        try {
            $sql = "UPDATE csa.motivo_baja SET motivo='$motivo', id_usuario=$id, estado=$estado WHERE id_motivo=$id_mot;";
            $datos = $db->query($sql);
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        //echo $sql;
        echo "<script type=\"text/javascript\">" . "window.alert('Se modifico correctamente.');" . "top.location = 'motivo_baja.php';" . "</script>";
    }
    //////////////////////////
    $db = null;
} catch (PDOException $e) {
    echo "Se tiene un problema con la conexion.<br>Mensaje de error: " . $e->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
}
?>