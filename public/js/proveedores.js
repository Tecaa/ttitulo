$(document).ready(function() {
  column = null;
  if (tipo_usuario == "administrador")
  {
    column = [
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-warning' href=/proveedores/editar/" + data.cod_proveedor +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
              + " <a class='btn btn-danger' data-cod-proveedor=" + data.cod_proveedor + " onclick='eliminarProveedor(this)'"             
              + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 6 ]
        }
      ];
  }
  $('#proveedoresTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
     data: proveedor, 
      columns: [
            { "data": "cod_proveedor" },
            { "data": "nom_proveedor" },
            { "data": "direccion_prov" },
            { "data": "ciudad.nom_ciudad" },
            { "data": "fono_prov" },
            { "data": "mail_prov" },

        ],
    
    columnDefs: column
  });
} );

var eliminarProveedor = function (e){
    var cod_proveedor = e.dataset.codProveedor;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar este proveedor?',
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
                window.location.assign("/proveedores/eliminando/" + cod_proveedor)
              }
            }
          ]
        });
  }