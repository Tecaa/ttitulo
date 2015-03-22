@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Laboratorios</h3>

  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="laboratoriosTable" width="100%">
      <thead align="center">

        <th>Código</th>
        <th>Nombre Laboratorio</th>
          @if(Auth::user()->tipo_usuario == "administrador")
        <th>Acciones</th>
        @endif
      </thead>
      <tbody>
       
      </tbody>
    </table>
    @if(Auth::user()->tipo_usuario == "administrador")
    <br>
    <a class="btn btn-primary" href="/laboratorios/crear" role="button">Agregar laboratorio</a>
    @endif
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listadoLaboratorios.js') }}
@stop()