(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['modalVer'] = template({"1":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "	<div class=\"modal fade\" id=\"verUser\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\" data-id=\""
    + alias4(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\r\n	  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\r\n	    <div class=\"modal-content\">\r\n	      <div class=\"modal-header\">\r\n	        <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Datos del cliente:</h5>\r\n	        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\r\n	          <span aria-hidden=\"true\">&times;</span>\r\n	        </button>\r\n	      </div>\r\n	      <form>\r\n	      <div class=\"modal-body\">\r\n	        <fieldset disabled>\r\n				<div class=\"form-group\">\r\n					<label \">NOMBRES</label>\r\n					<input type=\"text\" class=\"form-control\" id=\"nombres3\" value=\""
    + alias4(((helper = (helper = helpers.nombres || (depth0 != null ? depth0.nombres : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"nombres","hash":{},"data":data}) : helper)))
    + "\" onkeyup=\"this.value=this.value.toUpperCase()\">\r\n				</div>\r\n				<div class=\"form-group\">\r\n					<label \">CIUDAD</label>\r\n					<input type=\"text\" class=\"form-control\" id=\"ciudad3\" value=\""
    + alias4(((helper = (helper = helpers.ciudad || (depth0 != null ? depth0.ciudad : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"ciudad","hash":{},"data":data}) : helper)))
    + "\" onkeyup=\"this.value=this.value.toUpperCase()\">\r\n				</div>\r\n				<div class=\"form-check form-check-inline\">\r\n					\r\n					<label class=\"form-check-label\">\r\n						<input class=\"form-check-input\" type=\"radio\" name=\"exampler\" id=\"alternativas3M\" value=\"M\" "
    + alias4((helpers.genero || (depth0 && depth0.genero) || alias2).call(alias1,(depth0 != null ? depth0.sexo : depth0),"M",{"name":"genero","hash":{},"data":data}))
    + ">\r\n					MASCULINO\r\n					</label>\r\n				</div>\r\n				<div class=\"form-check form-check-inline\">\r\n					\r\n					<label class=\"form-check-label\">\r\n						<input class=\"form-check-input\" type=\"radio\" name=\"exampler\" id=\"alternativas3F\" value=\"F\" "
    + alias4((helpers.genero || (depth0 && depth0.genero) || alias2).call(alias1,(depth0 != null ? depth0.sexo : depth0),"F",{"name":"genero","hash":{},"data":data}))
    + ">\r\n					FEMENINO\r\n					</label>\r\n				</div>\r\n				<div class=\"form-group\">\r\n					<label \">TELEFONO</label>\r\n					<input type=\"text\" class=\"form-control\" id=\"telefono3\" value=\""
    + alias4(((helper = (helper = helpers.telefono || (depth0 != null ? depth0.telefono : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"telefono","hash":{},"data":data}) : helper)))
    + "\" onkeyup=\"this.value=this.value.toUpperCase()\">\r\n				</div>\r\n				<div class=\"form-group\">\r\n					<label \">FECHA DE NACIMIENTO (CALENDARIO)</label>\r\n					<input type=\"text\" class=\"form-control\" name=\"fecha_nacimiento\" value=\""
    + alias4((helpers.fecha || (depth0 && depth0.fecha) || alias2).call(alias1,(depth0 != null ? depth0.fechaNacimiento : depth0),{"name":"fecha","hash":{},"data":data}))
    + "\" id=\"datepicker3\">\r\n				</div>\r\n				\r\n				<fieldset disabled>\r\n	      </div>\r\n	      <div class=\"modal-footer\">\r\n			<button type=\"button\" class=\"btn btn-dark\" id=\"cancelView\" data-dismiss=\"modal\">ACEPTAR</button>\r\n	      </div>\r\n	  </form>\r\n	    </div>\r\n	  </div>\r\n	</div>\r\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.person : depth0),{"name":"each","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
})();