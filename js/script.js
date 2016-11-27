$(document).ready(function(){
	
	$('input.submit').click(function(){
		var correlativo_factura = $('.correlativo_factura').val();
		var fecha_factura_emitida = $('.fecha_factura_emitida').val();
		var observacion = $('.observacion').val();
		var id_producto = $('.id_producto').val();
		
		$('#carga').load('./almapro_in.php', {correlativo_factura: correlativo_factura, fecha_factura_emitida: fecha_factura_emitida, observacion:observacion,id_producto:id_producto }, alert ('Termino de cargar :D'));
		
		return false;
	});
	
});
