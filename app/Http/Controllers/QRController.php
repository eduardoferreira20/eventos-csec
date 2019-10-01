<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inscricao;
use App\Oficinas;
use PDF;
use QrCode;

class QRController extends Controller
{
	public function qrcode($id,$user_id) {

		$i=Inscricao::where('user_id',$user_id)->first();
		$qr = QrCode::size(240)->generate($i->id);

		return view('qrcode',compact('qr','i'));
	}
	public function listaQR($event_id){
		$i=Inscricao::where('event_id',$event_id)->get();
		return view('excel',compact('i'));
	}

	public function leitor(){
		return view('scanQR');
	}

	public function qr(){
		return view('qr');
	}

	public function uper(Request $r){

		session(['content' =>$r->content]);
		$id = '7';
		Oficinas::create([
				'user_id' => $r,
				'event_id' => $id,
				'status' => true,
			]);

		dd($r);
	}

	
	public function up($user_id){
		$presenca = Inscricao::where('user_id',$user_id)->first();
		if($presenca->envio == 0){
			$presenca->update(['presenca' => '1']);
		}
		return back();
	}
}
