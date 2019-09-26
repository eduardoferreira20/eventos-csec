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
    public function user(){
    	
    	$usuarios = User::all();

    	return view('adminPage')->with('user',$usuarios);
    }

    public function editar($id,Request $re){

    	$user = User::find($id);
    	$dados = array('name' =>$user->name,
            'email' =>$user->email,
            'password' =>$user->password,
            'nacionalidade' =>$user->nacionalidade,
            'instituicao' =>$user->instituicao,
            'documento' =>$user->documento,
            'tipo' =>$user->tipo,
            'phone' =>$user->phone,
            'celular' =>$user->celular,);
    	return view('adminEditar',compact('user','dados'));
    }

    public function atualizar(Request $re, $id){
    	$user = $request['old'];
    	$check = User::where('id',$id)->first();
    	// $dados = $re->all();

    	if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }
 
        $user ->save();
        return back();
    }

    public function palestras($event_id){

    	$palestras = Palestras::where('events_id',$event_id)->get();

    	return view('palestras')->with('palestras',$palestras);
    }
}
