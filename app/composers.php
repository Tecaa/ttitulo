<?php

View::composer('compartidos.navbar', function($view) {
    $view->with('categoriasM', Categoria::where('tipo', 'material')->orderBy("nom_categoria")->get());
});

View::composer('compartidos.navbar', function($view) {
    $view->with('categoriasA', Categoria::where('tipo', 'accesorio')->orderBy("nom_categoria")->get());
});

View::composer('compartidos.vendedorMenu', function($view) {
    $view->with('numpedidos', Documento::where('tipo_documento', '=', 'pedido')->count());
});
View::composer('compartidos.adminMenu', function($view) {
    $view->with('numpedidos', Documento::where('tipo_documento', '=', 'pedido')->count());
});