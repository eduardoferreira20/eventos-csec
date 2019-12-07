<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Palestras;
use App\Oficinas;

class Oficinas extends Model
{
	protected $table = 'oficinas'; 
    protected $fillable = ['id','user_id','event_id','palestra_id','status'];

    public function palestra(){
		return $this->hasMany('App\Palestras','user_id');
	}
}
