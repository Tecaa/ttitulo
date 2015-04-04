$(document).ready(function() {  
  $('#comprar').click(function (event) {
    //var producto = { cod_producto: event.dataset.codigo_producto, cantidad: };
    producto.cantidadComprada = parseInt($("input[name=cantidad]").val(), 10);
    if(isNaN(producto.cantidadComprada) || producto.cantidadComprada <= 0)
    {
      window.location.reload();
      return;
    }
    var encontrado = false;
    if (localStorage.compras === null || localStorage.compras === undefined)
      {
        compras = [];
      }
    else
      {
        compras = JSON.parse(localStorage.compras);
        $(compras).each(function(index, val) {
          if (val.codigo_producto == producto.codigo_producto)
            {
              producto.cantidadComprada = parseInt(val.cantidadComprada, 10) + producto.cantidadComprada;
              producto.subtotal = producto.cantidadComprada * producto.precio_venta;
              compras[index] = producto;
              encontrado = true;
              return false;
            }
        })
      }
    if (encontrado === false)
      {
       producto.subtotal = producto.cantidadComprada * producto.precio_venta;
      compras.push(producto);
      }
    localStorage.compras = JSON.stringify(compras);
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_SUCCESS,
          title: 'Producto agregado',
          message: 'Producto agregado al carro de compras correctamente, haga click en Ver Carro para ir su carro de compras.',
          buttons: [
            {
              label: 'Seguir viendo productos',
              cssClass: 'btn-default',
              action: function(dialogRef){
                dialogRef.close();
              }
            },
            {
              label: 'Ver carro',
              cssClass: 'btn-primary',
              action: function(dialogRef){
                window.location.assign("/listado/carroCompras")
              }
            }
          ]
        });
  });
} );