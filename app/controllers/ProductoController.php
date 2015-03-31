<?php

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
    $labs = Laboratorio::get();
    $categorias = Categoria::get();
    View::share('titulo', "Crear Producto");
    $this->layout->content = View::make('producto.crear')->withLabs($labs)->withCategorias($categorias);
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Producto");
    $producto = new Producto();
    $producto->nombre_producto = Input::get('nombre');
    $producto->codigo_barras = Input::get('codigoB');
    $producto->cod_laboratorio = Input::get('laboratorio');
    $producto->descripcion = Input::get('descripcion');
    $producto->precio_venta = Input::get('precio');
    $producto->imagen = base64_encode(file_get_contents(Input::file('imagen')));
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
    View::share('titulo', "Consultar Producto");
    JavaScript::put([
        'producto' => $producto,
       'producto.laboratorio' =>$producto->laboratorio
    ]);
    $this->layout->content = View::make('producto.consultar')->withProducto($producto)->with("laboratorio");
    
  }
  
  public function obtener()
  {
    
    return Producto::where('codigo_barras', '=', Input::get('codigo_barras'))->with('laboratorio')->first();
  }
  
  public function editar($codigo_producto){
    $labs = Laboratorio::get();
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
    $producto->codigo_barras = Input::get('codigoB');
    $producto->cod_laboratorio = Input::get('laboratorio');
    $producto->descripcion = Input::get('descripcion');
    $producto->precio_venta = Input::get('precio');
    if (Input::file('imagen') != null)
      {
      //$producto->imagen = base64_encode(file_get_contents(Input::file('imagen')));
      $producto->imagen = base64_encode(Image::make(Input::file('imagen'))->resize(336, 387)->encode('jpg', 40));
    }
    $producto->save();
   
    CatProducto::where('codigo_producto', '=', $producto->codigo_producto)->delete();
    foreach(Input::get('idsCategorias') as $categoria){
    $catpro = new CatProducto();
    $catpro->codigo_producto = $producto->codigo_producto;
    $catpro->cod_categoria = $categoria;
     $catpro->save();
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
        'productos' => Producto::where('activo', '=', true)->where('cantidad','<=',3)->with('laboratorio')->get()
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