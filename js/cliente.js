function Factory() {
    this.createCliente = function (cli) {
        var cliente;
 
        cliente = classCliente(cli);
 
        return cliente;
    }
}

var classCliente = (function(cli){

	my = {};

	my.id  = cli.id;
	my.nombres = cli.nombres;
	my.ciudad  = cli.ciudad;
	my.sexo = cli.sexo;
	my.telefono = cli.telefono;
	my.fecha_nacimiento = cli.fechaNacimiento;
	my.direccion = cli.direccion;
	my.provincia = cli.provincia;
	my.fechaAlta = cli.fechaAlta;

	return my;

});