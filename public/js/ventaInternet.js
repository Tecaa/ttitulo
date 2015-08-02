$(document).ready(function() {
  $('#ventasTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: detalles, 
      columns: [
            { "data": "producto.nombre_producto" },
            { "data": "producto.proveedor.nom_proveedor" },
            { "data": "cantidad" },
            { "data": "precio_venta" }
        ],
    columnDefs: [
      {
          data: null,
          render: function ( data, type, row ) {
            return  MoneyFormat(data);

          },
          targets: [ 3 ]
        },
      {
          data: null,
          render: function ( data, type, row ) {
            return  MoneyFormat(row.cantidad * row.precio_venta);

          },
          targets: [ 4 ]
        }                
      ]
  });
  
} );
    