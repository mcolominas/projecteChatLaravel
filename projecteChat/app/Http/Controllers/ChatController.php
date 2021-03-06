<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getChatroom(){

    	$imagen = Auth::user()->imagen;
    	if (!isset($imagen)){
    		$imagen = "img/imageEmpty.png";
    	}
    	$userName = Auth::user()->name;
    	$userId = Auth::user()->id;

    	return view('paginas.chatroom', ["imagen" => $imagen, "username" => $userName, "userId" => $userId]);
    }
}
