$(document).ready(function() {
  $('#bancosTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
      data: bancos, 
      columns: [
            { "data": "cod_banco" },
            { "data": "nom_banco" }
        ],
    
    columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-warning' href=/bancos/editar/" + data.cod_banco +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
              + " <a class='btn btn-danger' data-cod-banco=" + data.cod_banco + " onclick='eliminarBanco(this)'"             + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 2 ]
        }
      ]
  });
} );

var eliminarBanco = function (e){
    var cod_banco = e.dataset.codBanco;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar este banco?',
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
                window.location.assign("/bancos/eliminando/" + cod_banco)
              }
            }
          ]
        });
  }