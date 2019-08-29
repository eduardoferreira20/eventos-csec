@extends('layouts.padrao')

@section('titulo-principal')
Escolha uma forma de pagamento
@endsection
@section('conteudo-principal')
<br>
<br>
<div class="row justify-content-between">
	<div class="col-4">
		Transferência
		<br>
		<br>
		{!! Form::open(array('route' => ['events.inscricoes',$evento->id],'method'=>'POST')) !!}
		{!! Form::hidden('info', 'mostrar_inscricao') !!}
		{!! Form::submit('Tranferência', ['class'=>'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-4">
		  Boleto
		<br>
		<br>
		{!! Form::open(array('route' => ['events.inscricoes', $data['id']],'method'=>'GET')) !!}
		{!! Form::hidden('info', 'mostrar_inscricao') !!}
		{!! Form::submit('Boleto', ['class'=>'btn btn-info']) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection