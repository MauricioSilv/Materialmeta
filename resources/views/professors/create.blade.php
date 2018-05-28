@extends('materialhome')
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
            <i class="fa fa-plus"></i> Cadastro de Professor
        </div>
        <div class="panel-body">
                                    <form action="{{ route('professors.store') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-sm-6">
                                        <div class="form-group @if($errors->has('name')) has-error @endif">
                                            <label for="nome-field">Nome:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" placeholder="nome completo..." id="nome-field" name="name" class="form-control" value="{{ old("name") }}"/>
                                                </div>
                                            </div>
                                            @if($errors->has("name"))
                                                <span class="help-block">{{ $errors->first("name") }}</span>
                                            @endif
                                        </div>
                                        </div>
                                        <!---->
                                         {{-- <div class="col-sm-6">
                                        <div class="form-group @if($errors->has('contato')) has-error @endif">
                                            <label for="nome-field">Telefone:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="tel" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="phone" name="contato" class="form-control" maxlength="15" placeholder="(00) 0000-0000" class="form-control" value="{{ old("contato") }}" required/>
                                                </div>
                                            </div>
                                            @if($errors->has("contato"))
                                                <span class="help-block">{{ $errors->first("contato") }}</span>
                                            @endif
                                        </div>
                                            </div> --}}
                                            <!---->
                                            <div class="col-sm-6">
                                         <div class="form-group @if($errors->has('email')) has-error @endif">
                                         	<label for="nome-field">
                                         		Email:
                                         	</label>
                                         	<div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" placeholder="exemplo@gmail.com" id="email" name="email" class="form-control" value="{{ old("email") }}"/>
                                                </div>
                                            </div>
                                           </div>
                                       </div>
                                         
                                            <!---->
                                          {{--   <div class="col-sm-12">
                                        <div class="form-group @if($errors->has('endereco')) has-error @endif">
                                            <label for="nome-field">Endereço:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="endereco-field" name="endereco" class="form-control" value="{{ old("endereco") }}"/>
                                                </div>
                                            </div>
                                            @if($errors->has("endereco"))
                                                <span class="help-block">{{ $errors->first("endereco") }}</span>
                                            @endif
                                        </div>
                                            </div> --}}
                                        <div class="col-sm-12">
                                         <div class="form-group @if($errors->has('password')) has-error @endif">
                                         	<label for="password">
                                         		Senha:
                                         	</label>
                                         	<div class="form-group">
                                                <div class="form-line">
                                                    <input id="password" minlength="3" type="password" class="form-control" name="password" required />
                                                </div>
                                            </div>
                                           </div>
                                          </div>
                                        <br>
                                        <button type="submit" style="margin-bottom: 4px;" class="btn btn-block-mobile btn-success"><i class="fa fa-plus-circle fa-lg"></i> Salvar</button>
                                        <a class="btn btn-block-mobile btn-default pull-right" href="{{ route('professors.index') }}">
                                            <i class="fas fa-reply"></i>Voltar para a lista</a>
                                    </form>
                                </div>
                            </div>
                        
@stop
