<?php

use Illuminate\Http\Request;
use App\Oficinas;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('scanQR/dados',function(Request $re){
	
		session(['data' =>$r->content]);
		$ins = new Inscricao();
		$ins->user_id = $r->content;
		$ins->event_id = '7';
		$ins->status = true;

});
