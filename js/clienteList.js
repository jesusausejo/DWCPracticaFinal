var clienteList = (function(){

	my = {};

	var clientes = [];
	my.clientes = clientes;
	var factory = new Factory();

	var cargar = function(){
		
		$.post( config.getUrl()+"consulta.php", function( data ) {
			var context = {
	    		person:[]
	    	};
	        for (var i = 0; i < data.length; ++i) {
		        var id = data[i].id;
		        var nombre = data[i].nombres;
		        var ciudad = data[i].ciudad;
		        var sexo = data[i].sexo;
		        var telefono = data[i].telefono;
		        var fechaNac = data[i].fechaNacimiento;
		        context.person.push({
		          id: id,
		          nombres: nombre,
		          ciudad: ciudad,
		          sexo: sexo,
		          telefono: telefono,
		          fechaNacimiento: fechaNac
		        });
		        clientes.push(factory.createCliente(context.person[i]));
	     	}
	     	events.publish('clientListTable', context);
		}, "json");

	};
	my.cargar = cargar;

	var modificar = function(json, tipo){
		if(tipo == "consulta"){
			$.post( config.getUrl()+"actualizar.php", json, function( data ) {
				var context = {
		    		person:[]
		    	};
		    	context.person.push(data[0]);
		     	events.publish('printModal', context);
			}, "json");
		}else{
			json.submit = "1";
			$.post( config.getUrl()+"actualizar.php", json, function( data ) {
				var context = {
	    			person:[]
	    		};
	    		var indice = encontrarCliente(data.id);

	    		json.id = data.id;
	    		clientes.splice(indice,1);

				clientes.push(factory.createCliente(json));
				var lista = {
					person: clientes
				}
				events.publish('showTableAgainEdit', lista);

			}, "json");
		}
	};
	my.modificar = modificar;

	var ver = function(json){
		$.post( config.getUrl()+"actualizar.php", json, function( data ) {
			var context = {
	    		person:[]
	    	};
	    	context.person.push(data[0]);
	     	events.publish('printModalVer', context);
		}, "json");
	};
	my.ver = ver;

	var encontrarCliente = function(id){
		for (var i=0; i<=clientes.length; i++) {
			if(clientes[i].id==id) return i;
		}
	}

	var showModalNew = function(){
		events.publish('showNewModal');
	}
	my.showModalNew = showModalNew;
	
	var recorreClientes = function(id){
		for (var i = 0; i <= clientes.length; i++) {
			if(clientes[i].id==id) return i;
		}
	}
	my.recorreClientes = recorreClientes;

	var borrar = function(id){
		var json = {
			id: id,
			list: clientes
		}
		$.post( config.getUrl()+"eliminar.php", json, function(data) {
			events.publish('removeTr', json);
		}, "json");
	};
	my.borrar = borrar;

	var crearCliente = function(json){
		json.submit = "1";
		json.fecha_nacimiento = formatoFecha(json.fecha_nacimiento);
		json.fechaNacimiento = formatoFecha(json.fechaNacimiento); // 01/02/2018
		$.post( config.getUrl()+"nuevo.php", json, function(data) {

	    	
			json.id = data.id;
			clientes.push(factory.createCliente(json));
			var lista = {
				person: clientes
			}
			events.publish('showTableAgain', lista);
		}, "json");

		
	};
	my.crearCliente = crearCliente;

	var formatoFecha = function(fecha){
		if(fecha!=""){
			var hora = " 00:00:00";
			var guion = "-";

			var fechaArray = fecha.split("/");
			fechaArray.reverse();
			fecha = fechaArray[0]+guion+fechaArray[2]+guion+fechaArray[1]+hora;
			fecha+"";//2018 3 1
		}else{
			fecha="0000-00-00 00:00:00";
		}

		return fecha;
	}
	my.formatoFecha = formatoFecha;

	return my;

})();