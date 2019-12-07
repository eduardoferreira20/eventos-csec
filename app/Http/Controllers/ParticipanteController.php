<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\Event;
use App\User;
use App\Inscricao;
use Carbon\Carbon;
use App\Palestras;
use App\Oficinas;
use DB;
use PDF;

class ParticipanteController extends Controller
{
    public function pdfexport($id,$user_id){
    	$status = true;
    	
        $evento=Event::find($id);
    	$user=Inscricao::where('user_id',$user_id)->first();
    	$palestra=Palestras::all();
    	$ofi = Oficinas::where('user_id',$user_id)->get();

    	$total = null;

        if($ofi->status = '1'){
    	foreach ($palestra as $palestra) {
    
    		$horas = (int)$palestra->horas;
    		$total += $horas;
    	}
    }

        $pdf=PDF::loadView('certificado.pdf', compact('user','evento','total'))->setPaper('A4','portrait');
    	$fileName= $user->user->name;
    	return $pdf->stream($fileName.'.pdf');
    }
}
