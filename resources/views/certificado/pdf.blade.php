<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$user->user->name}}</title>

    
    <style type="text/css">

  body{
    font-family: 'Montserrat';
    font-size: 21px;
    background: url("/Certificado1.jpg");
    background-repeat: no-repeat;
    transform: rotate(270deg);
    transform-origin:47% 53%;  
    height: 102%;
    width: 1110px;
    position: fixed;
    background-position: 70% 3%;
    background-size: 111800px !important;
    z-index: -100000000000;
  }

  .table{
    padding-top: 4%;
    padding-left: 47%;
    width: 49%;
  }
  .table1{
    padding-top: 0.2%;
    padding-left: 47%;
    width: 49%;
  }

  .data{
    padding-top: 24.5%;
    padding-left: 73%;
  }

  p { 
    line-height: 150%; 
    text-align: justify;
  }

</style>
  </head>
  <body>

    <div class="conteiner">
      <div class="r">
        <div class="col-md-12">
          <div class="data"> 
            @if(date('F', strtotime($user->evento->start_date)) == 'January' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Janeiro de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'February' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Fevereiro de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'March')
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Março de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'April' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Abril de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'May' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Abril de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
           @elseif(date('F', strtotime($user->evento->start_date)) == 'June' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Junho de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'July' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Julho de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'August' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Agosto de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'September' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Setembro de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'October' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Outubro de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'November' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Novembro de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @elseif(date('F', strtotime($user->evento->start_date)) == 'December' )
            <p>{!!$user->evento->cidade!!}, {{ date('d', strtotime($user->evento->start_date)) }} de Dezembro de {{ date('Y', strtotime($user->evento->start_date)) }}</p>
            @endif
          </div>
          <!-- <div class="table">
            <p>Certificamos que <strong>Mônica Crystine da Silva Bezerra</strong>, portador do documento <strong>120.036.784-76
            </strong>, participou com êxito do evento <strong>As alterações nas NRs e novas perspectivas</strong> realizado na <strong>POLI</strong> na cidade de <strong>Recife</strong>, contabilizando carga horária total de <strong>4</strong> horas.</p>
          </div> -->
          <!-- <div class="table1">
              <p>Confere o presente certificado a <strong>Prof.ª Dr.ª Eliane Maria Gorga Lago</strong>, pela organização da <strong>X Jornada de Segurança do Trabalho</strong>, evento integrante do <strong>Ingenia - Semana Universitária</strong> da <strong>POLI</strong> realizado no dia<strong> 01 de Outubro de 2019</strong>, no auditório da <strong>Escola Politécnica de Pernambuco.</p>
          </div> -->
         <!--  <div class="table1">
              <p>Certificamos para os devidos fins que o trabalho intitulado <strong>Avaliação de solicitações de assistência técnica de um empreendimento residencial Minha Casa, Minha Vida para melhoria da qualidade do serviço</strong>, de autoria de <strong>Maria de Lara Peixoto da Silva</strong>, foi apresentado na <strong>INGENIA, Semana Universitária</strong> da <strong>Universidade de Pernambuco</strong> realizado no dia<strong> 03 de Outubro de 2019</strong>, na <strong>Escola Politécnica de Pernambuco - MOSTRA POLI/UPE 2019. {{$total}}</p>
          </div> -->
          <!-- <div class="table1">
              <p>Certificamos para os devidos fins que <strong>Bruno de Holanda Cavalcanti Filho</strong>, participou do <strong>INGENIA, Semana Universitária</strong> da <strong>Universidade de Pernambuco</strong> realizado no dia<strong> 03 de Outubro de 2019</strong>, na <strong>Escola Politécnica de Pernambuco - POLI/UPE 2019.</p>
          </div> -->
         <!--  <div class="table1">
              <p>Confere o presente certificado a <strong>Lidiane de Souza Monteiro</strong>, portador do documento <strong>077.462.984-35</strong>, participou do evento <strong>Semana de Engenharia da Computação/Semana Universitária</strong> realizada na <strong>POLI</strong> onde ministrou a palestra: <strong> Não deixe a tecnologia atrapalhar a fase da sua carreira </strong>, contabilizando carga horária total de <strong> 1 hora </strong>.</p>
          </div> -->
          <div class="table1">
              <p>Certificamos para os devidos fins que <strong>Rejane Bizerra da Silva Azidio</strong>, participou do <strong>Comitê Avaliador </strong>avaliando os trabalhos submetidos e apresentados na <strong>Mostra de Extensão, Inovação e Pesquisa,</strong> evento integrante do<strong> INGENIA, Semana Universitária</strong> da <strong>Universidade de Pernambuco na Escola Politécnica de Pernambuco - MOSTRA POLI/UPE 2019.</p>
          </div>
          <!-- <div class="table1">
              <p>Certificamos para os devidos fins que <strong>Prof.ª Dr.ª Bianca M. Vasconcelos</strong>, participou da <strong>Comitê Avaliador</strong> do <strong>Mostra de Extensão, Inovação e Pesquisa,</strong> evento integrante do<strong> INGENIA, Semana Universitária</strong> da <strong>Universidade de Pernambuco na Escola Politécnica de Pernambuco - MOSTRA POLI/UPE 2019.</p>
          </div> -->
          <!-- <div class="table1">
              <p>Certificamos para os devidos fins que <strong>Prof. Dr.ª Jurany Freitas Melro Travassos</strong>, participou da <strong>Comissão Científica</strong> avaliando os trabalhos submetidos e apresentados na <strong>Mostra de Extensão, Inovação e Pesquisa,</strong> evento integrante do<strong> INGENIA, Semana Universitária</strong> da <strong>Universidade de Pernambuco na Escola Politécnica de Pernambuco - MOSTRA POLI/UPE 2019.</p>
          </div> -->
        </div>
      </div>
     </div> 
  </body>
</html>