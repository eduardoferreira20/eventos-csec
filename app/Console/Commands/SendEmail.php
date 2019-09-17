<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Inscricao;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia e-mails para usuarios inscritos em eventos para confirmar a sua inscrição';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = Inscricao::all();
        foreach ($user as $user) {

        $to_name = $user->user->name;
        $to_email = $user->user->email;

        $evento_id = $user->evento->id;
        $user_id = $user->user->id;
        $evento_name = $user->evento->title;
        $user_name = $user->user->name;
        $evento_data = $user->evento->start_date;
        $id = $user->id;

        $data = array('name'=>$user_name, 'title'=>$evento_name,'id'=>$id,'user_id'=>$user_id,'evento_id'=>$evento_id,'data'=>$evento_data,'email'=>$to_email,"body" => "Confirmação inscrição evento");
        
        Mail::send('confirmaEmail',$data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject("Confirmação inscrição evento");
            $message->from('dex@poli.br','CSEC');
        });
    }
        $this->info('E-mail enviados com sucesso');
    }
}
