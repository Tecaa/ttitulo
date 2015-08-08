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
    var sobreStock = false;
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
          if (producto.cantidadComprada +  parseInt(val.cantidadComprada) > producto.cantidadPublico)
          {
           sobreStockMessage(producto.cantidadPublico, producto.cantidadComprada, parseInt(val.cantidadComprada));
            sobreStock = true;
            return false;
          }

          producto.cantidadComprada = parseInt(val.cantidadComprada, 10) + producto.cantidadComprada;
          producto.subtotal = producto.cantidadComprada * producto.precioVentaFinal;
          compras[index] = producto;
          encontrado = true;
          return false;
        }
      })
    }
    if (sobreStock === true)
      return;
    if (encontrado === false)
    {
      if (producto.cantidadComprada > producto.cantidadPublico)
        {
          sobreStockMessage(producto.cantidadPublico, producto.cantidadComprada, 0);
          return;
        }
      producto.subtotal = producto.cantidadComprada * producto.precioVentaFinal;
      compras.push(producto);
    }
    localStorage.compras = JSON.stringify(compras);
    actualizarCarroNavBar();
    
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
sobreStockMessage = function(disponible, solicitado, enCarro)
{
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    title: 'No hay suficientes unidades',
              message: 'No se ha agregado el producto al carro de compras debido a que no hay suficientes unidades disponibles.'
              +'<br/><br/>Unidades disponibles: ' + disponible
              +'<br/>Unidades solicitadas: ' + solicitado + ' + ' +  enCarro + ' ya en carro.',
               buttons: [
      {
        label: 'Aceptar',
        cssClass: 'btn-primary',
        action: function(dialogRef){
          dialogRef.close();
        }
      }
    ]
  });
}