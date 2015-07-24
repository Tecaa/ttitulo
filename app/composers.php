<?php

View::composer('compartidos.navbar', function($view) {
    $view->with('categorias', Categoria::get());
});

View::composer('compartidos.vendedorMenu', function($view) {
    $view->with('numpedidos', Documento::where('tipo_documento', '=', 'pedido')->count());
});