<?php

include_once '../mod_configuracion/clases/conexion.php';
session_start();
$db = Core::Conectar();
        $idpersonal=$_GET['id'];
        $consulta = "UPDATE csa.usuarios SET estado=TRUE WHERE id_personal='$idpersonal';";
        $resultado = $db->query($consulta);
        header("location:../mod_usuarios/reg_personal_1.php");
?>

