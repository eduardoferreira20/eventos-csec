<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Palestras;
use App\Oficinas;

class Palestras extends Model
{
	protected $fillable = ['id','event_id','titulo','inicio_inscricoes','fim_inscricoes','apresentacao','horas'];

	public function oficina(){
		return $this->hasMany('App\oficinas','user_id');
	}
    
}
