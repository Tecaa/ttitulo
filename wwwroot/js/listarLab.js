$(document).ready(function() {
    $('#laboratoriosTable').DataTable(
    {
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: laboratorios, 
        columns: [
            { "data": "cod_laboratorio" },
            { "data": "nom_laboratorio" }
        ],
            columnDefs: [
        {
          data: null,

          targets: [ 1]
        }
      ]
    });
})