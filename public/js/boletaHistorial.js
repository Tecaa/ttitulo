$(document).ready(function() {
  $('#boletasTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: boletas,
    order: [[1, 'asc']],
    columns: [
      { "data": "cod_documento" },
      { "data": null },
      { "data": null },
      { "data": null },
      { "data": "cantidad_total" },
      { "data": "precio_total" }
    ],
    columnDefs: [
      {
        data: null,
        render: function ( data, type, row ) {
          return  DateTimeFormat(data.created_at);

        },
        targets: [ 1 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  (data.boleta.rut != null) ? data.boleta.rut : '';

        },
        targets: [ 2 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  (data.boleta.cliente != null) ? data.boleta.cliente.nom_usuario : '';

        },
        targets: [ 3 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data);

        },
        targets: [ 5 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return " <a class='btn btn-warning' href=/boleta/" + data.cod_documento +
            "><i class='glyphicon glyphicon-search icon-white'></i></a>";

        },
        targets: [ 6 ]
      }
    ]
  });
} );