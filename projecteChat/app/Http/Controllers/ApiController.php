<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;

class ApiController extends Controller
{
    function getChatPublico(){
    	$obj = Denuncia::all();
    	return response(json_encode($obj), 200)->header('Content-Type', 'application/json');
    }
}
