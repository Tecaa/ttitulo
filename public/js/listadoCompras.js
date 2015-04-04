$(document).ready(function() {
    $('#comprasTable').DataTable({
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
      order: [[1, 'desc']],
      data: compras, 
      columns: [
            { "data": "cod_documento" },
            { "data": "created_at" },
            { "data": "factura.cod_proveedor" },
            { "data": "factura.proveedor.nom_proveedor" },
            { "data": "cantidad_total" },
            { "data": "precio_total" }
        ],
      

      columnDefs: [
      {
          data: null,
          render: function ( data, type, row ) {
            return  MoneyFormat(data);

          },
          targets: [ 5 ]
        },
      
      ]
      
    });
} );