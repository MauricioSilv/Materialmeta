@extends('materialhome')
@section('content-header')
    <section class="content-header">
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
                            @if($professors->count())
                                    <thead>
                                    <tr>
                                        <th>NOME</th>
                                        <th>DATA DE CRIAÇÃO</th>
                                        <th>AÇÃO</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($professors as $professor)
                                        <tr>
                                            <td>{{$professor->nome}}</td>
                                            <td>{{date('d/m/Y', strtotime($professor->created_at))}}</td>
                                            <td>
                                                <a href="{{ route('professors.edit', $professor->id) }}" title="Editar"><button class="btn btn-default"><i class="fa fa-edit"></i> Editar</button></a>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $professor->id }}"><i class="fa fa-info-circle"> Informações</i></button>
                                                <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"> Excluir</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-{{ $professor->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue">
                                                        <h1 id="ModalLabel">{{$professor->nome}}</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-sm-6">
                                                            <label>Endereço:</label>
                                                            <p>{{$professor->endereco}}</p>
                                                            <label>SEXO:</label>
                                                            <p>{{$professor->sexo}}</p>
                                                            <label>Telefone:</label>
                                                            <p>{{$professor->contato}}</p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Data de Cadastro:</label>
                                                            <p>{{date('d/m/Y', strtotime($professor->created_at))}}</p>
                                                            <label>Ultima atualização:</label>
                                                            <p>{{date('d/m/Y', strtotime($professor->updated_at))}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                        @else
                            <h3 class="text-center alert alert-warning">Nenhum Professor!</h3>
                        @endif
                    </div>
        
@endsection