@extends('layouts.padrao')

@section('titulo-principal')
Escolha uma forma de pagamento
@endsection
@section('conteudo-principal')
<br>
<br>
<div class="row justify-content-between">
	<div class="col-4">
		{!! Form::open(array('route' => ['events.inscricoes',$evento->id],'method'=>'POST')) !!}
		{!! Form::hidden('info', 'mostrar_inscricao') !!}
		{!! Form::submit('Transferência', ['class'=>'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
</div>
<br>
<br>
<br>
@endsection