<?php
include("utilerias.php");
function validausuario($usuario,$clave){
		//computadora, usuario, contraseña
	//$conecxion=mysql_connect("localhost","root","");
	//mysql_select_db("pw2171");
    $conecxion=conecta();
	$usuario=GetSQLValueString($usuario,"text");
	$clave=GetSQLValueString(md5($clave),"text");
	$consulta=sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s",$usuario,$clave);
	//$consulta="select usuario,clave from usuarios where usuario='".$usuario."'' and clave='".md5($clave)."'limit 1";
    $resultado= mysql_query($consulta);
    if(mysql_num_rows($resultado)>0){
        print("<a href='alta.php'>alta</a>");
         print("<a href='baja.php'>Baja</a>");
          print("<a href='Cambio.php'>Cambio</a>");
           print("<a href='Consulta.php'>Consulta</a>");
    	//print("Bienvenido".$usuario.":)");
    }
    else{
    	print("No eres bienvenido");
    }
	}
if(isset($_POST["txtusuario"])&& isset($_POST["txtclave"]))
{
    $usuario=$_POST["txtusuario"];
    $clave  =$_POST["txtclave"];
    validausuario($usuario,$clave);

}
else{
	print("<a href='acceso.html'> Valida tus datos </a>");
}
?>