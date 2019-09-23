@extends('layouts.padrao')

@section('titulo-principal')
<div class="d-flex">
  <div class="d-flex flex-fill">
  Comprovantes
  </div>
</div>
@endsection
@section('conteudo-principal')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Evento</th>
      <th scope="col">Usuário</th>
      <th scope="col">Hora de envio</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($boletos as $boleto)
    <tr>
      <td>{{$boleto->user->name}}</td>
      <td>{{$boleto->user->email}}</td>
      <td>{{date('d-m-Y à H:m',strtotime($boleto->created_at))}}</td>
      <td>
      	<a href="{{route('pay.comprovante', $boleto->comprovante_path)}}"  class="btn btn-primary">
          Download
      	</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection