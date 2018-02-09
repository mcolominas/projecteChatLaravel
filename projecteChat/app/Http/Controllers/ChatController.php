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
        if (!Auth::check()) return "usuario no logeado";
        $extencionImg = strtolower($request->file('imgDenuncia')->getClientOriginalExtension());
        switch ($extencionImg) {
               case 'png':
               case 'jpg':
               case 'jpeg':
                   break;
               
               default:
                   return "No se acepta la extencion: ".$extencionImg;
        }

        $idUsuario = Auth::user()->id;
        $destinationPathImg = "img/denuncias";
        $nombreImg = $idUsuario.(new DateTime())->getTimestamp().".".$extencionImg;
        $request->file('imgDenuncia')->move($destinationPathImg, $nombreImg);

        $denuncia = new Denuncia();
        $denuncia->id_usuario = $idUsuario;
        $denuncia->mensaje = $request->input('mensaje');
        $denuncia->coordenadas = $request->input('coords');
        $denuncia->imagen = $destinationPathImg."/".$nombreImg;
        $denuncia->save();
    	
        return view('paginas.denuncias');

        /* if (!Auth::check()) return view('paginas.denuncias', array("mensaje" => array("usuario" => "Necesitas logearte para enviar una denuncia.")));
        $extencionImg = strtolower($request->file('imgDenuncia')->getClientOriginalExtension());
        switch ($extencionImg) {
               case 'png':
               case 'jpg':
               case 'jpeg':
                   break;
               
               default:
                    return view('paginas.denuncias', array("mensaje" => array("image" => "Solo se aceptan las extenciones: png, jpg, jpeg.")));
        }
        $mensaje = $request->input('mensaje');
        if(!isset($mensaje)) return view('paginas.denuncias', array("mensaje" => array("mensaje" => "El mensaje no puede estar vacio.")));

        $coordenadas = $request->input('coords');
        if(!isset($coordenadas)) return view('paginas.denuncias', array("mensaje" => array("mapa" => "Selecciona un punto en el mapa.")));

        $idUsuario = Auth::user()->id;
        $destinationPathImg = "img/denuncias";
        $nombreImg = $idUsuario.(new DateTime())->getTimestamp().".".$extencionImg;
        $request->file('imgDenuncia')->move($destinationPathImg, $nombreImg);

        $denuncia = new Denuncia();
        $denuncia->id_usuario = $idUsuario;
        $denuncia->mensaje = $mensaje
        $denuncia->coordenadas = $coordenadas;
        $denuncia->imagen = $destinationPathImg."/".$nombreImg;
        $denuncia->save();
        
        return view('paginas.denuncias', array("mensaje" => array("success" => "La denuncia de ha enviado con exito.")));*/

    }

     public function getForo(){
    	return view('paginas.foro');

    }

     public function getIntercanvios(){

    	return view('paginas.intercanvios');

    }

}
