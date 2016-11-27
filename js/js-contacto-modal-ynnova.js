$(document).ready(function(){
	$("a.Fancy").fancybox({
		'autoScale':	true,
		'autoDimensions': true,
		'padding':	10,
		'margin':	20,
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayColor' : '#000'
	});

})

function EnvioConsulta(ID){
	var Aux=ID.value;
	
	$.ajax({
		type: "post",
		url: "_envioconsulta.php",
		data: $("#FormularioContacto").serialize(),
		beforeSend: function(objeto){
			ID.value='Aguarde...';
			$(ID).attr("disabled", "disabled");
        },
		complete: function(objeto, exito){
			ID.value=Aux;
			$(ID).removeAttr("disabled");
        },
		error: function(objeto, quepaso, otroobj){
            alert("Hubo un error. Reintente. Si el problema persiste, comuniquese con el webmaster");
        },
		success: function(datos){
			lista = datos.split(":::");
			if(lista[0]=='ok'){
				alert(unescape(lista[1]));
				$.fancybox.close();
				}
			else if(lista[0]=='error' && lista[1])
				{
				alert(unescape(lista[1]));
				}
			else
				{
				alert(unescape(datos));
				}
		}

	});

}

