$(document).ready(function() {
    $('#ajusteTable').DataTable(
    {
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
   data: ajuste, 
        columns: [
            { "data": "codigo_producto" },
            { "data": "producto.nombre_producto" },
            { "data": "tipo_ajuste" },
            { "data": "cantidad" },
            { "data": "descripcion" }

        ],
            columnDefs: [
        {
          data: null,

          targets: [ 4 ]
        }
      ]
    });
})