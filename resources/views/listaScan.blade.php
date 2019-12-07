@extends('layouts.padrao')

@section('titulo-principal')
<div class="d-flex">
  <div class="d-flex flex-fill">
    Lista Eventos
  </div>
  <div class="d-flex align-self-center">
    <a href="{{ route('events.index') }}" class="btn btn-primary">Voltar</a>
  </div>
</div>
@endsection
@section('conteudo-principal')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Evento</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	@foreach($geral as $geral)
    <tr>
      <td>{{$geral->title}}</td>
      <td>
      	<a href="{{route('listando.eventos', $geral->id)}}"  class="btn btn-primary">
          Selecionar
      	</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection