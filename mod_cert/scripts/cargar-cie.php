<?php
include("clases/class.pg.php");
include("clases/class.combos.php");
$selects = new selects();
$paises = $selects->cargarCie();
foreach($paises as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>