<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
	// protected $table = 'oficinas'; 
    protected $fillable = ['id','user_id','event_id','status'];
}
