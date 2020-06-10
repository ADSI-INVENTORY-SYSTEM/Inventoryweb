/* Funcion buscar estado */
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'Buscarcate.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});

/* Funcion buscar estado */

$(buscar_datos2());

function buscar_datos2(consulta){
	$.ajax({
		url: 'Buscarestado.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda2', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos2(valor);
	}else{
		buscar_datos2();
	}
});

/* Funcion buscar fechas */

$(buscar_datos3());

function buscar_datos3(consulta){
	$.ajax({
		url: 'Buscarfecha.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda3', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos3(valor);
	}else{
		buscar_datos3();
	}
});

/* Funcion buscar usuarios */

$(buscar_datos4());

function buscar_datos4(consulta){
	$.ajax({
		url: 'Buscarusu.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda4', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos4(valor);
	}else{
		buscar_datos4();
	}
});




