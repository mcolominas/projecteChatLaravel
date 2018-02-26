<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Noticia;
use DateTime;

class NoticiasController extends Controller
{
    public function getNoticias(){
        //hacer que a los 7 dias se quite el importante
        //https://laravel.com/docs/5.6/eloquent#updates
        //https://laravel.com/docs/5.0/eloquent#insert-update-delete

        
        $consultasImportantes = Noticia::orderBy('created_at', 'desc')
                    -> where("importante","=", "1")
                    -> get();     
        $consultas = Noticia::orderBy('created_at', 'desc')
                    -> where("importante","=", "0")
                    -> get();
        $categorias = Noticia::select("categoria as nombre")
                    -> groupBy('categoria')
                    -> orderBy('categoria', 'desc')
                    -> get();

        return view('paginas.noticias', ["noticias" => $consultas, "noticiasImportantes" => $consultasImportantes, "categorias" => $categorias]);

    }

    public function getNoticiasByCategoria($categoria){
        $categoria = strtolower($categoria);
        $consultasImportantes = Noticia::orderBy('created_at', 'desc')
                    -> where([["categoria","=", $categoria],["importante","=", "1"]])
                    -> get();  
        $consultas = Noticia::where([["categoria","=", $categoria],["importante","=", "0"]])
                     -> orderBy('created_at', 'desc')
                     -> get();
        $categorias = Noticia::select("categoria as nombre")
                    -> where("categoria","!=", $categoria)
                    -> groupBy('categoria')
                    -> orderBy('categoria', 'desc')
                    -> get();

        return view('paginas.noticias', ["noticias" => $consultas, "noticiasImportantes" => $consultasImportantes, "categorias" => $categorias, "categoriaActual" => ucfirst($categoria)]);
    }

    public function getAddNoticias(){
        return view('paginas.crearNoticia');
    }

    public function putAddNoticias(Request $request){
        if (!Auth::check()) return view('paginas.crearNoticia', array("mensaje" => array("user" => "Necesitas logearte para introducir una noticia.")));

        //Variables
        $destinationPathImg = "img/upload/noticias";
        $idUsuario = Auth::user()->id;
        $titul = $request->input('titulo');
        $descripcion = $request->input('mensaje');
        $importante = ($request->input('importante') !== null);
        $categoria = $request->input('categoria');
        $imgNoticia = $request->file('imgNoticia');
        $extencionImg = null;

        //Errores
        if(isset($imgNoticia)){
            $extencionImg = strtolower($imgNoticia->getClientOriginalExtension());
            switch ($extencionImg) {
                   case 'png':
                   case 'jpg':
                   case 'jpeg':
                       break;
                   
                   default:
                        $mensaje["image"] = "Solo se aceptan las extenciones: png, jpg, jpeg.";
            }
        }
        if(!isset($titul)) $mensaje["titul"] = "El titulo no puede estar vacio.";
        if(!isset($descripcion)) $mensaje["mensaje"] = "El mensaje no puede estar vacio.";
        if(!isset($categoria)) $mensaje["mensaje"] = "La categoria no puede estar vacia.";
        if(isset($mensaje)) return view('paginas.crearNoticia', ["mensaje" => $mensaje]);

        //Almacenar imagen
        if(isset($imgNoticia)){
            $nombreImg = $idUsuario.(new DateTime())->getTimestamp().".".$extencionImg;
            $request->file('imgNoticia')->move($destinationPathImg, $nombreImg);
        }

        //Insertar en la BBDD
        $noticia = new Noticia();
        $noticia->titulo = $titul;
        $noticia->mensaje = $descripcion;
        $noticia->importante = $importante;
        $noticia->categoria = $categoria;

        if(isset($imgNoticia))
            $noticia->imagen = $destinationPathImg."/".$nombreImg;
        $noticia->save();

        return redirect()->action('NoticiasController@getNoticias');
    }
}
