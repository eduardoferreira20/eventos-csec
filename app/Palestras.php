<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Palestras;
use App\Oficinas;

class Palestras extends Model
{
	protected $table = 'palestra'; 
	protected $fillable = ['id','event_id','titulo','apresentacao','horas'];

	public function oficina(){
		return $this->hasMany('App\oficinas','user_id');
	}
    
}
