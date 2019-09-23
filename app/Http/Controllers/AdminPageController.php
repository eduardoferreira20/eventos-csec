<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\Event;
use App\User;
use App\Oficinas;
use App\Palestras;
use App\Inscricao;

class AdminPageController extends Controller
{
    public function showInscricoes(){
    	
    	$evento = Event::all();

    	return view('adminPage')->with('evento',$evento);
    }

    public function palestras($event_id){

    	$palestras = Palestras::where('events_id',$event_id)->get();

    	return view('palestras')->with('palestras',$palestras);
    }
}
