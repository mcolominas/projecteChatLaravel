<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ChatController extends Controller
{
    public function getChatroom(){
    	return view('paginas.chatroom');
    }
}
