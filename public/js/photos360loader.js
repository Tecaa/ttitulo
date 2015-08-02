$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "/producto/obtener360",
        data: { 'codigo_producto' : producto.codigo_producto },
      })
        .done(function (imagen360) {
      
      
      var arr = [];
    if (imagen360 == null)
      return;

    arr.push(imagen360.d0);
    arr.push(imagen360.d45);
    arr.push(imagen360.d90);
    arr.push(imagen360.d135);
    arr.push(imagen360.d180);
    arr.push(imagen360.d225);
    arr.push(imagen360.d270);
    arr.push(imagen360.d315);


    $("#img360").threesixty({images:arr, method:'click', autoscrollspeed:200, 'cycle':3, direction:"backward", base64:true});
    
    
      })
        .error(function() {
         $("#img360").hide();
      });
  
});