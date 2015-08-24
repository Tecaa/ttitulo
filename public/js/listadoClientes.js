$(document).ready(function() {
  $('#clientesTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
    data: clientes, 
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
            return  " <a class='btn btn-warning' href=/cliente/editar/" + data.usuario_id +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
            + " <a class='btn btn-danger' data-usuario_id=" + data.usuario_id + " onclick='eliminarCliente(this)'" + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 8 ]
        }
      ]
  });
} );

var eliminarCliente = function (e){
    var usuario_id = e.dataset.usuario_id;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar este cliente?',
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
                window.location.assign("/cliente/eliminando/" + usuario_id)
              }
            }
          ]
        });
  }