$(document).ready(function() {
    $('#stockTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: productos, 
      columns: [
            { "data": "codigo_barras" },
            { "data": "nombre_producto" },
            { "data": "laboratorio.nom_laboratorio" },
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
