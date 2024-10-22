<?php

include_once '../mod_configuracion/clases/conexion.php';
session_start();
$db = Core::Conectar();
		$id_personal= $_POST["id_personal"];
		$usuario=$_POST["usuario"];
		$password=$_POST["password"];
		$rol=$_POST["rol"];
       
        $pwd=  md5($password);
        $estado=true;
        try {
            $sql = "INSERT INTO csa.usuarios(id_personal,usuario,pws_usuario,rol,estado) VALUES('$id_personal','$usuario','$pwd','$rol',false);";
            $datos = $db->query($sql);
            
        } catch (PDOException $ex) {
            echo "hubo un problema con la conexion al almacenar las aplicaciones.<br>mensaje de error: " . $ex->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
        }
        header("location:../mod_usuarios/reg_personal_1.php");
?>

