@extends('layouts.padrao')

@section('titulo-principal')
<div class="d-flex">
  <div class="d-flex flex-fill">
    Página do Administrador
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
                 <td><a class="btn btn-primary" href="{{route('download.qr',$user->id)}}">QR</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

@endsection