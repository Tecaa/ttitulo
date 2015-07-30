var totalProductos = 0;
var totalVenta = 0;
$(document).ready(function() {

  $('#boletaTable').DataTable({
    language: {
      "url": "/js/dataTables/Spanish.json"
    },
    data: null, 
    columns: [
      { "data": "nombre_producto" },
      { "data": "laboratorio.nom_laboratorio" },
      { "data": "cantidad" },
      { "data": "precio_venta" },
      { "data": "cantidadVendida" },
      { "data": "subtotal" }
    ],
    columnDefs: [
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data);
        },
        targets: [ 3 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          return  MoneyFormat(data);
        },
        targets: [ 5 ]
      }
    ]
  });


  var f = $("#boletaTable").DataTable();
  $('#ingresar').click(function (event) {
    if ($('input[name=cantidad]').val()   === '' || $('input[name=codigoB]').val() === "" || $('input[name=codigoB]').val() === "0" || $('input[name=cantidad]').val() === "0"
        || $('input[name=cantidad]').val()   === undefined || $('input[name=codigoB]').val()   === undefined || parseInt($('input[name=cantidad]').val()) <= 0) 
    {
       BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Problema',
          message: 'Debe completar el código y la cantidad correctamente',
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

    var encontrado = false;
    var sobreStock = false;

    f.rows().indexes().each( function (idx) {
      var element = f.row( idx ).data();
      if (element === undefined)
        return false;
      console.log(element);
      if (element.codigo_barras == $('input[name=codigoB]').val())
      {
        
        if (parseInt(element.cantidadVendida) +  parseInt($('input[name=cantidad]').val()) > element.cantidad)
        {
          sobreStockMessage(element.cantidad, parseInt($('input[name=cantidad]').val()), element.cantidadVendida);
          sobreStock = true;
          return false;
        }

        element.cantidadVendida = parseInt(element.cantidadVendida) +  parseInt($('input[name=cantidad]').val());
        actualizarTotales(parseInt($('input[name=cantidad]').val()), parseInt(element.precio_venta));

        // se debe rescatar el precio de venta desde la tabla producto
        //element.precio_venta = (producto.precio_venta);
        //para el subtotal se necesita el precio de venta que se saca de la tabla producto
        element.subtotal = parseInt(element.cantidadVendida) * parseInt(element.precio_venta);
        // element.subtotal = parseInt(element.cantidadVendida, 10) * precio_venta;

        console.log(element);
        f.row( idx ).data( element );
        encontrado = true;
        f.draw();
        $('input[name=codigoB]').val("");
        $('input[name=cantidad]').val("1");
        return false; // break;
      }

  } );
    if (sobreStock === true)
    {
      return;
    }

    if (encontrado === false)
    {
      $.ajax({
        type: "POST",
        url: "/producto/obtener",
        data: { 'codigo_barras' : $("input[name='codigoB']").val() },
      })
        .done(function (producto) {
        var productoVendido = producto;
        productoVendido.cantidadVendida = parseInt($("input[name='cantidad']").val());
        productoVendido.subtotal =   productoVendido.cantidadVendida * productoVendido.precio_venta;
        if (productoVendido.cantidadVendida > productoVendido.cantidad)
        {
          sobreStockMessage(productoVendido.cantidad, parseInt($('input[name=cantidad]').val()), 0);
          return;
        }
        
        f.row.add(producto).draw();
        //Suma total
        actualizarTotales(productoVendido.cantidadVendida, productoVendido.precio_venta);

        $('input[name=codigoB]').val("");
        $('input[name=cantidad]').val("1");
      })
        .error(function() {

        BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Problema',
          message: 'No se ha encontrado el producto en la base de datos',
          buttons: [
            {
              label: 'Aceptar',
              cssClass: 'btn-primary',
              action: function(dialogRef){
                $('input[name=codigoB]').val("");
                dialogRef.close();
              }
            }
          ]
        });
      });
    }
  });

  $('#venta').click(function (event) {
    $.ajax({
      type: "POST",
      url: "/venta/local/crear",
      data: { //'codigoB' : $('input[name=codigoB]').val(),
             //'codigoB' : $( "input[name='codigoB']" ).val(),
             //'cantidad' : $('input[name=cantidad]').val(),
             //'cantidad' : $("input[name='cantidad']").val(),
             'rutCliente' : $("input[name='rut']").val(),
             'productos' : $('#boletaTable').DataTable().rows().data().toArray()
            },
    })
      .done(function (resultado) {
      console.log(resultado);
      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: 'Boleta ingresada',
        message: 'Se ha ingresado la boleta correctamente',
        buttons: [
          {
            label: 'Aceptar',
            cssClass: 'btn-primary',
            action: function(dialogRef){
              window.location.reload();
            }
          }
        ]
      });
    });
  });

  /*

        counter++;
    } );
  */
} );
sobreStockMessage = function(disponible, solicitado, enCarro)
{
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_DANGER,
    title: 'No hay suficiente stock',
    message: 'Disponible: ' + disponible + "<br />Solicitado: " + solicitado + " + " + enCarro + " ya en boleta",
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
actualizarTotales = function(cantidad, precioUnitario)
{
  //Suma total
  totalProductos += cantidad;
  totalVenta +=  cantidad * precioUnitario;
  $("input[name=cantidadTotal").val(FormatNumberBy3(totalProductos));
  $("input[name=total").val(MoneyFormat(totalVenta));
};

function submitenter(myfield,e)
{
  var keycode;
  if (window.event) keycode = window.event.keyCode;
  else if (e) keycode = e.which;
  else return true;

  if (keycode == 13)
  {
    $('#ingresar').click();
    return false;
  }
  else
    return true;
}