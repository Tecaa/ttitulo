$(document).ready(function() {
  column = null;
  if (tipo_usuario == "administrador")
  {
    column = [
      {
        data: null,
        render: function ( data, type, row ) {
          return  " <a class='btn btn-warning' href=/laboratorios/editar/" + data.cod_laboratorio +
            "><i class='glyphicon glyphicon-pencil icon-white'></i></a>"
          + " <a class='btn btn-danger' data-cod-laboratorio=" + data.cod_laboratorio + " onclick='eliminarLaboratorio(this)'"             
          + "><i class='glyphicon glyphicon-remove icon-white'></i></a>";


        },
        targets: [ 2 ]
      }
    ];
  }

  $('#laboratoriosTable').DataTable({
    language: {
            "url": "/js/dataTables/Spanish.json"
        },
    
    data: laboratorios, 
      columns: [
            { "data": "cod_laboratorio" },
            { "data": "nom_laboratorio" }
        ],
    
    columnDefs: column
  });
} );

var eliminarLaboratorio = function (e){
    var cod_laboratorio = e.dataset.codLaboratorio;
    BootstrapDialog.show({
          type: BootstrapDialog.TYPE_DANGER,
          title: 'Confirmación',
          message: '¿Realmente desea eliminar este laboratorio?',
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
                window.location.assign("/laboratorios/eliminando/" + cod_laboratorio)
              }
            }
          ]
        });
  }