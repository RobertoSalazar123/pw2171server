var iniciaApp=function(){
	var entrar=function(){
		var usuario=$("#txtusuario").val();
		var clave=$("#txtclave").val();
	var parametros="opcion=valida"+"&usuario"+=usuario+"&clave"+=clave+"&id="+Math.random();
	var validaEntrada= $.ajax({
		method:"POST",
		url:"php/datos.php",
		data:parametros,
		dataType:"json"
	});
	validaEntrada.done(function(data){
		alert(data.respuesta);
	});
	validaEntrada.fail(function(jqError,textStatus){
		//alert("Solicitud Fallida:"+textStatus);
		if(data.respuesta==true){
			$(#"datosUsuario").hide();
			$("nav").show("slow");
			$("#secusuario").show("slow");
		}
		else
		{
			alert("Usuario no Válido");
		}
	});
	validaEntrada.fail(function(jqError,textStatus){
		alert("Solicitud Rechazada:"+textStatus);
	});

		/*alert($("#txtusuario").val());
		alert($("#txtclave").val());*/
	}
	var= datousuario=function(){
		var usuario=$("txtnomusuario").val();
		var parametros="opcion=datousuario"+"&usuario"+usuario+"&id"+Math.random();
		var du=$.ajax({
			method:"POST",
		url:"php/datos.php",
		data:parametros,
		dataType:"json"
		});
		du.done(function(data){
			if(data.respuesta==true){
				$("#txtnombre").val(data.nombre);
				$("#txtnomclave").val(data.clave);
				$("#txtnomdepto").val(data.departamentos);
				$("#txtnomvigencia").val(data.vigencia);
			}else{
				$("#txtnombre").focus();
			}

		});
		du.fail(function(jqError,textStatus){

		});
	}
	var teclaUsuario=function(tecla){
		if(tecla.which==13){
			datosUsuario();
			//$("#txtclave").focus();
		}
	}
	var teclaClave=function(tecla){
		if(tecla.which==13){
			entrar();
		}

	}
	var altas=function(){
		var nombre=$("#txtnomusuario").val();
		var nombre=$("#txtnombre").val();
		var nombre=$("#txtnomclave").val();
		var nombre=$("#txtnomdepto").val();
		var nombre=$("#txtnomvigencia").val();
		var parametros="opcion=alta"   +
		               "&usuario="     +usuario+
		               "&departamento="+departamento+
		               "&vigencia="    +vigencia+
		               "&id="          +Math.random();
		var validaEntrada= $.ajax({
		method:"POST",
		url:"php/datos.php",
		data:parametros,
		dataType:"json"
	    });
	    altausuario.done(function(data){
	    	if(data.respuesta==true){
	    		alert("usuario dado de alta");
	    	}else{
	    		alert("usuario existente o no se pudo registrar");
	    	}

	    });
	    altausuario.fail(function(jqError,textStatus){

	    });
	
	}
	$("#btnentrar").on("click",entrar);
	$("#txtusuario").on("keypress",teclaUsuario);
	$("#txtclave").on("keypress",teclaClave);
	$("#txtnomusuario").on("keypress",teclaUsuario);
	$("#btnaltas").on("click",altas);

}
$(document).ready(iniciaApp);