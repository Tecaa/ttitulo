$(document).ready(function() {
    $('#ajusteTable').DataTable(
    {
      language: {
            "url": "/js/dataTables/Spanish.json"
        },
   data: ajuste, 
        columns: [
            { "data": "fecha_ajuste" },
            { "data": "usuario.rut" },
            { "data": "usuario.nom_usuario" },
            { "data": "codigo_producto" },
            { "data": "producto.nombre_producto" },
            { "data": "tipo_ajuste" },
            { "data": "cantidad" },
            { "data": "descripcion" }
        ]
    });
})