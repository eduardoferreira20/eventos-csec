@extends('layouts.padrao')

@section('titulo-principal')
<div class="d-flex">
  <div class="d-flex flex-fill">
    Página do Administrador
  </div>
  <div class="d-flex align-self-center">
    <a href="{{ route('events.index') }}" class="btn btn-primary">Voltar</a>
  </div>
</div>
@endsection
@section('conteudo-principal')
<table  class="table">
                <thead>
                  <tr>
                    <th scope=""></th>
                  </tr>
                </thead>
                <tbody> 
                 @foreach($evento as $evento)
            
                 <tr>
                 <td scope=""><a href="{{route('admin.palestras',$evento->id)}}"><p style="margin-top: 3%; font-size:15px">{{$evento->title}}</p></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

@endsection