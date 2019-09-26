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
                    <th scope="">id</th>
                    <th scope="">Nome</th>
                    <th scope="">E-mail</th>
                  </tr>
                </thead>
                <tbody> 
                 @foreach($user as $user)
            
                 <tr>
                 <td scope="">{{$user->id}}</td>
                 <td scope="">{{$user->nome}}</td>
                 <td scope="">{{$user->email}}</td>
                 <td><a href="{{route('admin.editar',$user->id)}}" class="breadcrumb">Editar</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

@endsection