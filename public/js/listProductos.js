$(document).ready(function() {
    productosTable = $('#productosTable').DataTable(
    { 
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: productos, 
      columns: [
            { "data": "codigo_barras" },
            { "data": "nombre_producto" },
            { "data": "laboratorio.nom_laboratorio" },
            { "data": "cantidad" },
            { "data": "precio_venta" }
            
        ],
            columnDefs: [
        {
          data: null,

          targets: [ 4 ]
        }
      ]
    });
})