$(document).ready(function() {
  $('#pedidoTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: pedidos,
    columns: [
      { "data": "cod_documento" },
      { "data": null },
      { "data": "boleta.rut_cliente" },
      { "data": "boleta.cliente.nom_usuario" },
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
          return  MoneyFormat(data);

        },
        targets: [ 5 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return " <a class='btn btn-warning' href=/boleta/pedido/" + data.cod_documento +
            "><i class='glyphicon glyphicon-search icon-white'></i></a>";

        },
        targets: [ 6 ]
      }
    ]
  });
} );