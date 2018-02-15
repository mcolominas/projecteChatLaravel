<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatPublico;
use App\MensajesPublico;
use DateTime;

class ApiController extends Controller
{
    function getChatPublico(){
    	$json = ChatPublico::select("id", "nombre", "imagen")->get()->toJson();
    	return response($json, 200)->header('Content-Type', 'application/json');
    }

    function getMensajesPublico($id){
    	$difHoraria = 3600;
    	$timestamp = (new DateTime())->getTimestamp() - (60*60) + $difHoraria;
    	$data = gmdate("Y-m-d H:i:s", $timestamp);

    	$msj = MensajesPublico::from('users as usr')
			    ->join('mensajes_publicos as msj',function($join){
			        $join->on('msj.id_usuario','=','usr.id');
			    })    
			    ->select("name as username", "imagen", "mensaje", "msj.created_at as enviado")
    			->where([['msj.created_at','>=',$data],['msj.id_chat_publico','=',$id]])
			    ->get();
			    
		if($msj->count() == 0){
			$msj = MensajesPublico::from('users as usr')
			    ->join('mensajes_publicos as msj',function($join){
			        $join->on('msj.id_usuario','=','usr.id');
			    })
			    ->where('msj.id_chat_publico','=',$id)
			    ->select("name as username", "imagen", "mensaje", "msj.created_at as enviado")->take(20)->get();
		}

    	return response(json_encode($msj), 200)->header('Content-Type', 'application/json');
    }

    function getChatPrivado($id){
    	return $id;
    }
}