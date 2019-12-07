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

	public function ler(){
		return view('ScanJS');
	}

	//altera pela camera o status da inscrição
	public function mudar(Request $r){
		
		$user = $r->user_id;

		$palestra_id =1;


		$splitUser = explode('.',$user,2);

		$user_id = $splitUser[0];

		$event_id = $splitUser[1];
		$inscri = Oficinas::where('user_id',$user_id)->where('palestra_id',$palestra_id)->where('event_id',$event_id)->first();

		$inscri->update(['status' => '1']);

		return view('qr',compact('inscri'));

	}

	public function leitor(){
		return view('scanQR');
	}

	public function qr(){
		return view('qr');
	}

	public function uper(Request $r){
		$ins = new Inscricao();
		session(['data' =>$r->content]);
		$ins->user_id = $r->content;
		$ins->event_id = '7';
		$ins->status = true;
	}
	public function up($user_id){
		$presenca = Inscricao::where('user_id',$user_id)->first();
		if($presenca->envio == 0){
			$presenca->update(['presenca' => '1']);
		}
		return back();
	}
}
