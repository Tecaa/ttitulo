@section('content')

@stop

@section('extra-js')
<script>
  (function(){
    FB.logout(function(response) {
    windows.location = "/";
  });
  });
</script>
@stop