
<?php
include("conexion.php");



if(isset($_GET['id'],$_GET['getEstado'],$_GET['getTemperatura']))
{
	$id=$_GET['id'];
	$estado=$_GET['getEstado'];
	$temperatura=$_GET['getTemperatura'];
	getEstado($id,$estado,$temperatura);
}

elseif(isset($_GET['id'],$_GET['setEstado'],$_GET['setTemperatura']))
{
	$id=$_GET['id'];
	$estado=$_GET['setEstado'];
	$temperatura=$_GET['setTemperatura'];
	setEstado($id,$estado,$temperatura);
}
elseif(isset($_GET['id'],$_GET['setMA']))
{
	$id=$_GET['id'];
	$estado=$_GET['setMA'];
	setManualActivo($id,$estado);
}
elseif(isset($_GET['id']))
{
	$resultado = leerEstado();
	$finalResul = $resultado[15] . "," . $resultado[31] . $resultado[32] .$resultado[33].$resultado[34].".".$resultado[47];
	echo $finalResul;
}
else{
	$stri = "dispositivo";
	$res = select($stri);
	echo $res;
}
?>
