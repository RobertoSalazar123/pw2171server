<?php
require("utilerias.php");
function valida(){
	$respuesta  =false;
	$conexion   =conecta();
	$u          =GetSQLValuesString($_POST["usuario"],"text");
	$c          =GetSQLValuesString(md5($_POST["clave"]),"text");
	$consulta   =sprintf("select usuario, clave from usuarios where usuario=%s and clave=%s limit 1",$u,$c);
	$resultado  =mysql_query($consulta);
	if(mysql_num_rows($resultado)>0){
		$respuesta=true;
	}
	$salidaJSON = array('respuesta' => $respuesta );
	print(json_encode($salidaJSON));
}
function datosUsuario(){
	$respuesta =false;
	$usuario   =GetSQLValuesString($POST["usuario"],"text");
	$conexion  =conecta();
	$consulta  =sprintf("select * from usuarios where usuario=%s limit 1",$usuario);
	$resultado =mysql_query($consulta);
	if(mysql_num_rows($resultado)>0){
		$respuesta=true;
		if($registro=mysql_fetch_array($resultado)){
		   $nombre       =$registro["nombre"];
		   $clave        =$registro["clave"];
		   $departamento =$registro["departamento"];
		   $vigencia     =$registro["vigencia"];
		}
	}
	$salidaJSON=array('respuesta'    => $respuesta,
		              'nombre'       => $nombre,
		              'clave'        => $clave,
		              'departamento' => $departamento,
		              'vigencia'     => $vigencia);
	print json_encode($salidaJSON);
}
function alta(){
	$respuesta=false;
	$conexion=conecta();
	$u=GetSQLValuesString($_POST["usuario"],"text");
	$n=GetSQLValuesString($_POST["nombre"],"text");
	$c=GetSQLValuesString($_POST["clave"],"text");
	$d=GetSQLValuesString($_POST["departamento"],"int");
	$v=GetSQLValuesString($_POST["vigencia"],"int");
	//buscar si existe
	$busca=sprintf("select form usuarios where usuario=%s",$u);
	$resultadoBusca=mysql_query($busca);
	if(mysql_num_rows($resultadoBusca)==0){//si no existe
        $inserta=sprintf("insert into usuarios values(default,%s,%s,%s;%d,%d)",$u,$n,$c,$d,$v);
        mysql_query($inserta);
        if(mysql_affected_rows()>0){
        	$respuesta=true;
        }

	}
	$salidaJSON = array('respuesta' => $respuesta );
	print json_encode($salidaJSON);
}
//menu principal
$opcion=$_POST["opcion"];
switch ($opcion) {
	case 'valida':
		valida();
		break;
	case 'datosUsuario':
	      datosUsuario();
	      break;
	case 'alta':
	     alta();
	     break;
	default:
		# code...
		break;
}
?>