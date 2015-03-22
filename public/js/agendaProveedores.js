$(document).ready(function() {
  $('#agendaProveedoresTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
     data: proveedor, 
      columns: [
            { "data": "cod_proveedor" },
            { "data": "nom_proveedor" },
            { "data": "direccion_prov" },
            { "data": "ciudad.nom_ciudad" },
            { "data": "fono_prov" },
            { "data": "mail_prov" },

        ],
    
    columnDefs: [
        {
          data: null,

          targets: [ 5 ]
        }
      ]
  });
} );
