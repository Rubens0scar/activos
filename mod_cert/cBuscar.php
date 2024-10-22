<?PHP
include_once 'clases/conexion.php';
//Este codigo funciona OK
try {
	$db = Core::Conectar();

	$id_gam = $_POST["gam"]; 
	
	try{
		$sql = "SELECT depcoef FROM csa.gam where id_gam=$id_gam";
           
		$resultado=$db->query($sql);

		if($resultado->rowCount() == 1){
			foreach($resultado as $fila){
				setcookie("depcoef", $fila[0]);
                        }
                        echo "<script type=\"text/javascript\">"."top.location = 'activos.php';"."</script>";
		}
		else{
			echo "<script type=\"text/javascript\">"."top.location = 'FEntidades.php?c=".$carnet."';</script>";
		}
	}
    catch(PDOException $ex)
    {
    	echo "hubo un problema con la conexion al buscar los datos del funcionario.<br>mensaje de error: ".$ex->getMessage()."<br>Por favor comuniquese con personal de sistemas.";
    }
	
	/*** close the database connection ***/
    $db = null;
}
catch(PDOException $e)
{
	echo "Se tiene un problema con la conexion.<br>Mensaje de error: ".$e->getMessage()."<br>Por favor comuniquese con personal de sistemas.";
}

?>