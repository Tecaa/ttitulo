var totalProductos = 0;
var totalVenta = 0;
$(document).ready(function() {
  $('#detalleTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: detalles,
    columns: [
      { "data": "producto.codigo_barras" },
      { "data": "producto.nombre_producto" },
      { "data": "producto.proveedor.nom_proveedor" },
      { "data": "producto.cantidad" },
      { "data": "precio_compra" },
      { "data": "cantidad" }
    ],
    columnDefs: [
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data.cantidad * data.precio_compra);
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
    actualizarTotales(parseInt(value.cantidad), value.precio_compra);
  });

});

actualizarTotales = function(cantidad, precioUnitario)
{
  //Suma total
  totalProductos += cantidad;
  totalVenta +=  cantidad * precioUnitario;
  $("input[name=cantidadTotal").val(FormatNumberBy3(totalProductos));
  $("input[name=subtotal").val(MoneyFormat(totalVenta));
};