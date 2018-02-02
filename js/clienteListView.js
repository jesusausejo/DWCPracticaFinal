var clienteListView = (function () {


   function listTable(context) {
      var HTML = Handlebars.templates.todo(context);
      $('#result').html(HTML);
   }
   function showTable(context) {
      $('#modalDone').modal('show');
      var HTML = Handlebars.templates.todo(context);
      $('#result').html(HTML);

      $("#nombres1").val("");
      $("#ciudad1").val("");
      $("#telefono1").val("");
      $("#datepicker1").val("");
   }
   function remove(context) {
      var list = context.list;
      var indice = clienteList.recorreClientes(context.id);
      list.splice(indice, 1);
      var clientes = {
         person: list
      };
      listTable(clientes);
   }
   function showTableEdit(context) {
      var HTML = Handlebars.templates.todo(context);
      $('#result').html(HTML);

      $("#nombres2").val("");
      $("#ciudad2").val("");
      $("#telefono2").val("");
      $("#datepicker2").val("");

      $('#editarFormulario').modal('hide');
   }

   return {
      init: function () {
         events.subscribe('clientListTable', listTable);
         events.subscribe('showTableAgain', showTable);
         events.subscribe('removeTr', remove);
         events.subscribe('showTableAgainEdit', showTableEdit);
      }
   }
}());