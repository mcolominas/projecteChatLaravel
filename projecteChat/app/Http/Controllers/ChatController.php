<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getIndex(){
    	return "index";
    	return view('');

    }

    public function getDenuncias(){
    	return view('paginas.denuncias');

    }

     public function getChatroom(){

    	return view('');

    }

     public function putDenuncias(){

    	return view('paginas.denuncia');

    }

     public function getForo(){

    	return view('');

    }

     public function getIntercanvios(){

    	return view('');

    }

}
