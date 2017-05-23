<?php
include("utilerias.php");
$conexion=conecta();
$consulta=sprintf("select * from usuarios order by usuario");
$resultado=mysql_query($consulta);
$tabla="<table border=1>";
$tabla.="<tr>";
$tabla.="<th>usuario</th>";
$tabla.="<th>nombre</th>";
$tabla.="<th>departamento</th>";
$tabla.="<th>vigencia</th>";
$tabla.="<th>accion</th>";
$tabla.="</tr>";
//$resultado es un dataset
if(mysql_num_rows($resultado)>0){ //hay registros
	while($registros=mysql_fetch_array($resultado)){
		$tabla.="<tr>";
		$tabla.="<td>".$registros["usuario"]."</td>";
		$tabla.="<td>".$registros["nombre"]."</td>";
		$tabla.="<td>".$registros["departamento"]."</td>";
		$tabla.="<td>".$registros["vigencia"]."</td>";
		$tabla.="<td> <a href='guardabaja.php?txtusuario=".$registros["usuario"]."'>baja</a></td>";
		$tabla.="</tr>";
	}
	}else{//no hay registros
		$tabla.="<tr><td colspan=6>Sin Registros</td></tr>";
	}
	$tabla.="</table>";
	print($tabla);

?>