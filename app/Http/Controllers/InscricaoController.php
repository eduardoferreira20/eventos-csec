<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Inscricao;
use App\User;
use App\Oficinas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Mail;
use App\Event;
use DB;
use Illuminate\Http\File;

class InscricaoController extends Controller
{
	public function inscricoes($id, Request $request){
		
		if($request['info'] == 'mostrar_edicao' || $request['info'] == 'mostrar_inscricao'){
			$evento = DB::table('events')
			->where('id', $id)
			->first();

			return view('inscricoes')
			->with('evento', $evento)
			->with('info', $request['info']);

		}elseif($request['info'] == 'add'){

			DB::table('events')
			->where('id', $id)
			->update(['inicio_inscricoes' => $request['inicio_inscricoes']]);

			DB::table('events')
			->where('id', $id)
			->update(['fim_inscricoes' => $request['fim_inscricoes']]);
			
			return Redirect::to(route('events.show', ['id' => $id]));

		}elseif($request['info'] == 'inscrever'){

			$nameFile = null;
			
			//pega o id do ususario logado
			$user = Auth::user()->id;


    		// Verifica se informou o arquivo e se é válido
			if($request->hasFile('comprovante') && $request->file('comprovante')->isValid()){

        		// Define o nome do arquivo como o id do usuario que envio o comprovante
				$name = Auth::user()->id;

        		// Recupera a extensão do arquivo
				$extension = $request->comprovante->extension();
				$n1 = "jpg";
				$n2 = "JPG";
				$n3 = "Jpg";
				
        		// Define finalmente o nome
				$nameFile = "{$name}.{$extension}";

        		// Faz o upload:
				$upload = $request->comprovante->storeAs('comprovantes', $nameFile);
        		// Se tiver funcionado o arquivo foi armazenado em storage/app/public/comporvantes/nomedinamicoarquivo.extensao
        		// Verifica se NÃO deu certo o upload (Redireciona de volta)
				if (!$upload || !$request->hasFile('comprovante') )
					return redirect()
				->back()
				->with('error', 'Falha ao fazer upload')
				->withInput();
			}

			//pega o id do ususario logado
			$user = Auth::user()->id;
			$pathFile = storage_path('app/public/comprovantes/'.$nameFile);

			$eventos = Event::where('id',$id)->first();

		$to_name =Auth::user()->name;
		$user_name =Auth::user()->name;
		$email = Auth::user()->email;
		$event = $eventos->title;
		$to_email = "dex@poli.br";

		
		$data = array('email'=>$to_email,'name'=>$event ,'email_pessoa'=>$email,'title'=>$user_name,"body" => "Certificado do evento");

		Mail::send('comprovante',$data, function($message) use ($to_name, $to_email,$event,$pathFile,$email) {
			$message->to($to_email, $to_name)
			->subject($event)->attach($pathFile);
			$message->from(Auth::user()->email,Auth::user()->name);
		});
		Inscricao::create([
				'user_id' => $user,
				'event_id' => $id,
				'status'=> false,
				'comprovante_path' => $nameFile,
				'presenca' => false,
				'envio' => false,
			]);


			return Redirect::to(route('events.show', ['id' => $id]));

		}elseif($request['info'] == 'inscricao_palestra'){

			$user = Auth::user()->id;

			Oficinas::create([
				'user_id' => $user,
				'event_id' => $id,
				'status' => false,
			]);
			return Redirect::to(route('events.show', ['id' => $id]));

		
	}elseif($request['info'] == 'inscricao_docente'){

			$user = Auth::user()->id;

			Inscricao::create([
				'user_id' => $user,
				'event_id' => $id,
				'status'=> false,
				'comprovante_path' => "Docente.pdf",
				'presenca' => false,
				'envio' => false,
			]);
			return Redirect::to(route('events.show', ['id' => $id]));

		}
	}

	public function pagamento(){
		$pagar = DB::table('events')->get();
		return view('pagamento',compact('pagar'));
	}

	public function lista($id){

		$boletos = Inscricao::where('event_id',$id)->get();
		return view('lista')->with('boletos',$boletos);
	}

	public function baixando($namefile){

		$pathFile = storage_path('app/public/comprovantes/'.$namefile);

		return response()->download($pathFile,$namefile);		
	}
	
	public function deletar(){
		foreach ($this->id as $inscri){
			$inscri->delete();
		}
		return true;
	}

	public function teste(){
		return view('layouts.padrao');
	}
}