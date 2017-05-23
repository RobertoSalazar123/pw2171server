<?php
require("utilerias.php")
$conexion=conecta();//seridor y bd
$u=GetSQLValueString($_POST["txtusuario"],"text");
$n=GetSQLValueString($_POST["txtnombre"],"text");
$c=GetSQLValueString($_POST["txtclave"],"text");
$d=GetSQLValueString($_POST["txtDepto"],"int");
$v=GetSQLValueString($_POST["txtVigencia"],"int");
$consulta=sprintf("insert into usuarios values(%s,%s,%s,%d,%d)",$u,$n,$c,$d,$v);


?>