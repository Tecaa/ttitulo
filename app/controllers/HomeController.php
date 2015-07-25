<?php
class HomeController extends BaseController {
  protected $layout = "layouts.default";
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
  public function __construct()
  {
    if (Request::is("sesion/administrador"))
    {
        $this->layout = "layouts.admin";
    }
    if (Request::is("/"))
    {
        $this->layout = "layouts.indexLayout";
    }
  }

  public function index(){
    View::share('titulo', "Inicio");
    
    $producto = Producto::orderBy('visitas', 'desc')->take(8)->get();
    
    $this->layout->content = View::make('index')->withProductos($producto);
  } 
  
  public function quienesSomos(){
    View::share('titulo', "
    
    
    Quienes somos");
    $this->layout->content = View::make('quienesSomos');
  }
  
  public function administrador(){
    View::share('titulo', "Administración");
    $this->layout->content = View::make('administrador');

  }



  public function contacto(){
    View::share('titulo', "Contacto");
    $this->layout->content = View::make('contacto');
  }
  
  const MY_NAME = "Marco Rojas";
  const MY_EMAIL = "cnaturista.masiel@gmail.com";
  public function enviarContacto(){

    //Get all the data and store it inside Store Variable
    $data = Input::all();

    //Validation rules
    $rules = array (
      'nombre' => 'required|alpha',
      'email' => 'required|email',
      'mensaje' => 'required|min:10',
      'asunto' => 'required|min:5'
    );

    //Validate data
    $validator  = Validator::make ($data, $rules);

    //If everything is correct than run passes.
    if ($validator -> passes()){

      //Send email using Laravel send function
      Mail::send('emails.contacto', $data, function($message) use ($data)
                 {
                   //email 'From' field: Get users email add and name
                   $message->from($data['email'] , $data['nombre']);
                   //email 'To' field: cahnge this to emails that you want to be notified.                    
                   $message->to(self::MY_EMAIL, self::MY_NAME)->cc(self::MY_EMAIL)->subject($data["asunto"]);

                 });

      return Redirect::to('/contacto')->withErrors('Email enviado correctamente.');  
    }else{
      //return contact form with errors
      return Redirect::to('/contacto')->withErrors($validator);
    }
  }
  
  public function compras(){
    View::share('titulo', "Compras");
    $this->layout->content = View::make('order');
  }
  
   public function vendedor(){
     View::share('titulo', "Menú vendedor");
    $this->layout->content = View::make('vendedor');
  }
 
  public function cliente(){
    View::share('titulo', "Menú cliente");
    $this->layout->content = View::make('cliente');
  }
  
  
   public function login($message = ""){
     View::share('titulo', "Login");
    $this->layout->content = View::make('login')->withMessage($message);
  }
  
  public function logout(){
    View::share('titulo', "Logout");
    Auth::logout();
    return Redirect::to('/');
  }
  
  public function logeando()
  {
    
    // Guardamos en un arreglo los datos del usuario.
    $userdata = array(
      'rut' => Input::get('usuario'),
      'password'=> Input::get('pass'),
    );
    
    if(!Usuario::find($userdata["rut"])->activo)
      {
      $error = "No tienes permiso para entrar al sistema.";
      return Redirect::back()->withErrors($error)->withInput(Input::except('pass')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
  
  }
    if(Auth::attempt($userdata))
    {
        
      switch (Auth::user()->tipo_usuario)
      {
        case 'administrador':
          return Redirect::to('/sesion/administrador');
        break;
        case 'vendedor':
          return Redirect::to('/sesion/vendedor');
        break;
        case 'cliente':
          return Redirect::to('/sesion/cliente');
        break;
      }
      
    }
    else
    {
       $error = "Combinación de rut y contraseña inválido.";
      return Redirect::back()->withErrors($error)->withInput(Input::except('pass')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
  
    }
  }
  
}
