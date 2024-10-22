<?php
include_once 'clases/conexion.php';
session_start();
$_SESSION=array();

if ($_POST["usuario"]){
	$db = Core::Conectar();
	$usuario = $_POST["usuario"];
	$contrasenia = md5($_POST["contrasenia"]);
	$sql="SELECT u.id_usuario, u.usuario, p.nombres, p.apaterno, p.amaterno, c.descripcion as cargo, p.ci, u.pws_usuario, u.estado 
	FROM usuarios u, personal p, cargo c
	WHERE u.estado=1 and u.id_personal=p.id_personal and c.id_cargo=p.id_cargo and u.usuario='$usuario' and u.pws_usuario='$contrasenia'";
	
	$datos = $db->query($sql);
	if ($datos) {
		$filas = $datos->fetchAll(PDO::FETCH_ASSOC);

    	$numeroDeFilas = count($filas);

		if ($numeroDeFilas == 1) {
			$fila = $filas[0];

			$_SESSION["usuario"]=$fila['usuario'];
			$_SESSION["pws_usuario"]=$fila['pws_usuario'];
			$_SESSION["nombres"]=$fila['nombres'];
			$_SESSION["apaterno"]=$fila['apaterno'];
			$_SESSION["amaterno"]=$fila['amaterno'];
			$_SESSION["cargo"]=$fila['cargo'];
			$_SESSION["id_usuario"]=$fila['id_usuario'];
        	$_SESSION["ci"]=$fila['ci'];

			//echo 'ingreso al numeride fias';

			header("Location: ../mod_inicio/index.php");
		} else {
			?>
			<script type="text/javascript">
				alert("\tError de autenticación: No se encontró un registro exacto. \n \t Comunicarse con Sistemas.");
				window.location = "../index.php";
			</script>
			<?php 
		}
	} else {
		?>
		<script type="text/javascript">
			alert("\tNo se encontró ningun registro.");
			window.location = "../index.php";
		</script>
		<?php 
	}

	//echo $row[0] . '<br/>';
		// if ($datos->rowCount()==1){
		// 	foreach($datos as $row){
		// 		$_SESSION["usuario"]=$row[1];
		// 		$_SESSION["pws_usuario"]=$row[7];
		// 		$_SESSION["nombres"]=$row[2];
		// 		$_SESSION["apaterno"]=$row[3];
		// 		$_SESSION["amaterno"]=$row[4];
		// 		$_SESSION["cargo"]=$row[5];
		// 		$_SESSION["id_usuario"]=$row[0];
        //         $_SESSION["ci"]=$row[6];
		// 	}
		// 	header("Location: ../mod_inicio/index.php");
		// }else
		// {
		// 	?>
		// 	<script type="text/javascript">
		// 	alert("\tUsuario o Password incorrecto \n \t Favor de verificar los datos");
		// 	window.location = "../index.php";
		// 	</script>
		// 	<?php 
		// }
}
?>		
		