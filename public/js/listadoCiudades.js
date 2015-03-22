$(document).ready(function() {
  $('#ciudadesTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
     data: ciudades, 
      columns: [
            { "data": "cod_ciudad" },
            { "data": "nom_ciudad" }
        ],
    columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-warning' href=/ciudades/editar/" + data.cod_ciudad +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
            + " <a class='btn btn-danger' data-cod-ciudad=" + data.cod_ciudad + " onclick='eliminarCiudad(this)'"             + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 2 ]
        }
      ]
  });
} );

var eliminarCiudad = function (e){
    var cod_ciudad = e.dataset.codCiudad;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar esta ciudad?',
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
                window.location.assign("/ciudades/eliminando/" + cod_ciudad)
              }
            }
          ]
        });
  }