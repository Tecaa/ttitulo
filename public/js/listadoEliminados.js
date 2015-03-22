$(document).ready(function() {
    productosTable = $('#productosTable').DataTable(
    {
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: productos, 
      columns: [
            { "data": "nombre_producto" },
            { "data": "laboratorio.nom_laboratorio" },
            { "data": "cantidad" },
            { "data": "precio_venta" },
            { "data": "codigo_barras" }
        ],
      columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return " <a class='btn btn-success'  data-codigo-producto=" + data.codigo_producto + " onclick='activarProducto(this)'" +
              "><i class='glyphicon glyphicon-plus icon-white'></i></a>";
          },
          targets: [ 5 ]
        }
      ]
    });

} );


var activarProducto = function (e){
    var codigo_producto = e.dataset.codigoProducto;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea activar este producto?',
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
                window.location.assign("/producto/activando/" + codigo_producto)
              }
            }
          ]
        });
  }