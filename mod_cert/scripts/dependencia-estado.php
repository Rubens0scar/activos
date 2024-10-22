<?php
include("clases/class.pg.php");
include("clases/class.combos.php");
$estados = new selects();
$estados->code = $_GET["code"];
$estados = $estados->cargarEstados();
foreach($estados as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>