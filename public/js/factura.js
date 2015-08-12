var totalProductos = 0;
var totalVenta = 0;
$(document).ready(function() {
  $('#facturaTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: null, 
      columns: [
            { "data": "codigo_barras" },
            { "data": "nombre_producto" },
            { "data": "cantidadComprada" },
            { "data": "precio_compra" },
            { "data": "precio_venta" },
            { "data": "precio_venta_oferta" },
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
          targets: [ 4 ]
        },
      {
          data: null,
          render: function ( data, type, row ) {
            if (data != undefined && data != null && data != 0)
              return  MoneyFormat(data);
            else
              return "";

          },
          targets: [ 5 ]
        },
      {
          data: null,
          render: function ( data, type, row ) {
              return  MoneyFormat(data);
          },
          targets: [ 6 ]
        }/*,
        {
          data: null,
          render: function ( data, type, row ) {
            return  " <a class='btn btn-danger' href=/producto/eliminar/" + data.codigo_producto +
              "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

          },
          targets: [ 5 ]
        }            */        
      ]
  });
  
  
  var f = $("#facturaTable").DataTable();
  $('#ingresar').click(function (event) {
    if ($('#cantidad').val()   === '' || $('#precio_compra').val() === "" || $('#precio_compra').val() === "0" || $('#cantidad').val() === "0" || $('#codigoB').val() === "0"
        || $('#precio_venta').val() === "" || $('#precio_venta').val() === "0"
       || $('#codigoB').val() == "" || $('#codigoB').val() === undefined || $('#precio_compra').val() === undefined || $('#cantidad').val() === undefined
       || $('#precio_venta').val() === undefined) 
    {
      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: 'Datos insuficientes',
        message: 'Debe completar el código, la cantidad, el precio de compra y de venta.',
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
    
    //Asignamos un booleano a que aun no encontramos el producto en la tabla visual de productos.
    var encontrado = false;
    
     //Aqui buscaremos el nuevo producto a ingresar para saber si ya existe en la tabla, en caso de que
    // exista le modificaremos su cantidad comprada y su subtotal y estableceremos encontrado=true.
    // Si no lo encontramos no se hara nada y encontrado quedara como false.
    totalProductos = 0;
    totalVenta = 0;
    f.rows().indexes().each( function (idx) {
      var element = f.row( idx ).data();
      if (element === undefined)
        return false;
      console.log(element);
      if (element.codigo_barras == $('#codigoB').val())
      {

        element.cantidadComprada = parseInt(element.cantidadComprada) +  parseInt($('#cantidad').val());
        element.precio_compra = parseInt($('#precio_compra').val());
        element.precio_venta = parseInt($('#precio_venta').val());
        element.precio_venta_oferta = ($('#precio_venta_oferta').val() != "" && $('#precio_venta_oferta') != undefined) 
              ? parseInt($('#precio_venta_oferta').val()) : null;

        element.subtotal = parseInt(element.cantidadComprada) * parseInt(element.precio_compra);
        f.row( idx ).data( element );
        encontrado = true;
        // Redibujamos la tabla visual en caso de que se hayan echo cambios encontrando el producto
        f.draw();
        $('input[name=codigoB]').val("");
        $('input[name=cantidad]').val("1");
        $('input[name=precio_compra]').val("");
        $('input[name=precio_venta]').val("");
        $('input[name=precio_venta_oferta]').val("");
      }

      actualizarTotales(element.cantidadComprada, element.precio_compra);

 
    } );



    //Si no encontramos el producto anteriormente en la tabla visual entonces debemos usar ajax para obtener
    // sus datos de la db e ingresarlo a la tabla por primera vez.
    if (encontrado === false)
    {
      $.ajax({
        type: "POST",
        url: "/producto/obtener",
        data: { 'codigo_barras' : $('#codigoB').val() },
      })
        .done(function (producto) {
        var productoComprado = producto;
        productoComprado.cantidadComprada = parseInt($('#cantidad').val());
        productoComprado.precio_compra = parseInt($('#precio_compra').val());     
        productoComprado.precio_venta = parseInt($('#precio_venta').val());
        productoComprado.precio_venta_oferta = ($('#precio_venta_oferta').val() != "" && $('#precio_venta_oferta') != undefined) 
          ? parseInt($('#precio_venta_oferta').val()) : null;
        productoComprado.subtotal = productoComprado.precio_compra * productoComprado.cantidadComprada;


        f.row.add(productoComprado).draw();

        actualizarTotales(productoComprado.cantidadComprada, productoComprado.precio_compra);

        $('input[name=codigoB]').val("");
        $('input[name=cantidad]').val("1");
        $('input[name=precio_compra]').val("");
        $('input[name=precio_venta]').val("");
        $('input[name=precio_venta_oferta]').val("");
      });
    }
  });

  $('#comprar').click(function (event) {
    $('#comprar').prop('disabled', true);
    $.ajax({
      type: "POST",
      url: "/compra/factura/crear",
      data: { 'cod_proveedor' : $( "#proveedor" ).val(),
             'nombre' : $("input[name='nombre']").val(),
             'codFactura' : $("input[name='codFactura']").val(),
             'fecha' : $("input[name='fecha']").val(),
             'productos' : JSON.stringify($('#facturaTable').DataTable().rows().data().toArray())
            },
    })
      .done(function (resultado) {
      console.log(resultado);
      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: 'Factura ingresada',
        message: 'Se ha ingresado la factura correctamente',
        buttons: [
          {
            label: 'Aceptar',
            cssClass: 'btn-primary',
            action: function(dialogRef){
              window.location.assign("/listado/compras");
            }
          }
        ], 
        onhide: function(dialogRef){
          window.location.assign("/listado/compras");
        }
      });
    }).error(function (resultado) {
      console.log(resultado);
      
    }).always(function(){
      $('#comprar').prop('disabled', false);
    });
  });
} );

actualizarTotales = function(cantidad, precioUnitario)
{
  //Suma total
  totalProductos += cantidad;
  totalVenta +=  cantidad * precioUnitario;
  $("input[name=cantidad").val(FormatNumberBy3(totalProductos));
  $("input[name=total").val(MoneyFormat(totalVenta));
};