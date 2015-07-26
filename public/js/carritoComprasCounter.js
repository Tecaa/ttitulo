$(document).ready(function() {
  actualizarCarroNavBar();
});

function actualizarCarroNavBar()
{
  var compras;
  if (localStorage.compras !== undefined)
    compras = JSON.parse(localStorage.compras);
  else 
  {
    compras = null;
    return;
  }
  var cantidad = 0;

  $(compras).each(function(index, compra) {
    cantidad += compra.cantidadComprada;
  });
  if (cantidad !== 0)
    $("#totalCompras").html(cantidad);
}