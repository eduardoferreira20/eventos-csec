@extends('layouts.padrao')

@section('titulo-principal')
<div class="d-flex">
  <div class="d-flex flex-fill">
    {{ $data['title'] }}
  </div>
  <div class="d-flex align-self-center">
    <a href="{{ route('events.index') }}" class="btn btn-primary">Voltar</a>
  </div>
</div>
@endsection
@section('conteudo-principal')
<div class="d-flex mb-4">
  <div class="d-flex flex-column mr-auto">
    <h4>
      Coordenador:
      <a class="btn btn-link" href="{{ route('user.index', ['id' => $info->id]) }}">
        {{ $info->name }}
      </a>
    </h4>
    <h6>Período:
      {{$data['start_date']}}  às  {{$data['start_time']}}
      até {{$data['end_date']}} às {{$data['end_time']}}
    </h6>
    @if($data['link'] != null)
    <h6>Para mais informações:<a target="_blank" href="{{$data['link']}}">  {{$data['link']}}</a></h6>
    @else
    <!-- não aparece nada -->
    @endif
    @auth('admin-web')
    <div class="d-flex mt-4">
      {!! Form::open(array('route' => ['events.edit', $data['id']],'method'=>'POST')) !!}
      {!! Form::hidden('info', 'general') !!}
      {!! Form::submit('Editar informações', ['class'=>'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
    <div class="d-flex align-self">
    <a href="{{ route('lista.qr',$data['id']) }}" class="btn btn-primary" target="_blank">Download QRCode</a>
  </div>
  <img src="data:image/jpeg;base64,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">
    @endauth
  </div> 
</div>
<div class="d-flex flex-column mb-4">
  <div class="d-flex flex-column mb-3">
    <h2>Informações:</h2>
  </div>
  <div class="d-flex flex-column">
    <ul class="nav nav-tabs ml-0 mb-0">
      <li class=""><a data-toggle="tab" href="#descricao">Descrição</a></li>
      <li class=""><a data-toggle="tab" href="#programacao">Programação</a></li>
      <li class="active"><a data-toggle="tab" href="#folder">Folder</a></li>
    </ul>
    <div class="tab-content">
      <div id="descricao" class="tab-pane fade">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-3 flex-column">
              @if($data['apresentation'] != null)
              {!! $data['apresentation'] !!}
              @else
              <div class="text-muted">
                Nada para informar.
              </div>
              @endif
            </div>
            @auth('admin-web')
            <div class="d-flex">
              {!! Form::open(array('route' => ['events.edit', $data['id']],'method'=>'POST')) !!}
              {!! Form::hidden('info', 'apresentation') !!}
              {!! Form::submit('Editar campo', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            </div>
            @endauth
          </div>
        </div>
      </div>
      <div id="programacao" class="tab-pane fade">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-3 flex-column">
              @if($data['programacao'] != null)
              {!! $data['programacao'] !!}
              @else
              <div class="text-muted">
                Nada para informar.
              </div>
              @endif
            </div>
            @auth('admin-web')
            <div class="d-flex">
              {!! Form::open(array('route' => ['events.edit', $data['id']],'method'=>'POST')) !!}
              {!! Form::hidden('info', 'programacao') !!}
              {!! Form::submit('Editar campo', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            </div>
            @endauth
          </div>
        </div>
      </div>
      <div id="folder" class="tab-pane fade in active">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-3 flex-column">
              @if($data['folder'] != null)
              {!! $data['folder'] !!}
              @else
              <div class="text-muted">
                Nada para informar.
              </div>
              @endif
            </div>
            @auth('admin-web')
            <div class="d-flex">
              {!! Form::open(array('route' => ['events.edit', $data['id']],'method'=>'POST')) !!}
              {!! Form::hidden('info', 'folder') !!}
              {!! Form::submit('Editar campo', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            </div>
            @endauth
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>
<div class="d-flex flex-column">
    <div class="d-flex mr-auto mb-3">
      <h2>Palestras:</h2>
    </div>
    <div id="accordion d-flex text-justify">
      <div class="card">
        @foreach ($palestra as $palestra)
          <div class="card-header d-flex" id="heading{{$palestra->id}}">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$palestra->id}}" aria-expanded="false" aria-controls="collapse{{$palestra->id}}">
              {{$palestra->titulo}}
            </button>
            @auth('admin-web')
            <div class="d-flex">
              {!! Form::open(array('route' => ['events.edit', $data['id']],'method'=>'POST')) !!}
              {!! Form::hidden('info', 'palestras') !!}
              {!! Form::hidden('old', $palestra->id) !!}
              {!! Form::submit('Editar campo', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            </div>
            @endauth
          </div>
          <div id="collapse{{$palestra->id}}" class="collapse" aria-labelledby="heading{{$palestra->id}}" data-parent="#accordion">
            <div class="card-body">
              @if($palestra->apresentacao != null)
                {!! $palestra->apresentacao !!}

                {!! Form::open(array('route' => ['events.inscricoes', $data['id']],'method'=>'POST')) !!}
                {!! Form::hidden('info', 'inscricao_palestra') !!}
                {!! Form::submit('Inscreva-se', ['class'=>'btn btn-link']) !!}
                {!! Form::close() !!}

            @foreach($inscri as $ins)
              

                @auth('user-web')
               
              @if(Auth::user()->id == $ins->user_id)

              <div class="alert alert-success" role="alert">                
               <p>Inscrito com sucesso!</p>
                </div>   

                @endif

                @endauth

              @endforeach
              @endif
              
              @guest
                Ainda não é cadastrado? <a class="btn btn-link" href="{{ route('register') }}">Clique aqui </a>e cadastre-se!
                @endguest 
            </div>
          </div>
        @endforeach
        @auth('admin-web')
        <div class="card-header">
          {!! Form::open(array('route' => ['events.edit', $data['id']],'method'=>'POST')) !!}
          {!! Form::hidden('info', 'add_palestra') !!}
          {!! Form::submit('+ Adicionar palestra', ['class'=>'btn btn-link']) !!}
          {!! Form::close() !!}
        </div>
        @endauth
      </div>
    </div>
  </div>
<div class="d-flex flex-column" id="palestras">
  <div class="d-flex mr-auto mb-3">
    <h2>
      Inscrição evento:
    </h2>
  </div>
  
  <div class="tab-content">
    <div id="inscricao" class="tab-pane fade in active">
      <div class="card">
        <div class="card-body">
          @auth('user-web')
          @if(Auth::user()->tipo == '2' )
          {!! Form::open(array('route' => ['events.inscricoes', $data['id']],'method'=>'POST')) !!}
                {!! Form::hidden('info', 'inscricao_docente') !!}
                {!! Form::submit('Inscrição Docente', ['class'=>'btn btn-link']) !!}
                {!! Form::close() !!}
          @endif
          @endauth
          @auth('admin-web')
          @if($data['inicio_inscricoes'] == null)
          Datas não definidas!
          <br>
          <br>
          {!! Form::open(array('route' => ['events.inscricoes', $data['id']],'method'=>'POST')) !!}
          {!! Form::hidden('info', 'mostrar_edicao') !!}
          {!! Form::submit('Definir datas', ['class'=>'btn btn-danger']) !!}
          {!! Form::close() !!}
          @elseif($data['inicio_inscricoes']  != null)
          Deseja mudar as datas?
          {!! Form::open(array('route' => ['events.inscricoes', $data['id']],'method'=>'POST')) !!}
          {!! Form::hidden('info', 'mostrar_edicao') !!}
          {!! Form::submit('Redefinir datas', ['class'=>'btn btn-danger']) !!}
          {!! Form::close() !!}
          @endauth
          @else
          @auth('user-web')
          @if(Auth::user()->tipo == null || Auth::user()->tipo == '1')
          {!! Form::open(array('route' => ['events.escolha', $data['id']],'method'=>'GET')) !!}
          {!! Form::submit('Inscrever-se', ['class'=>'btn btn-primary']) !!}
          {!! Form::close() !!}
          @endif
          @endauth
          @guest
          Ainda não é cadastrado? <a class="btn btn-link" href="{{ route('register') }}">Clique aqui </a>e cadastre-se!
          @endguest
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@auth('admin-web')
<div class="d-flex flex-column" id="credenciamento">
  <div class="d-flex mr-auto mb-3">
    <h2>
      Credenciamento:
    </h2>
  </div>
  <div class="d-flex flex-column text-justify">
    <ul class="nav nav-tabs ml-0 mb-0">
      <li class="active">
        <a data-toggle="tab" href="#confirmacao">Confirmação da Inscrição</a>
      </li>
      <li class="present">
        <a data-toggle="tab" href="#ata">Ata de presença</a>
      </li>
    </ul>
    <div class="tab-content">
      <div id="confirmacao" class="tab-pane fade in active">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-5 flex-column">

              <table  class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Status inscrições</th>
                    @auth('admin-web')
                    <th scope="col">Ação</th>
                    @endauth
                  </tr>
                </thead>
                <tbody> 
                 @foreach ($inscricaos as $inscricaos)
                 <tr>
                  <td scope="row">{{$inscricaos->user->name}}</td>
                  <td>{{$inscricaos->user->email}}</td>
                  @if($inscricaos->status == 0)
                  <td>Aguardando confirmação...</td>
                  @else
                  <td>Inscrição confirmada!</td>
                  @endif
                  @auth('admin-web')
                  <td>
                    @if($inscricaos->status == 0)
                    <a class="btn btn-success" href="javascript:(confirm('Confirmar status da inscrição de {{$inscricaos->user->name}}?') ? window.location.href='{{route('events.aprovar', $inscricaos->id)}}' : false)">Status</a>
                    @else
                    <a class="btn btn-warning" href="javascript:(confirm('Mudar status da inscrição de {{$inscricaos->user->name}}?') ? window.location.href='{{route('events.aprovar', $inscricaos->id)}}' : false)">Status</a>
                    @endif
                    <a class="btn btn-danger" href="javascript:(confirm('Deletar essa inscrição?') ? window.location.href='{{route('events.deletarIns', $inscricaos->id)}}' : false)">Deletar</a>
                  </td>
                  @endauth
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="ata" class="tab-pane fade">
      <div class="card">
        <div class="card-body">
          <div class="d-flex mb-5 flex-column">

            <table  class="table">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Status presença</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody> 
               @foreach ($presenca as $presenca)
               <tr>
                @if($presenca->status == 1)
                <td scope="row">{{$presenca->user->name}}</td>
                @if($presenca->presenca == 0)
                <td>Faltou</td>
                @else
                <td>Presente</td>
                @endif
                @auth('admin-web')
                <td>
                  <a class="btn btn-success" href="{{route('events.presenca', $presenca->id)}}">Status</a>
                </td>
                @endauth
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endauth
@auth('admin-web')
<div class="d-flex flex-column" id="credenciamento">
  <div class="d-flex mr-auto mb-3">
    <h2>
      Certificados:
    </h2>
  </div>
  <div class="d-flex flex-column text-justify" id="tabela">
    <div class="tab-content">
      <div id="confirmacao" class="tab-pane fade in active">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-5 flex-column">

              <table  class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody> 
                  <tr   >
                    <td>
                     @foreach($certificado as $certificado)
                     @if($certificado->presenca == 1)
                     <tr>
                      <td class="nome">{{$certificado->user->name}}</td>
                      <td class="nome">{{$certificado->user->email}}</td>
                      @if($certificado->envio == 0)
                      <td class="nome" id="nome"><strong>Não enviado</strong></td>
                      @else
                      <td class="nome" id="nome"><strong>Enviado</strong></td>
                      @endif
                      <td>
                        <a target="_blank" href="{{(url('/certificado/download/'.$certificado->evento->id.'/usuario/'.$certificado->user->id) )}}" class="btn btn-success" >Abrir</a>
                        <a href="{{url('/send/certificado/'.$certificado->evento->id.'/evento/'.$certificado->user->id).'/presenca'}}" class="btn btn-info">Enviar</a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endauth

<!-- <div class="d-flex flex-column" id="relatorio">
  <div class="d-flex mr-auto mb-3">
    <h2>
      Relatório final:
    </h2>
  </div>
  <div class="d-flex flex-column text-justify">
    <div class="card">
      @auth('admin-web')
      <div class="card-body">
        {!! Form::submit('Enviar fotos', ['class'=>'btn btn-danger']) !!}
        {!! Form::submit('Preencher relatório', ['class'=>'btn btn-danger']) !!}
      </div>
      @endauth
    </div>
  </div>
</div> -->
<script type="text/javascript">
  var tempo = window.setInterval(carrega, 1000);
  function carrega()
  {
    $('#tabela').load("showevent.blade.php");
  }
</script>
<!-- Pagina organizador evento -->

@endsection

