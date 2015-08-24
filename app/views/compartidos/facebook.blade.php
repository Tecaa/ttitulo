<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1478164025818175',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
 
    
    
  function loadingPageLoginCallback(response)
  {
    if (response.status === 'connected') {

      // Logged into your app and Facebook.
      $.ajax({
        type: "POST",
        url: "/fb_logeando",
        data: { 'id' : response.authResponse.userID }
      })
        .done(function (response) {
      })
        .error(function(response) {
        console.log(response);

      });
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      //document.getElementById('status').innerHTML = 'Please log ' +
      FB.logout(function(response) {
        // Person is now logged out
      }); //'into this app.';
    } else {
      @if(!Auth::guest() && Auth::user()->fb_id != null)
        window.location = "/logout";
      @endif
       ;
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      //document.getElementById('status').innerHTML = 'Please log ' +
        //'into Facebook.';
    }
    
  }
  function loginButtonCallback(response){

    
    if (response.status === 'connected') {
      FB.api('/me', function(datos) {
        console.log(datos);

        // Logged into your app and Facebook.
        $.ajax({
          type: "POST",
          url: "/fb_logeando",
          data: { 'id' : datos.id, 'email' : datos.email, 'sexo' : datos.gender, 'nombre' : datos.name,
                 'fechaDeNacimiento' : response.birthdate}
        })
          .done(function (response) {
            if(response == "true")  
              window.location = "/sesion";
        })
          .error(function(response) {
          console.log(response);

        });
      });
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      //document.getElementById('status').innerHTML = 'Please log ' +
      FB.logout(function(response) {
        // Person is now logged out
      }); //'into this app.';
    } else {
      window.location = "/logout";
      
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      //document.getElementById('status').innerHTML = 'Please log ' +
        //'into Facebook.';
    }
    
  }
  function fb_logout()
  {
    
    if (typeof FB !== 'undefined')
    { 
      @if (Auth::user() && Auth::user()->fb_id != null)
      FB.logout(function(response) {
        console.log(response);
      //  window.location = "/logout";    
      });
       @endif
    }
    //else
      window.location = "/logout";

  }
  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    
    FB.getLoginStatus(function(response) {
      loginButtonCallback(response);
    });
  }
  
</script>