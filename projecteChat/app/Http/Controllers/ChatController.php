<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Denuncia;
use DateTime;

class ChatController extends Controller
{
    public function getIndex(){
    	return view('index');

    }

    public function getDenuncias(){
    	return view('paginas.denuncias');

    }

     public function getChatroom(){

    	return view('paginas.chatroom');

    }

     public function putDenuncias(Request $request){
        if (!Auth::check()) return view('paginas.denuncias', array("mensaje" => array("user" => "Necesitas logearte para enviar una denuncia.")));

        //Variables
        $mensaje = [];

        $destinationPathImg = "img/denuncias";
        $idUsuario = Auth::user()->id;
        $imgDenuncia = $request->file('imgDenuncia');
        $descripcion = $request->input('mensaje');
        $coordenadas = $request->input('coords');
        $extencionImg = null;

        //Errores
        if(isset($imgDenuncia)){
            $extencionImg = strtolower($imgDenuncia->getClientOriginalExtension());
            switch ($extencionImg) {
                   case 'png':
                   case 'jpg':
                   case 'jpeg':
                       break;
                   
                   default:
                        $mensaje[] = ["image" => "Solo se aceptan las extenciones: png, jpg, jpeg."];
            }
        }
        if(!isset($descripcion)) $mensaje[] = ["mensaje" => "El mensaje no puede estar vacio."];        
        if(!isset($coordenadas)) $mensaje[] = ["mapa" => "Selecciona un punto en el mapa."];
        if(!isset($mensaje)) return view('paginas.denuncias', ["mensaje" => $mensaje]);

        //Almacenar imagen
        if(isset($imgDenuncia)){
            $nombreImg = $idUsuario.(new DateTime())->getTimestamp().".".$extencionImg;
            $request->file('imgDenuncia')->move($destinationPathImg, $nombreImg);
        }

        //Insertar en la BBDD
        $denuncia = new Denuncia();
        $denuncia->id_usuario = $idUsuario;
        $denuncia->mensaje = $descripcion;
        $denuncia->coordenadas = $coordenadas;
        if(isset($imgDenuncia))
            $denuncia->imagen = $destinationPathImg."/".$nombreImg;
        $denuncia->save();
        
        return view('paginas.denuncias', ["mensaje" => ["success" => "La denuncia se ha enviado con exito."]]);

    }

     public function getForo(){
    	return view('paginas.foro');

    }

     public function getIntercanvios(){

        return view('paginas.intercanvios');

    }

    /*public function getShowDenuncias(){

        return view('paginas.showDenuncias');

    }*/

}
