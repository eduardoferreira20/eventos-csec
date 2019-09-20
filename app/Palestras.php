<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Palestras;

class Palestras extends Model
{
	protected $fillable = ['id','event_id','titulo','palestrante','start_date', 'end_date','inicio_inscricoes','fim_inscricoes','local','apresentacao','presenca'];
    
}
