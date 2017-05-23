<?php
include("utilerias.php");
print("<form action='guardaalta.php' method='post'>");
print("<input type='text' placeholder='usuario' name='txtusuario'>");
print("<input type='text' placeholder='nombre' name='txtnombre'>");
print("<input type='text' placeholder='clave' name='txtclave'>");
print("<input type='text' placeholder='depto' name='txtDepto'>");
print("<input type='text' placeholder='vigencia' name='txtvigencia'>");
print("<input type='submit' value='Guardar'>");
print("</form>");	
?>
