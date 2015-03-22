var totalProductos = 0;
var totalVenta = 0;
$(document).ready(function() {
  $('#facturaTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
      data: null, 
      columns: [
            { "data": "nombre_producto" },
            { "data": "laboratorio.nom_laboratorio" },
            { "data": "cantidadComprada" },
            { "data": "precio_compra" },
            { "data": "subtotal" }
        ],
    columnDefs: [
      {
          data: null,
          render: function ( data, type, row ) {
            return  "$ " + FormatNumberBy3(data);

          },
          targets: [ 3 ]
        },
      {
          data: null,
          render: function ( data, type, row ) {
            return  "$ " + FormatNumberBy3(data);

          },
          targets: [ 4 ]
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
    if ($('#cantidad').val()   === '' || $('#precio').val() === "" || $('#precio').val() === "0" || $('#cantidad').val() === "0" || $('#codigoB').val() === "0"
       || $('#codigoB').val() == "" || $('#codigoB').val() === undefined || $('#precio').val() === undefined || $('#cantidad').val() === undefined) 
    {
      alert ('Debe completar el código, la cantidad y el precio.');
      return;
    }
    
    //Asignamos un booleano a que aun no encontramos el producto en la tabla visual de productos.
    var encontrado = false;
    
     //Aqui buscaremos el nuevo producto a ingresar para saber si ya existe en la tabla, en caso de que
    // exista le modificaremos su cantidad comprada y su subtotal y estableceremos encontrado=true.
    // Si no lo encontramos no se hara nada y encontrado quedara como false.
    f.rows().indexes().each( function (idx) {
        var element = f.row( idx ).data();
      if (element === undefined)
         return false;
      console.log(element);
        if (element.codigo_barras == $('#codigoB').val())
       {
         
         element.cantidadComprada = parseInt(element.cantidadComprada) +  parseInt($('#cantidad').val());
        
         actualizarTotales(element.cantidadVendida, element.precio_venta);
         element.precio_compra = parseInt($('#precio').val());
         
         element.subtotal = parseInt(element.cantidadComprada) * parseInt(element.precio_compra);
         f.row( idx ).data( element );
         encontrado = true;
         // Redibujamos la tabla visual en caso de que se hayan echo cambios encontrando el producto
         f.draw();
         
         return false; // break;
       }
        
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
            productoComprado.cantidadComprada = parseInt($('#cantidad').val(), 10);
            productoComprado.precio_compra = parseInt($('#precio').val(), 10);                
            productoComprado.subtotal = productoComprado.precio_compra * productoComprado.cantidadComprada;
           

             f.row.add(productoComprado).draw();
            
            actualizarTotales(productoComprado.cantidadComprada, productoComprado.precio_compra);
            
          });
    }
  });

  $('#comprar').click(function (event) {
    $.ajax({
      type: "POST",
      url: "/compra/factura/crear",
      data: { 'rutProveedor' : $( "input[name='rutProveedor']" ).val(),
             'nombre' : $("input[name='nombre']").val(),
             'codFactura' : $("input[name='codFactura']").val(),
             'fecha' : $("input[name='fecha']").val(),
             'productos' : $('#facturaTable').DataTable().rows().data().toArray()
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
        ]
      });
    });
  });




  /*


        counter++;
    } );
  */
} );

actualizarTotales = function(cantidad, precioUnitario)
{
  //Suma total
  totalProductos += cantidad;
  totalVenta +=  cantidad * precioUnitario;
  $("input[name=cantidad").val(FormatNumberBy3(totalProductos));
  $("input[name=total").val("$ " + FormatNumberBy3(totalVenta));
};