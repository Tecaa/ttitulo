$(document).ready(function() {
  $('#pedidoTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: pedidos,
    columns: [
      { "data": "cod_documento" },
      { "data": null },
      { "data": "rut" },
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
          return  "$ " + FormatNumberBy3(data);

        },
        targets: [ 4 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  " <a class='btn btn-success' href=/venta/internet/" + data.cod_documento +
            "><i class='glyphicon glyphicon-ok icon-white'></i></a>"
            + " <a class='btn btn-danger' href=/boleta/rechazarPedido/" + data.cod_documento +
            "><i class='glyphicon glyphicon-remove icon-white'></i></a>"
            + " <a class='btn btn-warning' href=/boleta/pedido/" + data.cod_documento +
            "><i class='glyphicon glyphicon-search icon-white'></i></a>";

        },
        targets: [ 5 ]
      }

    ]

  });


} );