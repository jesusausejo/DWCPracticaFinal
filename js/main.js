clienteListView.init();
clienteView.init();

clienteList.cargar();

$(".formulario").hide();

$('body').on("click","#addCliente", function(){
	// $(".tabla").hide();
	// $(".formulario").show();
	clienteList.showModalNew();
});

$('body').on("click","#enviar", function(){
	if( $('#alternativas1F').prop('checked') ) {
	    var sexo = $('#alternativas1F').val();
	}
	if( $('#alternativas1M').prop('checked') ) {
	    var sexo = $('#alternativas1M').val();
	}
	var json = {
		nombres: $("#nombres1").val(),
		ciudad: $("#ciudad1").val(),
		telefono: $("#telefono1").val(),
		alternativas: sexo,
		fecha_nacimiento: $("#datepicker1").val(),
		sexo: sexo,
		fechaNacimiento: $("#datepicker1").val()
	}
	$('#editarFormulario').modal('hide');
	clienteList.crearCliente(json);
});

$('.tabla').on("click", ".borrar", function(){
	var id = $(this).closest("tr").attr("data-id");
	clienteList.borrar(id);
});

$('.tabla').on("click", ".editar", function(){
	var id = $(this).closest("tr").attr("data-id");
	var json = {
		id: id
	}
	clienteList.modificar(json, "consulta");
});

$('body').on("click","#enviarEdit", function(){
	var id = $(this).closest("div#editarFormulario").attr("data-id");
	if( $('#alternativas2F').prop('checked') ) {
	    var sexo = $('#alternativas2F').val();
	}
	if( $('#alternativas2M').prop('checked') ) {
	    var sexo = $('#alternativas2M').val();
	}
	var json = {
		cliente_id: id,
		nombres: $("#nombres2").val(),
		ciudad: $("#ciudad2").val(),
		telefono: $("#telefono2").val(),
		alternativas: sexo,
		fecha_nacimiento: clienteList.formatoFecha($("#datepicker2").val()),
		sexo: sexo,
		fechaNacimiento: clienteList.formatoFecha($("#datepicker2").val())
	}

	clienteList.modificar(json, "envio");
});

$('body').on("click", "#aceptar", function(){
	$(".tabla").show();
	$(".formulario").hide();
});

Handlebars.registerHelper("fecha", function(fecha){
	if(fecha!=undefined){
		var barra = "/";
		var fechaArray0 = fecha.split(" ");

		var fechaArray = fechaArray0[0].split("-");
		fechaArray.reverse();
		fecha = fechaArray[0]+barra+fechaArray[1]+barra+fechaArray[2];


		return fecha;
	}
});

Handlebars.registerHelper("genero", function(genero, cadena){
	if(genero!=undefined){
		if(genero==cadena){
			return "checked";
		}	}
});