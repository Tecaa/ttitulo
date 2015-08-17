<?php
use Carbon\Carbon;
  
class ProductoController extends BaseController {
  protected $layout = "layouts.admin";

  public function __construct()
  {
    if (Request::is("producto/listar") || Request::is("producto/categoria/*") || Request::is("producto/ofertas"))
    {
      $this->layout = "layouts.catalogue";
    }
    if (Request::is("producto/consultar/*"))
    {
      $this->layout = "layouts.page-content";
    }

  }
  public function encargoEntregar($cod_encargo){
    
        View::share('titulo', "Entregar encargo");
    $encargo = Encargo::find($cod_encargo);
    if ($encargo->estado_encargo != "encargado")
      return;
    $encargo->estado_encargo = "entregado";
    
    $producto = Producto::find($encargo->cod_producto);
    $producto->encargados -= 1;
    
    $documento = new Documento();
    $documento->rut = Auth::user()->rut;
    $documento->tipo_documento = 'boleta';


    if ($producto->cantidad - $encargo->cantidad < 0)
    {
      return 'Insuficiente stock de: ' + $produdcto->nombre_producto;
    }
    else
    {
      $producto->cantidad = $producto->cantidad - $encargo->cantidad;
    }

    $documento->precio_total = $encargo->producto->precioVentaFinal;
    $documento->cantidad_total = $encargo->cantidad;
    $documento->save();
    
    $boleta = new Boleta();
    $boleta->cod_documento = $documento->cod_documento;
    if ($encargo->rut != null)
      $boleta->rut = $encargo->rut;
    $boleta->save();


    $detboleta = new DetalleBoleta();
    $detboleta->cod_documento = $documento->cod_documento;
    $detboleta->codigo_producto = $producto->codigo_producto;
    $detboleta->cantidad = $encargo->cantidad;
    $detboleta->precio_venta = $producto->precioVentaFinal;
    $detboleta->precio_compra = $producto->precio_compra;
    
    $detboleta->save();
    $producto->save();
    $encargo->save();
    
    return Redirect::to('/listado/encargos');
  }
  public function encargoCancelar($cod_encargo){
        View::share('titulo', "Cancelar encargo");
    $encargo = Encargo::find($cod_encargo);
    if ($encargo->estado_encargo != "encargado");
      return;
    $producto = Producto::find($encargo->cod_producto);
    $producto->encargados -= 1;
    $encargo->estado_encargo = "rechazado";
    $encargo->save();
    $producto->save();

    return Redirect::to('/listado/encargos');
  }
  public function crear(){
    $labs = Proveedor::get();
    $categorias = Categoria::get();
    View::share('titulo', "Crear Producto");
    $this->layout->content = View::make('producto.crear')->withLabs($labs)->withCategorias($categorias);
  }
  
   public function verOfertas($page =1){
    $perPage = 12.0;
    View::share('titulo', "Ofertas");

    $productos = Producto::where('precio_venta_oferta', '!=', 0)->where('activo', '=', true)->where("cantidad", ">", "encargos")->where("uso_interno", false);
    $pages = ceil($productos->count() /$perPage);

    $productos = $productos->skip($perPage * ($page-1))->take($perPage)->get();

    $this->layout->content = View::make('producto.ofertas')->withProductos($productos)->withPages($pages)->withPage($page);
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Producto");
    $producto = new Producto();
    $producto->nombre_producto = Input::get('nombre');
    $producto->codigo_barras = strtoupper(Input::get('codigoB'));
    $producto->cod_proveedor = Input::get('laboratorio');
    $producto->descripcion = Input::get('descripcion');
    $producto->uso_interno = Input::get('uso_interno') == "true" ? true : false;
    $producto->cantidad = 0;
    $producto->contenido = Input::get('contenido');
    $producto->ingredientes = Input::get('ingredientes');
    //$producto->precio_venta = Input::get('precio');
    //$producto->precio_venta_oferta = Input::get('precio_venta_oferta');
    //$producto->precio_compra = Input::get('precio_compra');
    
    if (Input::file('imagen') != null) {
      $producto->imagen = base64_encode(Image::make(Input::file('imagen'))->resize(336, 387)->encode('jpg', 100));
      $producto->imagen_low = base64_encode(Image::make(Input::file('imagen'))->resize(336, 387)->encode('gif', 100));
    }
    else      
      $producto->imagen = null;
      
    $producto->save();
    
    if (Input::get('idsCategorias') != null)
      foreach(Input::get('idsCategorias') as $categoria){
      $catpro = new CatProducto();
      $catpro->codigo_producto = $producto->codigo_producto;
      $catpro->cod_categoria = $categoria;
      $catpro->save();
    }
    
    return Redirect::to('/listado/productos');
  }
  
  public function consultar($codigo_producto){
    $producto = Producto::find($codigo_producto);
    if(!Auth::user() || Auth::user()->tipo_usuario == "cliente")
    {
      $p = Session::get($producto->codigo_producto, 'false');
      if ($p === 'false' || $p->addHour() <= Carbon::now())
      {
        $producto->visitas += 1;
        $producto->save();
        Session::put($producto->codigo_producto, Carbon::now());
      }
    }
    View::share('titulo', "Consultar Producto");
    JavaScript::put([
      'producto' => $producto,
      'producto.laboratorio' =>$producto->proveedor/*,
      'imagen360' => $producto->imagen360*/
    ]);
    $this->layout->content = View::make('producto.consultar')->withProducto($producto)->with("proveedor");
    
  }
  
  public function obtener()
  {
    
    return Producto::where('codigo_barras', '=', Input::get('codigo_barras'))->with('proveedor')->first();
  }
  public function obtener360()
  {
    
    return Producto::where('codigo_producto', '=', Input::get('codigo_producto'))->first()->imagen360;
  }
  
  public function editar($codigo_producto){
    $labs = Proveedor::get();
    $producto = Producto::find($codigo_producto);
    $categorias = Categoria::get();
    $catsProducto = CatProducto::where('codigo_producto', '=', $producto->codigo_producto)->get();
    View::share('titulo', "Editar Producto");
    $this->layout->content = View::make('producto.editar')->withLabs($labs)->withProducto($producto)->withCategorias($categorias)->withCatsProducto($catsProducto);
    
  }
 
  public function editando($codigo_producto)
  {
    View::share('titulo', "Editando Producto");
    $producto = Producto::find($codigo_producto);
    $producto->nombre_producto = Input::get('nombre');
    $producto->codigo_barras = strtoupper(Input::get('codigoB'));
    $producto->cod_proveedor = Input::get('laboratorio');
    $producto->descripcion = Input::get('descripcion');
    $producto->precio_compra = Input::get('precio_compra');
    $producto->uso_interno = Input::get('uso_interno') == "true" ? true : false;
    $producto->precio_venta = Input::get('precio');
    $producto->contenido = Input::get('contenido');
    $producto->ingredientes = Input::get('ingredientes');
    if (Input::get("precio_venta_oferta") != null && Input::get("precio_venta_oferta") != 0)
    $producto->precio_venta_oferta = Input::get('precio_venta_oferta');
    if (Input::file('imagen') != null)
    {
      //$producto->imagen = base64_encode(file_get_contents(Input::file('imagen')));
      $producto->imagen = base64_encode(Image::make(Input::file('imagen'))->resize(336, 387)->encode('jpg', 100));
      $producto->imagen_low = base64_encode(Image::make(Input::file('imagen'))->resize(336, 387)->encode('gif', 100));
    }
    $producto->save();
    
    
    
    $img360 = Imagen360::find($codigo_producto);
    if ($img360 == null)
    {
      $img360 = new Imagen360();
      $img360->codigo_producto = $codigo_producto;
    }
    if (Input::file('img0') != null)
      $img360->d0  = base64_encode(Image::make(Input::file('img0'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img45') != null)
      $img360->d45  = base64_encode(Image::make(Input::file('img45'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img90') != null)
      $img360->d90  = base64_encode(Image::make(Input::file('img90'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img135') != null)
      $img360->d135  = base64_encode(Image::make(Input::file('img135'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img180') != null)
      $img360->d180  = base64_encode(Image::make(Input::file('img180'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img225') != null)
      $img360->d225  = base64_encode(Image::make(Input::file('img225'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img270') != null)
      $img360->d270 = base64_encode(Image::make(Input::file('img270'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img315') != null)
      $img360->d315  = base64_encode(Image::make(Input::file('img315'))->resize(336, 387)->encode('jpg', 100));
    if (Input::file('img0') != null)
      $img360->save();
    
    
    CatProducto::where('codigo_producto', '=', $producto->codigo_producto)->delete();
    if (Input::get('idsCategorias')!= null)
    {
      foreach(Input::get('idsCategorias') as $categoria){
        $catpro = new CatProducto();
        $catpro->codigo_producto = $producto->codigo_producto;
        $catpro->cod_categoria = $categoria;
        $catpro->save();
      }
    }
    return Redirect::to('/listado/productos');
  }

    
  public function encargar($codigo_producto){
    $producto = Producto::find($codigo_producto);
    $catsProducto = CatProducto::where('codigo_producto', '=', $producto->codigo_producto)->get();
    View::share('titulo', "Encargar Producto");
    $this->layout->content = View::make('producto.encargar')->withProducto($producto)->withCatsProducto($catsProducto);
    
  }
  
  public function encargando($codigo_producto){
    //Get all the data and store it inside Store Variable
    $data = Input::all();

    //Validation rules
    $rules = array (
      'nombre' => 'required|alpha_spaces',
      'fecha_encargo' => 'required',
      'monto_abonado' => 'required|numeric',
      'cantidad' => 'required|numeric'
    );

    //Validate data
    $validator  = Validator::make ($data, $rules);

    //If everything is correct than run passes.
    if ($validator -> passes()){
      $encargo = new Encargo();
      if (Input::get('rut') != null)
        $encargo->rut = Input::get('rut');
      $encargo->nombre_cliente = Input::get('nombre');
      $encargo->fecha_encargo = Input::get('fecha_encargo');
      $encargo->estado_encargo = "encargado";
      $encargo->monto_abonado = Input::get('monto_abonado');
      $encargo->cantidad = Input::get('cantidad');
      $encargo->rut_vendedor = Auth::user()->rut;
      $encargo->cod_producto = $codigo_producto;
      
      $p = Producto::find($codigo_producto);
      $p->encargados += 1;
      $p->save();
      
      $encargo->save();
    }
    return Redirect::to('/listado/encargos');
    
  }
  
  public function eliminando($codigo_producto){
    View::share('titulo', "Eliminar Producto");
    $producto = Producto::find($codigo_producto);
    $producto->activo = false;
    $producto->save();
    return Redirect::to('/listado/productos');
  }
  
  public function activando($codigo_producto){
    View::share('titulo', "Activar Producto");
    $producto = Producto::find($codigo_producto);
    $producto->activo = true;
    $producto->save();
    return Redirect::to('/listado/eliminados');
  }
  
  public function listar(){
    View::share('titulo', "Lista de productos");
    $this->layout->content = View::make('producto.listar');
  }
  
  public function ajustar($codigo_producto){
    View::share('titulo', "Ajustar Producto");
    $this->layout->content = View::make('ajuste')->withProducto(Producto::find($codigo_producto));
  }
    
  public function ajustando($codigo_producto)
  {
    $ajuste = new Ajuste();  
    $ajuste->codigo_producto = $codigo_producto;
    $ajuste->cantidad = Input::get('cantidad');
    $ajuste->descripcion = Input::get('descripcion');
    $ajuste->fecha_ajuste = Carbon::now();
    $ajuste->rut = Auth::user()->rut;
      $ajuste->tipo_ajuste = Input::get('tipo'); ;
    
    
    $producto = Producto::find($ajuste->codigo_producto);
    if ($ajuste->tipo_ajuste == 'extra' || $ajuste->tipo_ajuste == 'devuelto')
      $producto->cantidad = $producto->cantidad + $ajuste->cantidad;
    else if ($ajuste->tipo_ajuste == 'dañado')
      $producto->cantidad = $producto->cantidad - $ajuste->cantidad;
      else if ($ajuste->tipo_ajuste == "inventario")
      $producto->cantidad = $ajuste->cantidad;
      else
      return Redirect::to('/listado/ajustes');  
    if ($producto->cantidad >= 0)
    {
      $producto->save();
      $ajuste->save();
    }
    else
      ;//TODO: lanzar error
    return Redirect::to('/listado/ajustes');
  }  
  
   public function stockCritico(){
     View::share('titulo', "Stock Crítico");
     $this->layout->content = View::make('producto.stock');
    
    JavaScript::put([
        'productos' => Producto::where('activo', '=', true)->whereRaw('cantidad <= ceil(ultima_compra/3)')->with('proveedor')->get()    
        //'productos' => Producto::where('activo', '=', true)->where('cantidad','<=',ceil('ultima_compra'/3))->with('laboratorio')->get()
    ]);
  }
  public function listarCategoria($codigo_categoria, $page =1){
    $perPage = 12.0;
    View::share('titulo', "Lista de productos");

    $productos = Producto::whereHas('CatProducto', function($query) use ($codigo_categoria)
                                    {
                                      $query->where('cod_categoria', '=' , $codigo_categoria);
                                    })->where('activo', '=', true)->where("cantidad", ">", "encargos")->where("uso_interno", false);
    $pages = ceil($productos->count() /$perPage);

    $productos = $productos->skip($perPage * ($page-1))->take($perPage)->get();

    $cat = Categoria::find($codigo_categoria);
    $this->layout->content = View::make('producto.listar')->withProductos($productos)->withCategoria($cat)->withPages($pages)->withPage($page);
  }
  
  
}