$(document).ready(function() {
  $('#detalleTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    data: detalles,
    columns: [
            { "data": "codigo_producto" },
            { "data": "producto.nombre_producto" },
            { "data": "producto.laboratorio.nom_laboratorio" },
            { "data": "producto.cantidad" },
            { "data": "producto.precio_venta" },
            { "data": "cantidad" }
        ],
    columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return  data.cantidad * data.precio_venta;

          },
          targets: [ 6 ]
        },
            {
          data: null,
          render: function ( data, type, row ) {
            return  "$ " + FormatNumberBy3(data);

          },
          targets: [ 4 ]
        }
      ]
  });
  
  
} );