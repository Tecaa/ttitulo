$(document).ready(function() {
    $('#stockTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: productos, 
      columns: [
            { "data": "codigo_barras" },
            { "data": "nombre_producto" },
            { "data": "proveedor.nom_proveedor" },
            { "data": "cantidad" }

        ],
      columnDefs: [
        {
          data: null,

          targets: [ 3 ]
        }
      ]
    });

  
} );
