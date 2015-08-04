<?php

class ListadoController extends BaseController {
  protected $layout = "layouts.admin";

  public function __construct()
  {
    /*
    if (Request::is("listado/carroCompras"))
    {
        $this->layout = "layouts.page-content";
    }

    if (Request::is("listado/listarProductos"))
    {
        $this->layout = "layouts.page-content";
    }  
      if (Request::is("listado/listarLab"))
    {
        $this->layout = "layouts.page-content";
    } 
      if (Request::is("listado/listarCat"))
    {
        $this->layout = "layouts.page-content";
    } 
            if (Request::is("listado/pedidos"))
    {
        $this->layout = "layouts.page-content";
    } */

  }


  public function productos(){
    View::share('titulo', "Lista de Productos");
    $this->layout->content = View::make('listados.productos');

    JavaScript::put([
      'productos' => Producto::where('activo', '=', true)->with('proveedor')->get(),
      'tipo_usuario' => Auth::user()->tipo_usuario
    ]);

  }

  public function eliminados(){


    View::share('titulo', "Lista de Productos Eliminados");
    $this->layout->content = View::make('listados.eliminados');
    JavaScript::put([
      'productos' => Producto::where('activo', '=', false)->with('proveedor')->get()
    ]);
  }

  public function agendaProveedores(){
    View::share('titulo', "Agenda Proveedores");
    $this->layout->content = View::make('listados.agendaProveedores');

    JavaScript::put([
      'proveedor' => Proveedor::with('ciudad')->get()
    ]);
  }

  public function proveedores(){
    View::share('titulo', "Proveedores");
    $this->layout->content = View::make('listados.proveedores');

    JavaScript::put([
      'proveedor' => Proveedor::with('ciudad')->get(),
      'tipo_usuario' => Auth::user()->tipo_usuario
    ]);
  }


  public function categorias(){
    View::share('titulo', "Lista de Categorías");
    $this->layout->content = View::make('listados.categorias');

    JavaScript::put([
      'categorias' => Categoria::get(),
      'tipo_usuario' => Auth::user()->tipo_usuario
    ]);
  }

  public function laboratorios(){
    View::share('titulo', "Lista de Laboratorios");
    $this->layout->content = View::make('listados.laboratorios');

    JavaScript::put([
      'laboratorios' => Laboratorio::get(),
      'tipo_usuario' => Auth::user()->tipo_usuario
    ]);
  }

  public function compras(){
    View::share('titulo', "Informe de Compras");
    $this->layout->content = View::make('listados.compras');

    JavaScript::put([
      'compras' => Documento::where('tipo_documento','=','factura')->with('factura')->with('factura.proveedor')->get()
    ]);

  }
  public function carroCompras(){
    View::share('titulo', "Carro de compras");
    $metodos = MetodoEnvio::get();
    $this->layout->content = View::make('listados.carroCompras')->withMetodos($metodos);
    JavaScript::put([
      'metodos' => $metodos
    ]);

  }
  public function listadoPedido(){
    View::share('titulo', "Pedido");
    $this->layout->content = View::make('listados.listadoPedido');
    JavaScript::put([
      'pedidos' => Documento::where('tipo_documento','=', 'pedido')->with('boleta')->with('boleta.cliente')->get()
    ]);
  }

  public function listarVendedor(){
    View::share('titulo', "Vendedores");
    $this->layout->content = View::make('listados.vendedores'); 

    JavaScript::put([
      'vendedor' => Usuario::where('tipo_usuario','=', 'vendedor')->where('activo', '=', 1)->with('ciudad')->get()
    ]);

  }

  public function listadoClientes(){
    View::share('titulo', "Clientes");
    $this->layout->content = View::make('listados.clientes'); 

    JavaScript::put([
      'clientes' => Usuario::where('tipo_usuario','=', 'cliente')->with('ciudad')->get()
    ]);
  }  

  public function listadoBancos(){
    View::share('titulo', "Bancos");
    $this->layout->content = View::make('listados.bancos'); 

    JavaScript::put([
      'bancos' => Banco::get()
    ]);
  }
  /*
    public function listarCat(){
    View::share('titulo', "Ciudades");
    $this->layout->content = View::make('listados.listarCat'); 

    JavaScript::put([
        'categorias' => Categoria::get()
    ]);   
  }  

  public function listarLab(){
    View::share('titulo', "Listado de Laboratorios");
    $this->layout->content = View::make('listados.listarLab'); 

    JavaScript::put([
        'laboratorios' => Laboratorio::get()
    ]);
  }  
  */
  public function listadoCiudades(){
    View::share('titulo', "Ciudades");
    $this->layout->content = View::make('listados.ciudades'); 

    JavaScript::put([
      'ciudades' => Ciudad::get()
    ]);
  }  
  /*
    public function listProductos(){
    View::share('titulo', "Lista de Productos");
    $this->layout->content = View::make('listados.listProductos');

    JavaScript::put([
        'productos' => Producto::where('activo', '=', true)->with('laboratorio')->get()
    ]);

  }*/

  public function ajustes(){
    View::share('titulo', "Ajustes");
    $this->layout->content = View::make('listados.ajustes'); 

    JavaScript::put([
      'ajuste' => Ajuste::with("producto")->get()
    ]);
  }   
  
    public function metodos(){
      View::share('titulo', "Métodos de Envío");
      $this->layout->content = View::make('listados.metodosEnvio'); 

      JavaScript::put([
        'metodos' => MetodoEnvio::get()
      ]);
  }
  
    public function desactivados(){
      View::share('titulo', "Vendedores Desactivados");
      $this->layout->content = View::make('listados.desactivados');
      JavaScript::put([
        'vendedor' => Usuario::where('tipo_usuario', '=', 'vendedor')->where('activo', '=', 0)->with('ciudad')->get()
    ]);
  }
  
   
  
}  