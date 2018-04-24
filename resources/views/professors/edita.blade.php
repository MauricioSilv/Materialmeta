@extends('materialhome')

 @section('content-header')
    <section class="content-header">
      <h1>
        <i class="fa fa-edit"></i> Editar Professor
        <small>{{$professor->nome}}</small>
      </h1>
    </section>
@endsection
@section('conteudo')
@if(count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif

    <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Editar Professor
            </div>
                        <div class="panel-body">
                            <form action="{{ route('professors.update',$professor->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('nome')) has-error @endif">
                                    <label for="nome-field">Nome:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nome-field" name="nome" class="form-control" value="{{ is_null(old("nome")) ? $professor->nome : old("nome") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("nome"))
                                        <span class="help-block">{{ $errors->first("nome") }}</span>
                                    @endif
                                </div>
                    
                                <div class="form-group @if($errors->has('sexo')) has-error @endif">
                                    <label for="nome-field">Sexo:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="sexo" name="sexo">
                                                <option value="{{ is_null(old("sexo")) ? $professor->sexo : old("sexo") }}">-- Selecione --</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if($errors->has("sexo"))
                                        <span class="help-block">{{ $errors->first("sexo") }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label for="nome-field">Email:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email" name="email" class="form-control" value="{{ is_null(old("email")) ? $professor->email : old("email") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("email"))
                                        <span class="help-block">{{ $errors->first("email") }}</span>
                                    @endif
                                </div>


                                <div class="form-group @if($errors->has('endereco')) has-error @endif">
                                    <label for="nome-field">Endereco:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="endereco-field" name="endereco" class="form-control" value="{{ is_null(old("endereco")) ? $professor->endereco : old("endereco") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("idade"))
                                        <span class="help-block">{{ $errors->first("endereco") }}</span>
                                    @endif
                                </div>
                                <div class="form-group @if($errors->has('contato')) has-error @endif">
                                    <label for="nome-field">Telefone:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="telefone-field" name="contato" class="form-control" value="{{ is_null(old("contato")) ? $professor->contato : old("contato") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("contato"))
                                        <span class="help-block">{{ $errors->first("contato") }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle fa-lg"></i> Salvar</button>
                                <a class="btn btn-default pull-right" href="{{ route('professors.index') }}"><i class="fas fa-reply"></i> Voltar para a lista</a>
                            </form>
                        </div>
                    </div>
@stop