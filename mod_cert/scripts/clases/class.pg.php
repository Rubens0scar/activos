<?php
class Pg
{
  var $conexion;
  function Pg()
  {
  	if(!isset($this->conexion))
	{   
            //$localhost="10.1.3.19";
		$localhost="localhost";
            $username="postgres";
            //$password="ruben0scar";
		$password="AngelaR";
            $database="db_salud";
            $port="5432";
  		//$this->conexion = (mysql_connect("localhost","root","")) or die(mysql_error());
  		//mysql_select_db("ubicacion",$this->conexion) or die(mysql_error());
                //$this->conexion = pg_connect($localhost,$port,$username,$password);
                $this->conexion = pg_connect("host=$localhost port=5432 dbname=$database user=postgres password=$password") or die( "Unable to select database");
                //pg_select_db($database) or die( "Unable to select database");

  	}
  }

 function consulta($consulta)
 {
	$resultado = pg_query($this->conexion,$consulta);
  	if(!$resultado)
	{
  		echo 'PG Error: ' . pg_last_error();
	    exit;
	}
  	return $resultado; 
  }
  
 function fetch_array($consulta)
 { 
  	return pg_fetch_array($consulta);
 }
 
 function num_rows($consulta)
 { 
 	 return pg_num_rows($consulta);
 }
 
 function fetch_row($consulta)
 { 
 	 return pg_fetch_row($consulta);
 }
 function fetch_assoc($consulta)
 { 
 	 return pg_fetch_assoc($consulta);
 } 
 
}

?>