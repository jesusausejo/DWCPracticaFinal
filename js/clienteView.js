var clienteView = (function () {

   function showModal(context) {
      var HTML = Handlebars.templates.modal(context);
      $('#resultEdit').html(HTML);
      $('#editarFormulario').modal('show');
      $( function() {
         $( "#datepicker2" ).datepicker();
      } );
   }

   function showModalNew() {
      var HTML = Handlebars.templates.modalNew();
      $('#resultNew').html(HTML);
      $('#editarFormulario').modal('show');
      $( function() {
         $( "#datepicker1" ).datepicker();
      } );
   }

   return {
      init: function () {
         events.subscribe('printModal', showModal);
         events.subscribe('showNewModal', showModalNew);
      }
   }
}());