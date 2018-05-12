@extends('materialhome')

 @section('content-header')
    <section class="content-header">
      <h1>
        <i class="fa fa-edit"></i> Editar Professor
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
                            <form action="{{ route('professors.update',$user->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('name')) has-error @endif">
                                    <label for="nome-field">Nome</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nome-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $user->name : old("name") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("nome"))
                                        <span class="help-block">{{ $errors->first("name") }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                    <label for="nome-field">Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email" name="email" class="form-control" value="{{ is_null(old("email")) ? $user->email : old("email") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("email"))
                                        <span class="help-block">{{ $errors->first("email") }}</span>
                                    @endif
                                </div>


                                <div class="form-group @if($errors->has('password')) has-error @endif">
                                    <label for="nome-field">Senha</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" minlength="4" id="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    @if($errors->has("password"))
                                        <span class="help-block">{{ $errors->first("password") }}</span>
                                    @endif
                                </div>
                               {{--  <div class="form-group @if($errors->has('contato')) has-error @endif">
                                    <label for="nome-field">Telefone:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="telefone-field" name="contato" class="form-control" value="{{ is_null(old("contato")) ? $professor->contato : old("contato") }}"/>
                                        </div>
                                    </div>
                                    @if($errors->has("contato"))
                                        <span class="help-block">{{ $errors->first("contato") }}</span>
                                    @endif
                                </div> --}}
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Salvar</button>
                                <a class="btn btn-default pull-right" href="{{ route('professors.index') }}"><i class="fas fa-reply"></i> Voltar para a lista</a>
                            </form>
                        </div>
                    </div>
@stop