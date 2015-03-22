<?php

View::composer('compartidos.navbar', function($view) {
    $view->with('categorias', Categoria::get());
});