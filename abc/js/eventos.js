var iniciaApp=function(){
	var entrar=function(){
		alert($("#txtusuario").val());
		alert($("#txtclave").val());
	}
	var teclaUsuario=function(tecla){
		if(tecla.which==13){
			$("#txtclave").focus();
		}
	}
	var teclaClave=function(tecla){
		if(tecla.which==13){
			entrar();
		}
	}
	$("#btnentrar").on("click",entrar);
	$("#txtusuario").on("keypress",teclaUsuario);
	$("#txtclave").on("keypress",teclaClave);

}
$(document).ready(iniciaApp);