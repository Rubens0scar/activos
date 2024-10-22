<?php

class selects extends Pg
{
	var $code = "";
	
	function cargarPaises()
	{
		$consulta = parent::consulta("SELECT coddepto, nomdepto FROM siahv.\"t_Depto\" ORDER BY coddepto");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$paises = array();
			while($pais = parent::fetch_assoc($consulta))
			{
				$code = $pais["coddepto"];
				$name = $pais["nomdepto"];				
				$paises[$code]=$name;
			}
			return $paises;
		}
		else
		{
			return false;
		}
	}
	function cargarEstados()
	{
		//$consulta = parent::consulta("SELECT Name FROM province WHERE Country = '".$this->code."'");
                $consulta = parent::consulta("SELECT codprovi, nomprovi FROM siahv.t_provincia where coddepto='".$this->code."'");

		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
                                $code = $estado["codprovi"];
				$name = $estado["nomprovi"];				
				$estados[$code]=$name;
			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
		
	function cargarCiudades()
	{
		//$consulta = parent::consulta("SELECT Name FROM city WHERE Province = '".$this->code."'");
                $consulta = parent::consulta("SELECT codmunicip, nommunicip FROM siahv.t_municipio where codprovi= '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$ciudades = array();
			while($ciudad = parent::fetch_assoc($consulta))
			{   
                                $code = $ciudad["codmunicip"];
				$name = $ciudad["nommunicip"];				
				$ciudades[$code]=$name;
			}
			return $ciudades;
		}
		else
		{
			return false;
		}
	}
        
        function cargarCie()
	{
		$consulta = parent::consulta("SELECT \"CIE_CODIGO\", \"CIE_ALFA\"||' => '|| \"CIE_DESCRIPCION\" descripcion FROM siahv.\"Tbl_cie10\" WHERE \"CIE_ALFA\" LIKE 'Q%' ORDER BY \"CIE_DESCRIPCION\"");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$cie = array();
			while($pais = parent::fetch_assoc($consulta))
			{
				$code = $pais["CIE_CODIGO"];
				$name = $pais["descripcion"];				
				$cie[$code]=$name;
			}
			return $cie;
		}
		else
		{
			return false;
		}
	}
}
?>