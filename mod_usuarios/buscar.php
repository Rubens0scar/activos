<?php
include_once '../mod_configuracion/clases/conexion.php';
$db = Core::Conectar();

$op=$_REQUEST["op"];

$consultaBusqueda = $_POST['valorBusqueda'];

if($op=="1"){
    //$consulta = "SELECT id_personal || '%' || id_area || '%' || cd_ubicacion || '%' || cd_ubi3 || '%' || ci_personal || '%' || nom_personal || '%' || paterno_personal || '%' || materno_personal || '%' || cargo_personal || '%' || dir_personal || '%' || fn_personal || '%' || case estado when true then '1' else '0' end datos FROM csa.personal where ci_personal='" . $consultaBusqueda . "';";
    $consulta = "SELECT id_personal || '%' || id_area || '%' || cd_ubicacion || '%' || cd_ubi3 || '%' || ci_personal || '%' || nom_personal || '%' || paterno_personal || '%' || materno_personal || '%' || cargo_personal || '%' || dir_personal || '%' || fn_personal || '%' || estado datos FROM csa.personal where ci_personal='" . $consultaBusqueda . "';";

    $resultado = $db->query($consulta);

    $mensaje = "";

    foreach ($resultado as $fila) {
        $mensaje = $fila["datos"];
    }

    echo $mensaje;
}

if($op=="2"){
    //$consulta = "SELECT id_personal || '%' || id_area || '%' || cd_ubicacion || '%' || cd_ubi3 || '%' || ci_personal || '%' || nom_personal || '%' || paterno_personal || '%' || materno_personal || '%' || cargo_personal || '%' || dir_personal || '%' || fn_personal || '%' || case estado when true then '1' else '0' end datos FROM csa.personal where ci_personal='" . $consultaBusqueda . "';";
    $consulta = "SELECT count(id_usuario) datos FROM csa.usuarios where upper(usuario)=upper('" . $consultaBusqueda . "');";

    $resultado = $db->query($consulta);

    $mensaje = "";

    foreach ($resultado as $fila) {
        $mensaje = $fila["datos"];
    }

    echo $mensaje;
}

if($op=="3"){
    //$consulta = "SELECT id_personal || '%' || id_area || '%' || cd_ubicacion || '%' || cd_ubi3 || '%' || ci_personal || '%' || nom_personal || '%' || paterno_personal || '%' || materno_personal || '%' || cargo_personal || '%' || dir_personal || '%' || fn_personal || '%' || case estado when true then '1' else '0' end datos FROM csa.personal where ci_personal='" . $consultaBusqueda . "';";
    $consulta = "SELECT id_usuario || '%' || id_personal || '%' || usuario || '%' || pws_usuario || '%' || estado datos FROM csa.usuarios where id_personal=" . $consultaBusqueda . ";";

    $resultado = $db->query($consulta);

    $mensaje = "";

    foreach ($resultado as $fila) {
        $mensaje = $fila["datos"];
    }

    echo $mensaje;
}