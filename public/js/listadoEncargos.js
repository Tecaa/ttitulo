$(document).ready(function() {
  $('#encargosTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: encargos, 
    columns: [
      { "data": "cod_encargo" },
      { "data": "rut" },
      { "data": "nombre_cliente" },
      { "data": "fechaEncargoF" },
      { "data": "estado_encargo" },
      { "data": "monto_abonado" },
      { "data": "producto.codigo_barras" },
      { "data": "cantidad" },
      { "data": "rut_vendedor" },
    ],

    columnDefs: [
      {
        data: null,
        render: function ( data, type, row ) {
          return MoneyFormat(data);
        },
        targets: [ 5 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  " <a class='btn btn-info' href=/producto/consultar/" + data.cod_producto +
            "><i class='glyphicon glyphicon-eye-open icon-white'></i></a>" + 
            " <a class='btn btn-success' href=/encargo/entregar/" + data.cod_encargo +
            "><i class='glyphicon glyphicon-ok-sign icon-white'></i></a>" + 
            " <a class='btn btn-danger' href=/encargo/cancelar/" + data.cod_encargo +
            "><i class='glyphicon glyphicon-remove-sign icon-white'></i></a>";

        },
        targets: [ 9 ],
      }
    ]
  });
} );