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
	  		 <i class="fas fa-archive"></i> Tipo dos Materiais
        <small>Gerenciamento dos Materiais</small>
        <a href="{{ action('TipoMaterialController@create') }}" class="btn pull-right btn-success">
            <i class="fa fa-plus-circle"></i> Criar novo Tipo de Material
        </a>
	  	</h1>
  </section>
 @endsection
 @section('conteudo')
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		<i class="fa fa-list"></i>
 		 Tipos de Materiais
 	</div>
 <div class="panel-body">
	<table class="table table-bordered">
	 @if($tipos->count())
	 	<thead>
	 		<tr>
	 			<th width="1%">Cód</th>
	 			<th>Tipo Atual</th>
	 			<th width="35%">Ações</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		@foreach ($tipos as $tipo)
                <tr>
                	<td>{{ $tipo->id }}</td>
                	<td>{{ $tipo->tipo_material}}</td>
                	<td>
						<a href="{{ action('TipoMaterialController@edit', $tipo->id) }}" class="btn btn-default">
							<i class="fas fa-edit"></i> Editar
						</a>
						<form action="{{ action('TipoMaterialController@destroy', $tipo->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger">
                          	<i class="fas fa-trash-alt"></i> Excluir
                          </button>
                        </form>
					</td>
                </tr>
             @endforeach
	 	</tbody>
	 	@else
	 	 <div class="alert alert-warning alert-dismissible">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 	<span aria-hidden="true">&times;</span></button>
                     <strong>Opa!</strong> Nenhum Tipo de Material Cadastrado.
	 	 </div>
	 	 @endif
	 	 <tfoot>
	 	 </tfoot>
	 </table>
	</div>
 </div>
 @endsection