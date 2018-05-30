@extends('materialhome')
@section('content-header')
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Materiais
        <small>Gerenciamento</small>
      </h1>
    </section>
@endsection
@section('conteudo')
@if(Auth::user()->perfil !== 'professor')
   <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{count($users) }}</h3>

              <p>Professores Registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a> --}}
          </div>
        </div>
    <!--    ------>
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{ count($materiais) }}<sup style="font-size: 20px"></sup></h3>

              <p>Materiais Registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-archive"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a> --}}
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ count($emprestimos) }}<sup style="font-size: 20px"></sup></h3>

              <p>Emprestimos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a> --}}
          </div>
        </div>
       @else
        
          <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{  count($agendamentouser)}}</h3>

              <p>Total de <br/> Emprestimos</p>
            </div>
            <div class="icon">
              <i class="far fa-thumbs-up"></i>
            </div>
          </div>
        </div>
          <!-- /.info-box -->
          <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ count($reservado) }}</h3>

              <p>Agendamentos<br/> Ativo</p>
            </div>
            <div class="icon">
              <i class="fas fa-clock"></i>
            </div>
          </div>
        </div>

       @endif

      @endsection