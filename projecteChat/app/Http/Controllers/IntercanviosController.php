<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntercanviosController extends Controller
{
    public function getIntercanvios(){
        return view('paginas.intercanvios');
    }
}
