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
                 @foreach($palestras as $palestras)
            
                 <tr>
                 <td scope=""><a href=""><p style="margin-top: 3%; font-size:30px">{{$palestras->titulo}}aaaaaa</p></a></td>

                </tr>
                @endforeach
              </tbody>
            </table>

@endsection