$(document).ready(function() {
  var compras;
  if (localStorage.compras !== undefined)
    compras = JSON.parse(localStorage.compras);
  else 
    compras = null
  $('#carroTable').DataTable({
    // Lista de productos
    data: compras,
    columns: [
            { "data": "nombre_producto" },
            { "data": "laboratorio.nom_laboratorio" },
            { "data": "cantidadComprada" },
            { "data": "precioVentaF" },
      { "data": "subtotal" }
        ],
    columnDefs: [
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-danger' data-cod='" + row.codigo_producto +"' onclick='rem(this)'><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 5 ]
        },
      
        {
          data: null,
          render: function ( data, type, row ) {
            return  "$ " + FormatNumberBy3(data);

          },
          targets: [ 4 ]
        }  
   
      ]
  });
  $('#pedido').click(function (event) {
    if ($('#carroTable').DataTable().rows().data().toArray().length === 0)
      {
      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: 'No hay productos',
        message: 'No hay productos en su carro para realizar el pedido.',
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
        return;
      }
        $.ajax({
      type: "POST",
      url: "/venta/pedido",
      data: { 'productos' : $('#carroTable').DataTable().rows().data().toArray() },
    })
    .done(function () {
      delete localStorage.compras;
      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: 'Pedido ingresado',
        message: 'Se ha registrado el pedido correctamente, se le contactará a la brevedad indicando la disponibilidad de los productos.',
        buttons: [
          {
            label: 'Aceptar',
            cssClass: 'btn-primary',
            action: function(dialogRef){
              window.location.assign("/listado/carroCompras");
            }
          }
        ]
      });
    });
  });
} );
rem = function (e)
{
  compras = JSON.parse(localStorage.compras);
  $(compras).each(function(index, val) {
    if (val.codigo_producto == e.dataset.cod)
    {
      compras.splice(index, 1);
      encontrado = true;
      return false;
    }
  });
  localStorage.compras = JSON.stringify(compras);
  window.location.assign("/listado/carroCompras")
};