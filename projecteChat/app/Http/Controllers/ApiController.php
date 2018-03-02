<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatPublico;
use App\MensajesPublico;
use Carbon\Carbon;

class ApiController extends Controller
{
    function getChatPublico(){
    	$json = ChatPublico::select("id", "nombre", "imagen")->get()->toJson();
    	return response($json, 200)->header('Content-Type', 'application/json');
    }

    function getMensajesPublico(Request $request){
        $id = $request->input('idSala');
        $data = Carbon::now();
        $data ->hour -= 1;

    	$msj = MensajesPublico::from('users as usr')
			    ->join('mensajes_publicos as msj',function($join){
			        $join->on('msj.id_usuario','=','usr.id');
			    })    
			    ->select("msj.id as idMensaje", "name as username", "imagen", "mensaje", "msj.created_at as enviado", "usr.id as idUsuario", "id_chat_publico as idSala")
    			->where([['msj.created_at','>=',$data],['msj.id_chat_publico','=',$id]])
                ->orderby('msj.created_at', 'asc')
			    ->get();
	    
		if($msj->count() == 0){
			$msj = MensajesPublico::from('users as usr')
			    ->join('mensajes_publicos as msj',function($join){
			        $join->on('msj.id_usuario','=','usr.id');
			    })
			    ->where('msj.id_chat_publico','=',$id)
			    ->select("msj.id as idMensaje", "name as username", "imagen", "mensaje", "msj.created_at as enviado", "usr.id as idUsuario","id_chat_publico as idSala")
                ->orderby('msj.created_at', 'asc')
                ->take(20)->get();
		}

    	return response(json_encode($msj), 200)->header('Content-Type', 'application/json');
    }

    function getChatPrivado($id){
    	return $id;
    }

    function setMensajesPublico(Request $request){
        $idSala = $request->input('idSala');
        $idUsuario = $request->input('idUsuario');
        $mensaje = $request->input('mensaje');

        $chat = new MensajesPublico();
        $chat->id_chat_publico = $idSala;
        $chat->id_usuario = $idUsuario;
        $chat->mensaje = $mensaje;

        $chat->save();
        return response(json_encode(["idMensaje" => $chat->id]), 200)->header('Content-Type', 'application/json');
    }

    function getLastMensajes(Request $request){
        $idSala = $request->input('idSala');
        $idMensaje = $request->input('idMensaje');

        $consulta = MensajesPublico::from('users as usr')
                  ->join('mensajes_publicos as msj',function($join){
                    $join->on('msj.id_usuario','=','usr.id');
                })    
                  ->select("msj.id as idMensaje", "name as username", "imagen", "mensaje", "msj.created_at as enviado", "usr.id as idUsuario","msj.id_chat_publico as idSala")
                  ->where([['msj.id','>',$idMensaje], ['id_chat_publico','=', $idSala]])
                  ->orderby('msj.created_at', 'asc')
                  ->get();

       return response(json_encode($consulta), 200)->header('Content-Type', 'application/json');

    }
}