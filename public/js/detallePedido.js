var totalProductos = 0;
var totalVenta = 0;
$(document).ready(function() {
  $('#detalleTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: detalles,
    columns: [
      { "data": "codigo_producto" },
      { "data": "producto.nombre_producto" },
      { "data": "producto.laboratorio.nom_laboratorio" },
      { "data": "producto.cantidad" },
      { "data": "precio_venta" },
      { "data": "cantidad" }
    ],
    columnDefs: [
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data.cantidad * data.precio_venta);

        },
        targets: [ 6 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data);

        },
        targets: [ 4 ]
      }
    ]
  });
  $(detalles).each(function(index, value){
    actualizarTotales(value.cantidad, value.precio_venta);
  });

});

actualizarTotales = function(cantidad, precioUnitario)
{
  //Suma total
  totalProductos += cantidad;
  totalVenta +=  cantidad * precioUnitario;
  $("input[name=cantidadTotal").val(FormatNumberBy3(totalProductos));
  $("input[name=subtotal").val(MoneyFormat(totalVenta));
  $("input[name=total").val(MoneyFormat(totalVenta + envio));
};