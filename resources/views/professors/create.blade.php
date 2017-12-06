@extends('materialhome')
@section('conteudo')

	<div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-plus"></i> Cadastro de Professor
        </div>
        <div class="panel-body">
                                    <form action="{{ route('professors.store') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-sm-6">
                                        <div class="form-group @if($errors->has('nome')) has-error @endif">
                                            <label for="nome-field">Nome:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="nome-field" name="nome" class="form-control" value="{{ old("nome") }}"/>
                                                </div>
                                            </div>
                                            @if($errors->has("nome"))
                                                <span class="help-block">{{ $errors->first("nome") }}</span>
                                            @endif
                                        </div>
                                        </div>
                                        <!---->
                                        <div class="col-sm-6">
                                        <div class="form-group @if($errors->has('sexo')) has-error @endif">
                                            <label for="nome-field">Sexo:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" id="sexo-field" name="sexo">
                                                        <option value="{{ old("sexo") }}">-- Please select --</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @if($errors->has("sexo"))
                                                <span class="help-block">{{ $errors->first("sexo") }}</span>
                                            @endif
                                        </div>
                                        </div>
                                        <!---->
                                         <div class="col-sm-6">
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
                                            </div>
                                            <!---->
                                            <div class="col-sm-6">
                                         <div class="form-group @if($errors->has('email')) has-error @endif">
                                         	<label for="nome-field">
                                         		Email:
                                         	</label>
                                         	<div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="email" name="email" class="form-control" value="{{ old("email") }}"/>
                                                </div>
                                            </div>
                                           </div>
                                       </div>
                                         
                                            <!---->
                                            <div class="col-sm-12">
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
                                            </div>
                                        <div class="col-sm-12">
                                         <div class="form-group @if($errors->has('senha')) has-error @endif">
                                         	<label for="nome-field">
                                         		Senha:
                                         	</label>
                                         	<div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="password" name="senha" class="form-control" value="{{ old("senha") }}"/>
                                                </div>
                                            </div>
                                           </div>
                                          </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle fa-lg"></i> Criar</button>
                                        <a class="btn btn-default pull-right" href="{{ route('professors.index') }}">
                                            <i class="fa fa-arrow-left">Voltar para a lista</i></a>
                                    </form>
                                </div>
                            </div>
                        
@stop
