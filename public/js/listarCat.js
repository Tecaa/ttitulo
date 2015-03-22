$(document).ready(function() {
    $('#categoriasTable').DataTable(
    {
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
   data: categorias, 
        columns: [
            { "data": "cod_categoria" },
            { "data": "nom_categoria" }
        ],
            columnDefs: [
        {
          data: null,

          targets: [ 1]
        }
      ]
    });
})