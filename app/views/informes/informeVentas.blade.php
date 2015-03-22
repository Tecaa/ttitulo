@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Informe de Ventas Diario</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="ventaTable" width="100%">
      <thead align="center">
      
       <tr> 
        <th>N° ventas</th> 
        <th>N° productos vendidos</th>
        <th>Total ventas</th>
       </tr>  
      </thead> 
      
      <tbody>
       <tr> 
        <td>50403011</td> 
        <td>Paltomiel</td>
        <td>Knop</td>
        <td>3</td>

       </tr>  
        <tr> 
        <td>53490222</td>  
        <td>Vitamina C</td>
        <td>Aura Vitalis</td>
        <td>1</td>

       </tr> 
       
       <tr> 
        <td>12131415</td> 
        <td>Caramelos de limón</td>
        <td>Apicola del Alba</td>
        <td>0</td>

       </tr>   
        
      </tbody>
    </table>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/ventas.js') }}
@stop()