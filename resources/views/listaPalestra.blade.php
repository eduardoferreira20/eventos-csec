@extends('layouts.padrao')

@section('titulo-principal')
<div class="d-flex">
  <div class="d-flex flex-fill">
    Lista Palestras
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
  	@foreach($palestra as $palestra)
    <tr>
      <td>{{$palestra->titulo}}</td>
      <td>
      	<a href="{{url('scan/'.$id.'/eventos/'.$palestra->id)}}"  class="btn btn-primary">
          Selecionar
      	</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection