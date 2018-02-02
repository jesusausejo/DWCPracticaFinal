var clienteView = (function () {

   function showModal(context) {
      var HTML = Handlebars.templates.modal(context);
      $('#resultEdit').html(HTML);
      $('#editarFormulario').modal('show');
      $( function() {
         $( "#datepicker2" ).datepicker();
      } );
   }
   function showModalVer(context) {
      var HTML = Handlebars.templates.modalVer(context);
      $('#resultVer').html(HTML);
      $('#verUser').modal('show');
      $( function() {
         $( "#datepicker3" ).datepicker();
      } );
   }

   function showModalNew() {
      var HTML = Handlebars.templates.modalNew();
      $('#resultNew').html(HTML);
      $('#modalNew').modal('show');
      $( function() {
         $( "#datepicker1" ).datepicker();
      } );
   }

   return {
      init: function () {
         events.subscribe('printModal', showModal);
         events.subscribe('printModalVer', showModalVer);
         events.subscribe('showNewModal', showModalNew);
      }
   }
}());