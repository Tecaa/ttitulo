$(document).ready(function() {
  $('#pedidoTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    data: pedidos,
    columns: [
            { "data": "cod_documento" },
            { "data": "rut" },
            { "data": "cantidad_total" },
            { "data": "precio_total" }
        ],
    columnDefs: [
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
          targets: [ 4 ]
        }
      
      ]

  });
  
  
} );