$(document).ready(function() {
  $('#vendedoresTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
    data: vendedor, 
      columns: [
            { "data": "rut" },
            { "data": "nom_usuario" },
            { "data": "direccion" },
            { "data": "ciudad.nom_ciudad" },
            { "data": "fecha_nacimiento" },
            { "data": "sexo" },
            { "data": "fono" },
            { "data": "mail" }
        
        ],
    
    columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-warning' href=/vendedor/editar/" + data.rut +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
            + " <a class='btn btn-danger' data-rut=" + data.rut + " onclick='eliminarVendedor(this)'"             + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 8 ]
        }
      ]
  });
} );

var eliminarVendedor = function (e){
    var rut = e.dataset.rut;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar este vendedor?',
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
                window.location.assign("/vendedor/eliminando/" + rut)
              }
            }
          ]
        });
  }