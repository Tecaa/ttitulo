$(document).ready(function() {
    $('#ventasTable').DataTable(
      {
        language: {
            "url": "/js/dataTables/Spanish.json"
        },
        
       data: ventas, 
      columns: [
            { "data": "cod_documento" },
            { "data": "created_at" },
            { "data": "rut" },
            { "data": "cantidad_total" },
            { "data": "precio_total" }
        ],

        columnDefs: [
      {
          data: null,
          render: function ( data, type, row ) {
            return  "$ " + FormatNumberBy3(data);

          },
          targets: [ 4 ]
        },
      ]
 
      
      });
} );
