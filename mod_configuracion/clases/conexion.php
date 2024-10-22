<?php
/*class Core{ 	
	public static function Conectar()  {
	$host="localhost";
	$port="5432";
        $user="postgres";
	$pass="12345678"; 
	
	$dbname="db_activos_csa";
	
    	$conexion = new PDO("pgsql:host=localhost; port=5432; dbname=db_activos_csa;", "$user", "$pass" ) or die ("FALLO LA CONEXION A LA BASE DE DATOS"); 
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		return $conexion;
	}
} */

class Core{ 	
	public static function Conectar()  {
	$host='NALTICEP058\SQLEXPRESS';
	$dbname='activos_csa';
    $user='soporte';
	$pass='Act1vos2024&';
	$port=1432; 
	
	try {
		$conexion = new PDO("sqlsrv:server=$host;Database=$dbname", $user, $pass);
    	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	echo "Conexión exitosa!";
	} catch (PDOException $exp) {
		echo ("NO SE LOGRÓ LA CONEXION A LA BASE DE DATOS CORRECTAMENTE:$dbname, error:$exp");
	} 			
		return $conexion;
	}
}

?>