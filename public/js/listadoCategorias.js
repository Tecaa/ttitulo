$(document).ready(function() {
    column = null;
  if (tipo_usuario == "administrador")
  {
    column = [
        {
          data: null,
          render: function ( data, type, row ) {
            return " <a class='btn btn-warning' href=/categorias/editar/" + data.cod_categoria +
              "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
            + " <a class='btn btn-danger' data-cod-categoria=" + data.cod_categoria + " onclick='eliminarCategoria(this)'" +
              "><i class='glyphicon glyphicon-remove icon-white'></i></a>";
          },
          targets: [ 2 ]
        }
      ];
  }
  
  categoriasTable = $('#categoriasTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
    data: categorias, 
      columns: [
            { "data": "cod_categoria" },
            { "data": "nom_categoria" }
        ],
    
    columnDefs: column
  });
} );

var eliminarCategoria = function (e){
    var cod_categoria = e.dataset.codCategoria;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar esta categoría?',
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
                window.location.assign("/categorias/eliminando/" + cod_categoria)
              }
            }
          ]
        });
  }