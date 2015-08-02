$(document).ready(function() {
  column = null;
  if (tipo_usuario == "administrador")
  {
    column = [
      {
        data: null,
        render: function ( data, type, row ) {
          return MoneyFormat(data);  
        },
        targets: [ 3 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          if(row.precio_venta_oferta == null)
            return MoneyFormat(data);
          else
            return "<strike>" + MoneyFormat(data) + "</strike>";
        },
        targets: [ 4 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {
          if (data != null)
            return MoneyFormat(data);
          else
            return "";
        },
        targets: [ 5 ]
      },
      {
        data: null,
        render: function ( data, type, row ) {

          return "<a class='btn btn-primary' href=/producto/ajustar/" + data.codigo_producto +
            "><i class='glyphicon glyphicon-asterisk icon-white'></i></a>" +
            " <a class='btn btn-warning' href=/producto/editar/" + data.codigo_producto +
            "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
            + " <a class='btn btn-danger' data-codigo-producto=" + data.codigo_producto + " onclick='eliminarProducto(this)'" +
            "><i class='glyphicon glyphicon-remove icon-white'></i></a>";

        },
        width: "17%",
        targets: [ 7 ]
      }
    ];
  }
  else
  {
    column = [
      {
        data: null,
        render: function ( data, type, row ) {
          return MoneyFormat(data);  
        },
        targets: [ 3 ]
      },
    {
        data: null,
        render: function ( data, type, row ) {
          if(row.precio_venta_oferta == null)
            return MoneyFormat(data);
          else
            return "<strike>" + MoneyFormat(data) + "</strike>";
        },
        targets: [ 4 ]
      },
    {
        data: null,
        render: function ( data, type, row ) {
          if (data != null)
            return MoneyFormat(data);
          else
            return "";
        },
        targets: [ 5 ]
      }
    ];
  }
  productosTable = $('#productosTable').DataTable(
    { 
      language: {
        "url": "/js/dataTables/Spanish.json"
      },
      data: productos, 
      columns: [
        { "data": "nombre_producto" },
        { "data": "proveedor.nom_proveedor" },
        { "data": "cantidad" },
        { "data": "precio_compra" },
        { "data": "precio_venta" },
        { "data": "precio_venta_oferta" },
        { "data": "codigo_barras" }
      ],
      columnDefs: column
    });


} );

var eliminarProducto = function (e){
  var codigo_producto = e.dataset.codigoProducto;
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_DANGER,
    title: 'Confirmación',
    message: '¿Realmente desea eliminar este producto?',
    buttons: [
      {
        label: 'Cancelar',
        cssClass: 'btn-default',
        action: function(dialogRef){
          dialogRef.close();
        }
      },
      {
        label: 'Aceptar',
        cssClass: 'btn-primary',
        action: function(dialogRef){
          window.location.assign("/producto/eliminando/" + codigo_producto)
        }
      }
    ]
  });
}