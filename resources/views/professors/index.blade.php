@extends('materialhome')
@section('content-header')
    <section class="content-header">
        @if(Session::has('mensagem'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('mensagem') }}
             
    </div>
     @endif
      <h1>
        <i class="fa fa-users"></i> Professores
        <small>Gerenciamento dos professores</small>
        <a href="{{ route('professors.create') }}" class="btn pull-right btn-success">
            <i class="fa fa-plus-circle"></i> Criar novo Professor
        </a>
      </h1>
    </section>
@endsection
@section('conteudo')
	
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Lista de Professores
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                        @if(count($users))
                                    <thead>
                                    <tr>
                                        <th width="1%">Cód</th>
                                        <th width="25%">Nome</th>
                                        <th width="15%">Data de Criação</th>
                                        <th>Ações</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{date('d/m/Y', strtotime($user->created_at))}}</td>
                                            <td>
                                                <a href="{{ route('professors.edit', $user->id) }}" title="Editar"><button class="btn btn-default"><i class="fa fa-edit"></i> Editar</button></a>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $user->id }}"><i class="fas fa-question"></i> Informações</button>
                                                <form action="{{ route('professors.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue">
                                                        <h1 id="ModalLabel">{{$user->name}}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-6">
                                                            <label>Perfil</label>
                                                            <p>{{$user->perfil}}</p>
                                                            <label>Email</label>
                                                            <p>{{$user->email}}</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Data de Cadastro</label>
                                                            <p>{{date('d/m/Y', strtotime($user->created_at))}}</p>
                                                            <label>Ultima atualização</label>
                                                            <p>{{date('d/m/Y', strtotime($user->updated_at))}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-reply"></i>

FECHAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    </tbody>
                               @else      
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Opa!</strong> Nenhum Professor Cadastrado.
                            </div>
                        @endif
                                </table>
                        </div>
                    
                    </div>
        
@endsection