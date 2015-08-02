<?php

View::composer('compartidos.navbar', function($view) {
    $view->with('categorias', Categoria::orderBy("nom_categoria")->get());
});

View::composer('compartidos.vendedorMenu', function($view) {
    $view->with('numpedidos', Documento::where('tipo_documento', '=', 'pedido')->count());
});
View::composer('compartidos.adminMenu', function($view) {
    $view->with('numpedidos', Documento::where('tipo_documento', '=', 'pedido')->count());
});