<?php
use Carbon\Carbon;
  
class ProductoController extends BaseController {
  protected $layout = "layouts.admin";

  public function __construct()
  {
    if (Request::is("producto/listar") || Request::is("producto/categoria/*"))
    {
      $this->layout = "layouts.catalogue";
    }
    if (Request::is("producto/consultar/*"))
    {
      $this->layout = "layouts.page-content";
    }

  }
  public function crear(){
    $labs = Proveedor::get();
    $categorias = Categoria::get();
    View::share('titulo', "Crear Producto");
    $this->layout->content = View::make('producto.crear')->withLabs($labs)->withCategorias($categorias);
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Producto");
    $producto = new Producto();
    $producto->nombre_producto = Input::get('nombre');
    $producto->codigo_barras = strtoupper(Input::get('codigoB'));
    $producto->cod_proveedor = Input::get('laboratorio');
    $producto->descripcion = Input::get('descripcion');
    $producto->cantidad = Input::get('cantidad');
    $producto->contenido = Input::get('contenido');
    $producto->ingredientes = Input::get('ingredientes');
    $producto->precio_venta = Input::get('precio');
    $producto->precio_compra = Input::get('precio_compra');
    
    if (Input::file('imagen') != null) {
    $producto->imagen = base64_encode(file_get_contents(Input::file('imagen')));
    }
    else      
      $producto->imagen = null;
      
    //$producto->imagen = base64_encode(file_get_contents(Input::file('imagen')->resize(510, 588)));
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
    $producto->precio_venta = Input::get('precio');
    $producto->contenido = Input::get('contenido');
    $producto->ingredientes = Input::get('ingredientes');
    if (Input::file('imagen') != null)
    {
      //$producto->imagen = base64_encode(file_get_contents(Input::file('imagen')));
      $producto->imagen = base64_encode(Image::make(Input::file('imagen'))->resize(336, 387)->encode('jpg', 40));
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
    $tipo = Input::get('tipo'); 
    if ($tipo == 'extra')
       $ajuste->tipo_ajuste = 'extra';
    else if ($tipo == 'dan')
         $ajuste->tipo_ajuste = 'dañado'; 
    else if ($tipo == 'devuelto')
          $ajuste->tipo_ajuste = 'devuelto';         
    else  
      $ajuste->tipo_ajuste = 'vencido';
    
    
    $producto = Producto::find($ajuste->codigo_producto);
    if ($ajuste->tipo_ajuste == 'extra' || $ajuste->tipo_ajuste == 'devuelto')
      $producto->cantidad = $producto->cantidad + $ajuste->cantidad;
    else if ($ajuste->tipo_ajuste == 'dañado' || $ajuste->tipo_ajuste == "vencido")
      $producto->cantidad = $producto->cantidad - $ajuste->cantidad;
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
                                    })->where('activo', '=', true);
    $pages = ceil($productos->count() /$perPage);

    $productos = $productos->skip($perPage * ($page-1))->take($perPage)->get();

    $cat = Categoria::find($codigo_categoria);
    $this->layout->content = View::make('producto.listar')->withProductos($productos)->withCategoria($cat)->withPages($pages)->withPage($page);
  }
  
  
}