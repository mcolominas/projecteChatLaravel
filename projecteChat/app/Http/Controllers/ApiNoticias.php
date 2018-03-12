<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Carbon\Carbon;

class ApiNoticias extends Controller
{
    public function getNoticias(){
        $data = Carbon::now();
        $data ->day -= 7;

        Noticia::where([["created_at","<=", $data],["importante","=", "1"]]) 
                -> update(["importante" => "0"]);
        
        $consultasImportantes = Noticia::select("titulo", "mensaje", "categoria", "imagen")
        			-> orderBy('created_at', 'desc')
                    -> where("importante","=", "1")
                    -> get()
                    -> toArray();  
                       
        $consultas = Noticia::select("titulo", "mensaje", "categoria", "imagen")
        			-> orderBy('created_at', 'desc')
                    -> where("importante","=", "0")
                    -> get()
                    -> toArray();

        $consultasImportantes = ["importantes" => $consultasImportantes];
        $consultas = ["normal" => $consultas];
        $consultasTotal = array_merge($consultasImportantes, $consultas);
        return response(json_encode($consultasTotal), 200)->header('Content-Type', 'application/json');
    }

    public function getCategorias(){
        $categorias = Noticia::select("categoria as nombre")
                    -> groupBy('categoria')
                    -> orderBy('categoria', 'desc')
                    -> get()
                    -> toArray();
        return response(json_encode($categorias), 200)->header('Content-Type', 'application/json');
    }
}
