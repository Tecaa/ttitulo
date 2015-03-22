@section('content')
        
<!-- begin:product-content -->
<div class="col-md-7 col-sm-7">
<h3>{{$titulo}}</h3>
         
   <div class="row confirm">
      <div class="col-md-15">
         <form class="form-horizontal" role="form" method="post" action="/laboratorios/creando">

          <hr>
         <!-- <div class="form-group">
             <label class="col-sm-5 control-label">Código laboratorio</label>
              <div class="col-sm-7">
                   <input type="text" class="form-control" placeholder="Codigo : ">
              </div>
          </div> -->

          <div class="form-group">
              <label class="col-sm-5 control-label">Nombre laboratorio (*)</label>
              <div class="col-sm-7">
                  <input type="text" name="nombre" class="form-control" placeholder="Ej.: Aura Vitalis" required>
              </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
               <div class="pull-right">
                  <button type="submit" class="btn btn-purple">Crear</button>
               </div> 
             </div>
           </div>
        </form>
     </div>
   </div>
</div>


@stop