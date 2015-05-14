$(document).ready(function() {
  $('#metodosTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
     data: metodos, 
      columns: [
            { "data": "cod_metodo" },
            { "data": "nombre" },
            { "data": "costo" }
        
        ],
    columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-warning' href=/envio/editar/" + data.cod_metodo +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
            + " <a class='btn btn-danger' data-cod-metodo=" + data.cod_metodo + " onclick='eliminarMetodo(this)'"             
              + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 3 ]
        }
      ]
  });
} );


var eliminarMetodo = function (e){
    var cod_metodo = e.dataset.codMetodo;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar este método de envío?',
          buttons: [
            {
              label: 'Cancelar',
              cssClass: 'btn-default',
              action: function(dialogRef){
                dialogRef.close();
              }
            },
            {
              label: 'Aceptar',
              cssClass: 'btn-primary',
              action: function(dialogRef){
                window.location.assign("/envio/eliminando/" + cod_metodo)
              }
            }
          ]
        });
  }