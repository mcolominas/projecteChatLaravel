<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForoController extends Controller
{
    public function getForo(){
    	return view('paginas.foro');
    }
}
