<?php

namespace judiostatic\Http\Controllers;

use judiostatic\Http\Controllers\Controller;

class PruebaController extends Controller{

    public function prueba($name){
        return 'Estoy dentro de prueba controller >:D, mi nombre es '.$name;
    }


}
