$(document).ready(function() {
    vendedoresTable = $('#vendedoresTable').DataTable(
    {
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: vendedor, 
      columns: [
            { "data": "rut" },
            { "data": "nom_usuario" },
            { "data": "direccion" },
            { "data": "ciudad.nom_ciudad" },
            { "data": "fono" },
            { "data": "mail" }
        ],
      columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return " <a class='btn btn-success'  data-rut=" + data.rut + " onclick='activarVendedor(this)'" +
              "><i class='glyphicon glyphicon-plus icon-white'></i></a>";
          },
          targets: [ 6 ]
        }
      ]
    });

} );


var activarVendedor = function (e){
    var rut = e.dataset.rut;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea activar este vendedor?',
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
                window.location.assign("/vendedor/activando/" + rut)
              }
            }
          ]
        });
  }