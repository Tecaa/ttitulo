$(document).ready(function() {
  $('#comprasTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    order: [[1, 'desc']],
    data: compras, 
    columns: [
      { "data": "factura.cod_factura" },
      { "data": "created_at" },
      { "data": "factura.cod_proveedor" },
      { "data": "factura.proveedor.nom_proveedor" },
      { "data": "cantidad_total" },
      { "data": "precio_total" }
    ],


    columnDefs: [
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data);

        },
        type: "currency",
        targets: [ 5 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return " <a class='btn btn-warning' href=/facturas/" + data.cod_documento +
            "><i class='glyphicon glyphicon-search icon-white'></i></a>";

        },
        targets: [ 6 ]
      }
    ]

  });
} );